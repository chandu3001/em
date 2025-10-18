<?php

namespace App\Http\Controllers;

use App\Models\ExamCriteria;
use App\Models\ExamCriteriaSub;
use App\Models\MainQuestionPool;
use App\Models\LanguagesQuestionPool;
use App\Models\Examination;
use App\Models\family;
use App\Models\DifficultyLevelMarks;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\DifficultyLevelMarksController;
use App\Http\Controllers\QuestionPoolController;




class ExamCriteriaController extends Controller
{

    public function getTotalQuestionCount($school_id)
    {
        $active_language_ids = Language::where('school_id', $school_id)->where('status', 1)->where('default_language', 1)->get()->pluck('id');
        $activeFamiliesId = family::select('id')->where('school_id', $school_id)->where('status', 1)->get()->pluck('id');
        $ids = MainQuestionPool::select('id')->where('school_id', $school_id)->where('eliminatory_question', 0)->whereIn('family_id',$activeFamiliesId)->get()->pluck('id');
        $countArr = [];

            foreach($active_language_ids as $lang_id)
            {
                $count = LanguagesQuestionPool::whereIn('main_question_pool_id', $ids)->where('language_id', $lang_id)->count();
                array_push($countArr, $count);
            }
            $total_questions = min($countArr);
            if($total_questions > 0)
                return response()->json(["status"=>true, "total_available_questions" => $total_questions], 200);
            else
            {
                return response()->json(["status"=>false, "total_available_questions" => 0, "message" => "No Questions Available"], 200);
            }
    }

    public function getValidSubLicense($license_id, Request $request)
    {

        $check = ExamCriteria::where('licence_id', $license_id)->count();
        
        if($check)
        {
            $subLicenseIds = ExamCriteria::select('sub_licence_id')
            ->where('licence_id', $license_id)
            ->whereNotNull('sub_licence_id')
            ->pluck('sub_licence_id');

            if(count($subLicenseIds) > 0)
            {
                if($request->has('id') && $request->id)
                {   $temp = [];
                    foreach($subLicenseIds as $sub)
                    {
                        if($sub != $request->id)
                        {
                            array_push($temp, $sub);
                        }
                    }
                    $subLicenseIds = $temp;
                }
                
                $data = DB::table('license_types')->select('id','name')
                ->where('parent_id', $license_id)->where('registration_status', 1)
                ->whereNotIn('id', $subLicenseIds)->where('deleted_status', 0)->get();

                if(count($data) > 0)
                return response()->json(["status"=>true, "data" => $data], 200);
                else
                return response()->json(["status"=>false, "data" => $data, 'option' => 1], 200);


            }
            else
            {

                $check = ExamCriteria::where('licence_id', $license_id)->whereNull('sub_licence_id')->count();

                return response()->json(["status"=>false, "message" => "Sub License Not Available!", 'option' => $check], 200);

            }
        }
        else
        {
            $data = DB::table('license_types')->select('id','name')
            ->where('parent_id', $license_id)->where('registration_status', 1)->where('deleted_status', 0)->get();

            return response()->json(["status"=>true, "data" => $data], 200);
        }

        
    }

    public function validateExamCriteria($request)
    {
        $total_questions = $request->total_questions;
        $total = 0;
        $error = false;
        $error_message = "All looks good";
        foreach($request->options as $da)
        {
            $family_total = 0;
            $total_family_questions = $da["total_questions"];
            
            foreach($da["questions"] as $item){
                $family_total += $item["no_of_questions"];
            }
            if($family_total == $da["total_questions"])
            {
                $total += $family_total;
            }
            else
            {
                $error = true;
                $error_message = family::find($da["family_id"])->family_name." has total questions ".$total_family_questions." but ".$family_total." questions given";
                break;
            }
        }
        if($total_questions != $total && !$error)
        {
            $error = true;
            $error_message = "Question count not matched with total question count";
        }
        return [
            "error" => $error,
            "response" => ["status" => false, "message" => $error_message]
        ];

    }

    public function validateDataField($data, &$errorArr)
    {

        switch ($data) {
            case !isset($data['family_id']):
                array_push($errorArr, ["family_id" => "This field is required inside data field"]);
                break;
            case !isset($data['total_questions']):
                array_push($errorArr, ["total_questions" => "This field is required inside data field"]);
                break;
            case !isset($data['questions']):
                array_push($errorArr, ["questions" => "This field is required inside data field"]);
                break;
            case isset($data['questions']):
                foreach ($data['questions'] as $item) {
                    switch ($item) {
                        case !isset($item['difficulty_id']):
                            array_push($errorArr, ["difficulty_id" => "This field is required inside data -> questions field"]);
                            
                        case !isset($item['no_of_questions']):
                            array_push($errorArr, ["no_of_questions" => "This field is required inside data -> questions field"]);
                    }
                }
            break;
                
        }
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            "licence_id" => 'required',
            "school_id" => "required",
            "total_questions" => "required|numeric",
            "pass_percentage" => "required",
            "duration" => "required",
            "family_options" => "required",
            "difficulty_options" => "required",
        ]);

        if($validate->fails()){
            return response()->json(["status" => false, "message" => $validate->messages()], 422);
        }

        // $res = $this->validateExamCriteria($request);
        // if($res["error"])
        // {
        //     return response()->json($res['response'], 422);
        // }
         
        if($request->has("sub_licence_id") && $request->sub_licence_id)
        {
            $check = ExamCriteria::where("sub_licence_id",$request->sub_licence_id)
            ->where("licence_id", $request->licence_id)
            ->where("school_id", $request->school_id)
            ->count();
        }
        else
        {
            $check = ExamCriteria::where("licence_id", $request->licence_id)
            ->whereNull("sub_licence_id")
            ->where("school_id", $request->school_id)
            ->count();  
        }

        if($check == 0)
        {
            $ExamCriteria_id = ExamCriteria::insertGetId($request->only(["licence_id", "sub_licence_id","school_id","total_questions","pass_percentage","duration","no_of_elimentary_questions"]));

                ExamCriteriaSub::create([
                    "exam_criteria_id" => $ExamCriteria_id,
                    "family_questions" => json_encode($request->family_options),
                    "difficulty_questions" => json_encode($request->difficulty_options),
                ]);
        }
        else
        {
            return response()->json(["status" => false, "message" => "Criteria already added!"], 200);
        }
        
        return response()->json(["status" => true, "message" => "Successfully Added"], 200);
 
    }

    function getValidFamilies($school_id)
    {
        $data = family::select('families.*')
        ->join('main_question_pools','families.id', "main_question_pools.family_id")
        ->join('languages_question_pools','main_question_pools.id', "languages_question_pools.main_question_pool_id")
        ->join('languages','languages_question_pools.language_id', "languages.id")
        ->where("default_language", 1)
        ->where("families.school_id", $school_id)->where('families.status', 1)
        ->distinct('families.id')->get();

        return response()->json(["status" => true, "data" => $data], 200);
    }

    function getValidDiffLevels($school_id)
    {
        $data = DifficultyLevelMarks::select('difficulty_levels.*','difficulty_level_marks.*')
        ->join("difficulty_levels", "difficulty_levels.id","difficulty_level_marks.level_id")
        ->join('main_question_pools','difficulty_levels.id', "main_question_pools.difficulty_level_id")
        ->join('languages_question_pools','main_question_pools.id', "languages_question_pools.main_question_pool_id")
        ->join('languages','languages_question_pools.language_id', "languages.id")
        ->where("default_language", 1)
        ->where("main_question_pools.school_id", $school_id)
        ->where("difficulty_level_marks.school_id", $school_id)
        ->distinct('difficulty_level_marks.level_id')->orderby('difficulty_levels.id')->get();

        return response()->json(["status" => true, "message" => "diffuculty level list", "data" => $data], 200); 
    }


    public function examcriteriavalidation(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'license_id' => "required",
            'school_id' => "required"
        ]);

        if($validate->fails())
        {
            return response()->json(["status" => false, "message" => $validate->messages()],422);
        }

       if($request->license_id && $request->has("sub_license_id") && $request->sub_license_id)
       {
            $check = ExamCriteria::where("sub_licence_id",$request->sub_license_id)
                ->where("licence_id", $request->license_id)
                ->where("school_id", $request->school_id);
            $message = "Exam criteria already exist for this licence type and sublicense type.";    
       }
       else
        {
            $check = ExamCriteria::where("licence_id", $request->license_id)
            ->whereNull("sub_licence_id")
            ->where("school_id", $request->school_id);
            $message = "Exam criteria already exist for this licence type.";

             
        }

        if($request->has('exam_criteria_id') && $request->exam_criteria_id)
        {
            $check = $check->where('id','!=', $request->exam_criteria_id)->count();
        }
        else
        {
            $check = $check->count();
        }

        if($check > 0)
        {
            return response()->json(["status" => false , "message" => $message]);
        }
        else
        {
            return response()->json(["status" => true],200);
        }
    }

    public function show($school_id, $license_id, ExamCriteria $examCriteria,Request $request)
    {
        $error = false;
        $data = DB::table('sql_em_mentric_uat22.exam_criterias')
        ->select("exam_criterias.id","exam_criterias.licence_id","exam_criterias.sub_licence_id","exam_criterias.total_questions","exam_criterias.pass_percentage", "license_types.name as license_name")
        ->leftJoin("sql_dsms_mentric.license_types", "license_types.id", "exam_criterias.licence_id")
        ->where("exam_criterias.school_id", $school_id)->where("exam_criterias.licence_id", $license_id);
        
        if($request->has('sortby') && $request->sortby)
        {
            if($request->sortby == 2)
            {
                $data = $data->orderby('license_types.name','desc');
            }
            else
            {
                $data = $data->orderby('license_types.name','asc');
            }
        }
        else
        {
            $data = $data->latest('id');
        }

        if($request->has('q') && $request->q)
        {
            $data = $data->where('license_types.name','LIKE',"$request->q");
        }

        $pagesize = ($request->has('pageSize') && $request->pageSize) ? $request->pageSize : 10;

        $data = $data->paginate($pagesize);

        // $res = Http::get("https://dsms.technoiq.in/backend/api/auth/student/get-name/".$school_id);

        // $license_names = $res["license_types"];
        // $sub_license_names = $res["sub_licenses"];

        foreach($data as $item)
        {
            $z = ExamCriteriaSub::where("exam_criteria_id",$item->id)->get()->first();

            $temp = json_decode($z->family_questions);

            $total_family = count($temp);


            $subLicense = DB::table('license_types')->find($item->sub_licence_id);
            if($subLicense)
            {
                $item->sub_license_name = $subLicense->name;
            }
            else
            {
                $item->sub_license_name = '---';
            }

            // $license = Http::get("https://dsms.technoiq.in/backend/api/auth/license/".$item->licence_id."/".$school_id);
            
            // try {
            //     $license_name = $license_names[$item->licence_id];
            //     $item->license_name = $license_name;
            //     $item->sub_license_name = $sub_license_names[$item->sub_licence_id];

            // } catch (\Throwable $th) {
                
            //         $error = true;
            //         break;
            // }
            $item->total_family = $total_family;

        }
        if($error)
        {
            return response()->json(["status" => false, "message" => "Invalid License Id"], 400);

        }
        else
        {
            return response()->json(["status" => true, "message" => "exam criteria details", "data" => $data], 200);

        }
    }


    public function edit($id, ExamCriteria $examCriteria)
    {
        $data = $examCriteria::find($id);
        if(!$data)
        {
            return response()->json(["status" => false, "message" => "Invalid Exam Criteria Id"], 400);

        }
        $examCriteriaSub = ExamCriteriaSub::where("exam_criteria_id",$id)->get();
        $license = DB::table('license_types')->find($data->licence_id);
        if($license) {
            $license_name = $license->name;
        } else {
            return response()->json(["status" => false, "message" => "Invalid License Id"], 400);
        }
        $data->license_name = $license_name;

        $family_details = json_decode($examCriteriaSub[0]->family_questions);
        $diff_details = json_decode($examCriteriaSub[0]->difficulty_questions);
        $family_ids = [];
        foreach($family_details as $fd)
        {
            $fam = family::select("family_name",'school_id', 'id')->find($fd->family_id);
            $obj = new FamilyController;
            $fd->total_available_questions = $obj->getTotalQuestionsAvailableinFamilies($fam);
            array_push($family_ids, $fam->id);
        }
        foreach($diff_details as $dd)
        {
            $diff = DifficultyLevelMarks::select('school_id','level_id')->find($dd->difficulty_id);
            $obj2 = new DifficultyLevelMarksController;
            $dd->total_available_questions = $obj2->getAvailableQuestions($diff, $family_ids);
        }
        $examCriteriaSub[0]->family_questions = json_encode($family_details);
        $examCriteriaSub[0]->difficulty_questions = json_encode($diff_details);
        
        $data->sub = $examCriteriaSub;
        $obj3 = new QuestionPoolController;
        $request = request();
        $request->merge(['family_ids'=> $family_ids]);
        $data->total_eliminatory_questions = $obj3->getTotalElimentaryQuestion($request);


        return response()->json(["status" => true,"message" => "exam criteria details", "data" => $data], 200);
    }


    public function update(Request $request, ExamCriteria $examCriteria)
    {
        $validate = Validator::make($request->all(),[
            "exam_criteria_id" => "required",
        ]);


        if($validate->fails()){
            return response()->json(["status" => false, "message" => $validate->messages()], 422);
        }
        
        if($request->has('family_options') && $request->family_options)
        {
            // ExamCriteriaSub::where("exam_criteria_id",$request->exam_criteria_id)->delete();
            // $errorArr = [];

            // foreach($request->options as $da)
            // {
            //     $this->validateDataField($da, $errorArr);
            // }
            // if(count($errorArr) > 0)
            // {
            //     return response()->json(["status"=>false, "message" => $errorArr], 422);
            // }

            // $res = $this->validateExamCriteria($request);
            // if($res["error"])
            // {
            //     return response()->json($res['response'], 422);
            // }

            $examCriteria = ExamCriteriaSub::where("exam_criteria_id",$request->exam_criteria_id)->get()->first();

            $examCriteria->update([
                "exam_criteria_id" => $request->exam_criteria_id,
                "family_questions" => (isset($request->family_options) && $request->family_options) ? json_encode($request->family_options) : $examCriteriaSub->family_questions,
                "difficulty_questions" => (isset($request->difficulty_options) && $request->difficulty_options) ? json_encode($request->difficulty_options) : $examCriteriaSub->difficulty_questions,
            ]);
        }

        $examCriteria = ExamCriteria::find($request->exam_criteria_id);
        
        // $total_family_questions = ExamCriteriaSub::where("exam_criteria_id", $request->exam_criteria_id)->sum("total_questions");
        // if($total_family_questions != (isset($request->total_questions) ? $request->total_questions : $examCriteria->total_questions))
        // {
        //     return response()->json(["status" => false, "message" => "Total number of family quetions is not equal to total number of exam criteria questions."], 400);
        // }
        // else
        // {
        //     $examCriteria->update($request->except(["options","exam_criteria_id"]));
        //     return response()->json(["status" => true, "message" => "Successfully Updated"], 200);
        // }

        $examCriteria->update($request->only(["licence_id","sub_licence_id","school_id","total_questions","pass_percentage","duration","no_of_elimentary_questions"]));

        if($request->has('pass_percentage') && $request->pass_percentage)
        {
            $updateExams = Examination::where("licence_id", $examCriteria->licence_id)->where('deleted_status', 0);
            if($examCriteria->sub_licence_id && $examCriteria->sub_licence_id != Null)
            {
                $updateExams = $updateExams->where('sub_license_id', $examCriteria->sub_licence_id);
            }
            else
            {
                $updateExams = $updateExams->whereNull('sub_license_id');
            }
            $updateExams->update(['pass_percentage' => $request->pass_percentage]);
        }

        return response()->json(["status" => true, "message" => "Successfully Updated"], 200);

        
    }

    public function delete(Request $request, ExamCriteria $examCriteria)
    {
        $validate = Validator::make($request->all(),[
            "id" => "required",
        ]);


        if($validate->fails()){
            return response()->json(["status" => false, "message" => $validate->messages()], 422);
        }
        $examCri = $examCriteria::find($request->id);

        $check = Examination::where("licence_id", $examCri->licence_id);
        if($examCri->sub_licence_id && $examCri->sub_licence_id != Null)
        {
            $check = $check->where('sub_license_id', $examCri->sub_licence_id);
        }
        else
        {
            $check = $check->whereNull('sub_license_id');
        }
        $check = $check->where('status', 1)->get()->first();

        if($check)
        {
            return response()->json(["status" => false, "message" => "This Exam Criteria is assigned to Examination!"], 200);
        }

        try {
            $examCri->delete();
            $deleteExams = Examination::where("licence_id", $examCri->licence_id);
            if($examCri->sub_licence_id && $examCri->sub_licence_id != Null)
            {
                $deleteExams = $deleteExams->where('sub_license_id', $examCri->sub_licence_id);
            }
            else
            {
                $deleteExams = $deleteExams->whereNull('sub_license_id');
            }
            $deleteExams->update(['deleted_status' => 1, 'status' => 0]);
        } catch (\Throwable $th) {
            return response()->json(["status" => false, "message" => "Invalid Id"], 400);

        }

        return response()->json(["status"=> true, "message" => "Successfully Deleted"], 200);
    }
}
