<?php

namespace App\Http\Controllers;

use App\Models\family;
use App\Models\MainQuestionPool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Rules\uniqueFields;
use App\Models\Language;
use App\Models\ExamCriteriaSub;



class FamilyController extends Controller
{

    public function getRow($id)
    {
        return response()->json(["status" => true, "message" => "Group Details", "data" => family::find($id)], 200);
    }

    public function store(Request $request, family $family)
    {
        $validate = Validator::make($request->all(), [
            'family_name' => ['required', 'string', new uniqueFields($family, $request->school_id)],
            'school_id' => 'required'
        ]);
        if ($validate->fails()) {
            return response()->json(["status" => false, "message" => $validate->messages()], 422);
        }

        $family::create($request->only("family_name", "school_id"));

        return response()->json(["status" => true, "message" => "Successfully Added"], 200);
    }


    public function show($school_id, family $family, Request $request)
    {
        if ($school_id) {
            $data = $family::where('school_id', $school_id);
        } else {
            $data = $family::latest("status");

        }

        if ($request->has('sortby') && $request->sortby) {
            if ($request->sortby == 1) {
                $data = $data->orderby('family_name', 'asc');
            } elseif ($request->sortby == 2) {
                $data = $data->orderby('family_name', 'desc');
            } else {
                $data = $data->latest('id');
            }
        }


        if ($request->has('q') && $request->q) {

            $data = $data->where('family_name', 'LIKE', "%$request->q%");
        }

        if ($request->has('status') && $request->status != '') {

            $data = $data->where('status', $request->status);
        }

        $pagesize = ($request->has('page_size') && $request->page_size) ? $request->page_size : 10;

        $data = $data->paginate($pagesize);

        $res = \Http::get("https://dsms.technoiq.in/backend/api/auth/student/get-schools");
        $school_names = $res["data"];
        foreach ($data as $da) {

            try {
                $da->school_name = $school_names[$da->school_id];
            } catch (\Throwable $th) {
                $da->school_name = "--";
            }
        }

        $respose = ["status" => true, "data" => $data];

        return response()->json($respose, 200);
    }

    public function list($school_id, family $family)
    {
        return response()->json(["status" => true, "data" => $family::select("id", "family_name", "default_family")->where('status', 1)->where('school_id', $school_id)->orderby('default_family', "DESC")->get()], 200);
    }

    function update(Request $request, family $family)
    {
        $validate = Validator::make($request->all(), [
            "id" => "required",
            'family_name' => ['required', 'string', new uniqueFields($family, $request->school_id, $request->id)],
            'school_id' => "required"
        ]);
        if ($validate->fails()) {
            return response()->json(["status" => false, "message" => $validate->messages()], 422);
        }
        $update = $family::find($request->id);
        if ($update) {
            $update->update($request->all());
            return response()->json(["status" => true, "message" => "Successfully Updated"], 200);

        } else {
            return response()->json(["status" => false, "message" => "Invalid Id"], 422);

        }
    }

    public function update_status(Request $request, family $family)
    {
        $validate = Validator::make($request->all(), [
            "id" => "required",
            "status" => "required"
        ]);
        if ($validate->fails()) {
            return response()->json(["status" => false, "message" => $validate->messages()], 422);
        }
        $flag = false;

        $update = $family::find($request->id);
        if ($update->status == 1) {
            $check = ExamCriteriaSub::select('family_questions')->join('exam_criterias', 'exam_criteria_subs.exam_criteria_id', 'exam_criterias.id')
                ->where('school_id', $update->school_id)->get();

            foreach ($check as $ch) {
                $data = json_decode($ch->family_questions);
                foreach ($data as $da) {
                    if ($da->family_id == $request->id) {
                        $flag = true;
                        break;
                    }
                }
                if ($flag)
                    break;
            }
            if ($flag) {
                return response()->json(["status" => false, "message" => "Group cannot be inactive due to group being assigned to exam criteria."], 200);

            }
        }
        if ($update) {
            $update->update([
                'status' => $request->status,
            ]);
            $message = $request->status == 1 ? 'Group Activated Successfully' : 'Group Inactivated Successfully';
            return response()->json(["status" => true, "message" => $message], 200);

        } else {
            return response()->json(["status" => false, "message" => "Invalid Id"], 422);

        }
    }

    public function delete(Request $request, family $family)
    {
        $validate = Validator::make($request->all(), [
            "id" => "required",
        ]);
        if ($validate->fails()) {
            return response()->json(["status" => false, "message" => $validate->messages()], 422);
        }
        $flag = false;
        $fam = $family::find($request->id);
        $check = ExamCriteriaSub::select('family_questions')->join('exam_criterias', 'exam_criteria_subs.exam_criteria_id', 'exam_criterias.id')
            ->where('school_id', $fam->school_id)->get();

        foreach ($check as $ch) {
            $data = json_decode($ch->family_questions);
            foreach ($data as $da) {
                if ($da->family_id == $request->id) {
                    $flag = true;
                    break;
                }
            }
            if ($flag)
                break;
        }
        if ($flag) {
            return response()->json(["status" => false, "message" => "Group cannot be deleted due to group being assigned to exam criteria."], 200);

        }
        try {
            $fam->delete();
        } catch (\Throwable $th) {
            return response()->json(["status" => false, "message" => "Invalid Id"], 422);
        }

        return response()->json(["status" => true, "message" => "Successfully Deleted"], 200);

    }

    function getTotalQuestionsAvailableinFamilies($data)
    {
        $data->family_name = str_contains($data->family_name, "Family") ? $data->family_name : $data->family_name . " Family";
        $language_ids = Language::select('id')->where('school_id', $data->school_id)->where('default_language', 1)->where('status', 1)->get()->pluck('id');
        $commonQuestions = [];
        foreach ($language_ids as $lang_id) {
            $temp = MainQuestionPool::join('languages_question_pools', 'main_question_pools.id', 'languages_question_pools.main_question_pool_id')
                ->where('family_id', $data->id)->where('language_id', $lang_id)->where("eliminatory_question", 0)->count();
            if ($temp == 0) {
                $commonQuestions = [0];
                break;
            }
            array_push($commonQuestions, $temp);

        }
        return min($commonQuestions);
    }
    public function getTotalQuestions($id, MainQuestionPool $pool)
    {

        $data = family::select("family_name", 'school_id', 'id')->find($id);

        if ($data) {
            $total = $this->getTotalQuestionsAvailableinFamilies($data);
            return response()->json(["status" => true, "message" => "Total Questions From " . $data->family_name, "total_questions" => $total], 200);

        } else {
            return response()->json(["status" => false, "message" => "Invalid Group Id"], 400);
        }
    }

}