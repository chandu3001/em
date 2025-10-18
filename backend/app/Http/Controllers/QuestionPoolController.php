<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\difficulty_level;
use App\Models\Language;
use App\Models\family;
use App\Models\LanguagesQuestionPool;
use App\Models\MainQuestionPool;
use App\Models\ExamCriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use File;
use App\Exports\TemplateExport;
use App\Imports\DefaultImport;
use App\Exports\DefaultMultiSheet;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;



class QuestionPoolController extends Controller
{

    function getOptionsCount($main_pool_id)
    {
        $Question = MainQuestionPool::select('main_question_pools.*', 'languages_question_pools.*')
            ->join('languages_question_pools', 'main_question_pools.id', 'languages_question_pools.main_question_pool_id')
            ->join('languages', 'languages_question_pools.language_id', 'languages.id')
            ->where('main_question_pools.id', $main_pool_id)
            ->where('languages.default_language', 1)->get()->first();
        if (isset($Question->image) && $Question->image) {
            $Question->image = env("APP_URL") . $Question->image;
        } else if (isset($Question->video) && $Question->video) {
            $Question->video = env("APP_URL") . $Question->video;
        }

        $Question->options = Option::where('question_pool_id', $Question->id)->get();
        $data = Option::where("question_pool_id", $Question->id)->count();
        if ($data) {
            return response()->json(["status" => true, "data" => $data, 'preview' => $Question], 200);
        } else {
            return response()->json(["status" => false, "message" => "Invalid Question pool Id"], 200);
        }
    }

    function getTotalElimentaryQuestion($request)
    {
        $data = family::find($request->family_ids[0]);

        $language_ids = Language::select('id')->where('school_id', $data->school_id)->where('default_language', 1)->where('status', 1)->get()->pluck('id');
        $commonQuestions = [];
        foreach ($language_ids as $lang_id) {
            $temp = MainQuestionPool::join('languages_question_pools', 'main_question_pools.id', 'languages_question_pools.main_question_pool_id')
                ->whereIn('family_id', $request->family_ids)->where('language_id', $lang_id)->where("eliminatory_question", 1)->count();
            if ($temp == 0) {
                $commonQuestions = [0];
                break;
            }
            array_push($commonQuestions, $temp);

        }
        return min($commonQuestions);
    }

    function getTotalElimentaryQuestionCount(Request $request)
    {
        $total = $this->getTotalElimentaryQuestion($request);

        return response()->json(["status" => true, "message" => "Eliminatory questions " . $total, "total_questions" => $total], 200);

    }

    public function storeNative(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'question' => 'required',
            'options' => 'required',
            'language_id' => "required",
            'main_question_pool_id' => 'required'
        ]);

        if ($validate->fails()) {
            return response()->json(['status' => false, 'message' => $validate->messages()], 422);
        }

        $ch = LanguagesQuestionPool::where("main_question_pool_id", $request->main_question_pool_id)
            ->where("language_id", $request->language_id)->get()->first();

        $options = $request->options;

        if ($ch) {
            $ch->update($request->only("main_question_pool_id", "language_id", 'question'));
            Option::where("question_pool_id", $ch->id)->delete();
            $id = $ch->id;

        } else {
            $id = LanguagesQuestionPool::insertGetId($request->only("main_question_pool_id", "language_id", 'question'));

        }

        foreach ($options as $op) {
            Option::create([
                "option_name" => $op['option'],
                "is_correct" => $op['is_correct'],
                "question_pool_id" => $id
            ]);
        }

        return response()->json(['status' => true, 'message' => "Saved"], 200);
    }


    public function getDetails($id, $pool_id)
    {
        $data = LanguagesQuestionPool::where("language_id", $id)->where('main_question_pool_id', $pool_id)->get()->first();
        if ($data) {
            $data->options = Option::where("question_pool_id", $data->id)->get();
            if (count($data->options) > 0)
                return response()->json(["status" => true, "data" => $data], 200);
            else
                return response()->json(['status' => false, 'message' => "No record found"], 200);

        } else {
            return response()->json(['status' => false, 'message' => "No record found"], 200);
        }
    }


    public function getRow($id)
    {
        $data = LanguagesQuestionPool::select('languages_question_pools.question', 'main_question_pools.*', 'languages_question_pools.id')
            ->join('main_question_pools', 'languages_question_pools.main_question_pool_id', 'main_question_pools.id')
            ->where("languages_question_pools.id", $id)->get()->first();
        $data->url = env("APP_URL");
        $data->options = Option::select("option_name as option", "is_correct as correct")->where("question_pool_id", $id)->get();
        return response()->json(["status" => true, "message" => "QuestionPool Details", "data" => $data], 200);
    }

    public function uploadImage($image)
    {
        $imageName = time() . '.' . $image->extension();

        $image->move(storage_path('/public/images'), $imageName);
        return $imageName;
    }

    public function uploadVideo($video)
    {
        $videoName = time() . '.' . $video->extension();
        $video->move(storage_path('/public/videos'), $videoName);
        return $videoName;
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'family_id' => 'required',
            'question' => 'required',
            'options' => 'required',
            'difficulty_level_id' => 'required',
            'marks' => 'required|numeric',
            'school_id' => "required"
        ]);

        if ($validate->fails()) {
            return response()->json(['status' => false, 'message' => $validate->messages()], 422);
        }

        $chDefaultLang = Language::select('id')->where('school_id', $request->school_id)->where("default_language", 1)->get()->first();

        if (!$chDefaultLang) {
            return response()->json(['status' => false, 'message' => "Before adding a question pool, please set the default language."], 200);

        }

        if (isset($request->image) && $request->image) {
            $validate = Validator::make($request->all(), [
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048|dimensions:max_width=273,max_height:255',
            ]);

            if ($validate->fails()) {
                return response()->json(['status' => false, 'message' => $validate->messages()], 422);
            }


            $imageName = $this->uploadImage($request->image);
        } else {
            $imageName = 0;
        }


        if (isset($request->video) && $request->video) {
            $validate = Validator::make($request->all(), [
                'video' => 'mimes:mp4,mov,ogg,qt',
            ]);

            if ($validate->fails()) {
                return response()->json(['status' => false, 'message' => $validate->messages()], 422);
            }

            $videoName = $this->uploadVideo($request->video);
        } else {
            $videoName = 0;
        }

        // $pool_id = QuestionPool::insertGetId([
        //     'family_id' => $request->family_id,
        //     "school_id" => $request->school_id,
        //     'question' => $request->question,
        //     'difficulty_level_id' => $request->difficulty_level_id,
        //     'marks' => $request->marks,
        //     'image' => $imageName ? '/storage/public/images/'.$imageName : '',
        //     'video' => $videoName ? '/storage/public/videos/'.$videoName : '',
        //     'eliminatory_question' => isset($request->eliminatory_question) ? $request->eliminatory_question : 0
        // ]);

        $main_pool_id = MainQuestionPool::insertGetId([
            'image' => $imageName ? '/storage/public/images/' . $imageName : '',
            'video' => $videoName ? '/storage/public/videos/' . $videoName : '',
            'family_id' => $request->family_id,
            'difficulty_level_id' => $request->difficulty_level_id,
            'marks' => $request->marks,
            "school_id" => $request->school_id,
            'eliminatory_question' => isset($request->eliminatory_question) ? $request->eliminatory_question : 0,
            'no_shuffle' => $request->has('no_shuffle') && $request->no_shuffle ? $request->no_shuffle : 0

        ]);

        $langPool = LanguagesQuestionPool::insertGetId([
            "main_question_pool_id" => $main_pool_id,
            "question" => $request->question,
            "language_id" => $chDefaultLang->id,

        ]);


        $data = (json_decode($request->options));
        foreach ($data as $key => $da) {
            Option::create([
                "option_name" => $da->option,
                "is_correct" => $da->correct,
                "question_pool_id" => $langPool,
                'no_shuffle' => $da->no_shuffle
            ]);
        }

        return response()->json(['status' => true, 'message' => "Successfully Added"], 200);

    }


    public function show($school_id, LanguagesQuestionPool $questionPool, Request $request)
    {
        $defaultLangId = Language::where('school_id', $school_id)->where('default_language', 1)->get()->first();

        $data = $questionPool->select("families.family_name", "difficulty_levels.level", 'languages_question_pools.id as question_pool_id', "languages_question_pools.question", 'main_question_pools.*')
            ->join('main_question_pools', 'main_question_pools.id', 'languages_question_pools.main_question_pool_id')
            ->join("families", "families.id", "main_question_pools.family_id")
            ->join("difficulty_levels", "difficulty_levels.id", "main_question_pools.difficulty_level_id")
            ->where('language_id', $defaultLangId->id)
            ->where('main_question_pools.school_id', $school_id)
            ->where('families.status', 1);

        if ($request->has('sortby') && $request->sortby) {
            if ($request->sortby == 1) {
                $data = $data->orderby('question', 'asc');
            } else {
                $data = $data->orderby('question', 'desc');
            }
        } else {
            $data = $data->latest('id');
        }

        if ($request->has('family_id') && $request->family_id) {
            $data = $data->where('families.id', $request->family_id);
        }

        if ($request->has('difficulty_level') && $request->difficulty_level) {
            if (gettype(json_decode($request->difficulty_level)) == 'object') {
                $data = $data->where("difficulty_levels.id", json_decode($request->difficulty_level)->id);
            } else {
                $data = $data->where("difficulty_levels.id", ($request->difficulty_level));
            }
        }
        if ($request->has('is_elimentry') && $request->is_elimentry) {
            $data = $data->where("main_question_pools.eliminatory_question", 1);
        }

        switch ($request->question_type) {
            case '1':
                $data = $data->where('main_question_pools.image', '')->where('main_question_pools.video', '');
                break;

            case '2':
                $data = $data->where('main_question_pools.image', '!=', '');
                break;

            case '3':
                $data = $data->where('main_question_pools.video', '!=', '');
                break;
        }

        $pagesize = ($request->has('pageSize') && $request->pageSize) ? $request->pageSize : 10;


        if ($request->has('q') && $request->q) {
            $data = $data->where('languages_question_pools.question', 'LIKE', "%$request->q%");
        }

        $data = $data->paginate($pagesize);

        foreach ($data as $da) {
            $da->options = Option::where("question_pool_id", $da->question_pool_id)->get();
            if ($da->image)
                $da->image = env("APP_URL") . $da->image;
            if ($da->video)
                $da->video = env("APP_URL") . $da->video;
        }
        return response()->json(['status' => true, "data" => $data], 200);
    }


    public function mediaDelete(Request $request, LanguagesQuestionPool $questionPool)
    {
        $validate = Validator::make($request->all(), [
            "id" => "required",
            'type' => 'required'
        ]);

        if ($validate->fails()) {
            return response()->json(['status' => false, 'message' => $validate->messages()], 422);
        }

        $dat = $questionPool::find($request->id);

        $data = MainQuestionPool::find($dat->main_question_pool_id);



        if ($data) {
            if ($request->type == "image") {

                if (File::exists(storage_path(str_replace("/storage/", '', $data->image)))) {
                    File::delete(storage_path(str_replace("/storage/", '', $data->image)));
                    $data->image = '';
                }
            } else if ($request->type == "video") {
                if (File::exists(storage_path(str_replace("/storage/", '', $data->video)))) {
                    File::delete(storage_path(str_replace("/storage/", '', $data->video)));
                    $data->video = '';
                }
            }
            $data->save();
            return response()->json(["status" => true, "message" => "Deleted Successfully"], 200);
        } else {
            return response()->json(["status" => false, "message" => "Invalid Question Pool Id"], 200);

        }


    }


    public function update(Request $request, LanguagesQuestionPool $questionPool)
    {
        $validate = Validator::make($request->all(), [
            "id" => "required",
        ]);
        if ($validate->fails()) {
            return response()->json(['status' => false, 'message' => $validate->messages()], 422);
        }

        $old = $questionPool::find($request->id);


        if (!$old) {
            return response()->json(['status' => false, 'message' => "Invalid Id"], 400);
        }
        $main_pool = MainQuestionPool::find($old->main_question_pool_id);


        if (isset($request->image) && $request->hasFile('image')) {
            $validate = Validator::make($request->all(), [
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]);

            if ($validate->fails()) {
                return response()->json(['status' => false, 'message' => $validate->messages()], 422);
            }
            $imageName = $this->uploadImage($request->image);
            // if(Storage::exists(str_replace("/storage/", '', $main_pool->image)))
            // {
            //     Storage::delete([str_replace("/storage/", '', $main_pool->image)]);
            // }

            // if(Storage::exists(str_replace("/storage/", '', $main_pool->video)))
            // {
            //     Storage::delete([str_replace("/storage/", '', $main_pool->video)]);
            // }
            $main_pool->video = '';

        } else if (isset($request->video) && $request->hasFile('video')) {
            $validate = Validator::make($request->all(), [
                'video' => 'mimes:mp4,mov,ogg,qt,mkv',
            ]);

            if ($validate->fails()) {
                return response()->json(['status' => false, 'message' => $validate->messages()], 422);
            }

            $videoName = $this->uploadVideo($request->video);

            // if(Storage::exists(str_replace("/storage/", '', $main_pool->video)))
            // {
            //     Storage::delete([str_replace("/storage/", '', $main_pool->video)]);
            // }
            // if(Storage::exists(str_replace("/storage/", '', $main_pool->image)))
            // {
            //     Storage::delete([str_replace("/storage/", '', $main_pool->image)]);
            // }
            $main_pool->image = '';

        }


        $old->update([
            'question' => isset($request->question) ? $request->question : $old->request->question,
        ]);

        $main_pool->update([
            'family_id' => isset($request->family_id) ? $request->family_id : $main_pool->family_id,
            "school_id" => isset($request->school_id) ? $request->school_id : $main_pool->school_id,
            'difficulty_level_id' => isset($request->difficulty_level_id) ? $request->difficulty_level_id : $main_pool->difficulty_level_id,
            'marks' => isset($request->marks) ? $request->marks : $main_pool->request->marks,
            'image' => isset($imageName) ? '/storage/public/images/' . $imageName : $main_pool->image,
            'video' => isset($videoName) ? '/storage/public/videos/' . $videoName : $main_pool->video,
            'eliminatory_question' => isset($request->eliminatory_question) ? $request->eliminatory_question : $main_pool->eliminatory_question,
            'no_shuffle' => $request->has('no_shuffle') ? $request->no_shuffle : $main_pool->no_shuffle

        ]);
        if (isset($request->options)) {
            $data = (json_decode($request->options));
            Option::where("question_pool_id", $request->id)->delete();
            foreach ($data as $key => $da) {
                Option::create([
                    "option_name" => $da->option,
                    "is_correct" => $da->correct,
                    "question_pool_id" => $request->id
                ]);
            }
        }

        return response()->json(["status" => true, "message" => "Successfully Updated"], 200);
    }

    public function delete(Request $request, LanguagesQuestionPool $questionPool)
    {
        $temp = $questionPool::find($request->id);
        $flag = true;
        if ($temp) {
            $main_Pool = MainQuestionPool::find($temp->main_question_pool_id);

            $check = ExamCriteria::select('family_questions', 'difficulty_questions', 'total_questions')
                ->join('exam_criteria_subs', 'exam_criterias.id', 'exam_criteria_subs.exam_criteria_id')
                ->where('school_id', $main_Pool->school_id)->get();

            foreach ($check as $key => $ch) {
                $families = json_decode($ch->family_questions);
                $family_ids = [];
                foreach ($families as $arr) {
                    if ($main_Pool->family_id == $arr->family_id) {
                        $count = MainQuestionPool::where('family_id', $arr->family_id)
                            ->where('eliminatory_question', 0)
                            ->count();

                        if ($count <= $arr->total_questions) {

                            $flag = false;
                            break;
                        }
                    }
                }

                if (!$flag) {
                    break;
                }
            }

            if ($flag) {
                $main_Pool = MainQuestionPool::find($temp->main_question_pool_id);
                $max_total_questions = ExamCriteria::where('school_id', $main_Pool->school_id)->max("total_questions");

                $total_questions = LanguagesQuestionPool::join('main_question_pools', 'languages_question_pools.main_question_pool_id', 'main_question_pools.id')
                    ->where('school_id', $main_Pool->school_id)
                    ->where('language_id', $temp->language_id)
                    ->count();

                if ($total_questions > $max_total_questions) {
                    $main_Pool->delete();
                    return response()->json(["status" => true, "message" => "Successfully Deleted"], 200);
                } else {
                    return response()->json(["status" => false, "message" => "It is not possible to delete a question because the exam criteria require a minimum of " . $max_total_questions . " questions. "], 200);
                }
            } else {
                return response()->json(["status" => false, "message" => "It is not possible to delete a question because this question is required to satisfy the exam criteria."], 200);
            }
        } else {
            return response()->json(["status" => false, "message" => "Invalid Id"], 422);
        }
    }

    function getTemplete(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'from' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json(['status' => false, 'message' => $validate->messages()], 422);
        }

        $fromLang = Language::find($request->from);

        if ($request->has('to') && $request->to) {
            $toLang = Language::find($request->to);


            $numberstoAlpha = ["one", "two", "three", "four", "five", "six", "seven", "eight", "nine", "ten"];
            $data = MainQuestionPool::select('no_shuffle', 'main_question_pools.id', 'languages_question_pools.question as ' . $fromLang->language_name . '_question', 'languages_question_pools.id as pool_id')
                ->join('languages_question_pools', 'main_question_pools.id', 'languages_question_pools.main_question_pool_id')
                ->where('languages_question_pools.language_id', $request->from)
                ->get();

            if (count($data) == 0) {
                return response()->json(["status" => false, "message" => "No questions are available in the default language."], 443);
            }

            $option_count = 0;
            $result = [];
            foreach ($data as $da) {
                $temp = languagesQuestionPool::where('main_question_pool_id', $da->id)->where('language_id', $request->to)->get()->first();
                if (!$temp) {
                    $options = Option::where('question_pool_id', $da->pool_id)->get();
                    if ($option_count < count($options)) {
                        $option_count = count($options);
                    }
                    foreach ($options as $key => $op) {
                        $da[$fromLang->language_name . "_option_" . $numberstoAlpha[$key]] = $op->option_name;
                        $da[$fromLang->language_name . '_is_correct_' . $numberstoAlpha[$key]] = $op->is_correct;
                        $da[$toLang->language_name . "_option_" . $numberstoAlpha[$key]] = '';
                        $da[$toLang->language_name . '_is_correct_' . $numberstoAlpha[$key]] = '';

                    }
                    $da['total_options'] = count($options);
                    $da[$toLang->language_name . "_question"] = '';
                    array_push($result, $da);
                }
            }
            if (count($result) > 0) {
                $result = collect($result);
                return Excel::download(new TemplateExport($result, ["option_count" => $option_count, "numberstoAlpha" => $numberstoAlpha, "from" => $fromLang, "to" => $toLang]), Carbon::now() . ".xlsx");

            } else {
                return response()->json(["status" => false, "message" => "All Questions are already available in " . $toLang->language_name . " language."], 444);
            }
        } else {
            $families = family::selectRaw('CONCAT(family_name," | ",id) as family_name')->where('school_id', $fromLang->school_id)->where('status', 1)->get();
            $difficulty_level = difficulty_level::select('id', 'level')->get();

            return Excel::download(new DefaultMultiSheet($families, $difficulty_level), 'defaultTemplate.xlsx');
        }
    }


    function bulkUpload(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'file' => 'required|file|mimes:xlsx',
        ]);

        if ($validate->fails()) {
            return response()->json(['status' => false, 'message' => $validate->messages()], 422);
        }

        if ($request->hasFile('file')) {
            try {
                Excel::import(new DefaultImport(), $request->file('file'));
                return response()->json(["status" => true, "message" => "Uploaded Successfully."], 200);

            } catch (\Throwable $th) {
                return $th;
                return response()->json(["status" => false, "message" => "Something Went Wrong!"], 400);
            }
        }
    }

    function getQuestionTypeByfamIdDiffId($family_id, $diff_id)
    {
        $data = MainQuestionPool::join('languages_question_pools', 'main_question_pools.id', 'languages_question_pools.main_question_pool_id')
            ->join('languages', 'languages_question_pools.language_id', 'languages.id')
            ->where('default_language', 1);

        $image = clone $data;
        $video = clone $data;
        $text = clone $data;

        $image = $image->where('image', '!=', '');
        $video = $video->where('video', '!=', '');
        $text = $text->where('video', '')->where('image', '');



        if ($family_id) {
            $image->where('family_id', $family_id);
            $video->where('family_id', $family_id);
            $text->where('family_id', $family_id);
        }
        if ($diff_id) {
            $image->where('difficulty_level_id', $diff_id);
            $video->where('difficulty_level_id', $diff_id);
            $text->where('difficulty_level_id', $diff_id);
        }

        $image = $image->count();
        $video = $video->count();
        $text = $text->count();
        $questionTypes = [];

        if ($text) {
            array_push($questionTypes, ['id' => '1', 'type' => 'Text']);
        }
        if ($image) {
            array_push($questionTypes, ['id' => '2', 'type' => 'With Image']);
        }
        if ($video) {
            array_push($questionTypes, ['id' => '3', 'type' => 'With Video']);
        }
        return response()->json(["status" => true, "data" => $questionTypes], 200);
    }

}