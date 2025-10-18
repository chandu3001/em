<?php

namespace App\Http\Controllers;

use App\Models\Examination;
use App\Models\ExamCriteriaSub;
use App\Models\MockExamStatus;
use App\Models\StudentsAnswersSub;
use App\Models\ExamCriteria;
use App\Models\MainQuestionPool;
use App\Models\DifficultyLevelMarks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Rules\uniqueFields;
use App\Models\Option;
use App\Models\family;
use App\Models\difficulty_level;
use Http;

class ExaminationController extends Controller
{

    function changeMockExamStatus(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "school_id" => "required"
        ]);
        if ($validate->fails()) {
            return response()->json(["status" => false, "message" => "Invalid School Id"], 200);
        }

        $data = MockExamStatus::where('school_id', $request->school_id)->get()->first();
        if ($data) {
            $data->status = !$data->status;
            $data->save();

            $status = $data->status;
        } else {
            MockExamStatus::create($request->only(["school_id", "status"]));
            $status = 1;
        }

        return response()->json(["status" => true, "message" => "Status changed successfully", "mockExamStatus" => $status], 200);
    }

    function validateLicense(Request $request)
    {

        $check = Examination::where("licence_id", $request->license_id);
        if ($request->has('sub_license') && $request['sub_license'] && $request['sub_license'] != 'null') {
            $check = $check->where('sub_license_id', $request['sub_license']);
        } else {
            $check = $check->whereNull('sub_license_id');

        }
        $check = $check->count();
        if ($check) {
            $ch = Examination::where("licence_id", $request->license_id)->where('status', 1);
            if ($request->has('sub_license') && $request['sub_license'] && $request['sub_license'] != 'null') {
                $ch = $ch->where('sub_license_id', $request['sub_license']);
            } else {
                $ch = $ch->whereNull('sub_license_id');

            }
            $ch = $ch->count();
            if ($ch > 0) {
                return response()->json(["status" => true, "message" => "Examination is activated"], 200);
            } else {
                return response()->json(["status" => false, "message" => "Examination is not active."], 200);
            }
        } else {
            return response()->json(["status" => false, "message" => "No exams available for this license type."], 200);

        }

    }

    function getTotalExams($id = 0)
    {
        if ($id == 0) {
            $data = Examination::count('licence_id');
        } else {
            $data = Examination::where("school_id", $id)->count('licence_id');
        }
        return response()->json(["status" => true, "data" => $data], 200);
    }

    function getTotalActiveExams($id)
    {
        $data = Examination::where("school_id", $id)->where("status", 1)->distinct('licence_id')->count('licence_id');
        return response()->json(["status" => true, "data" => $data], 200);
    }

    function getExamResult($exam_id, Request $request)
    {
        if ($request->has('student_id')) {
            $data = DB::table('sql_em_mentric_uat22.students_answers_subs')
                ->selectRaw("examinations.sub_license_id,students_answers_subs.*,COALESCE(students_answers_subs.total_correct_answers,'--') as total_correct_answers,COALESCE(students_answers_subs.total_wrong_answers,'--') as total_wrong_answers,COALESCE(students_answers_subs.total_skipped_answers,'--') as total_skipped_answers,COALESCE(students_answers_subs.result,'Not Attended') as result,students_answers_subs.id as reference_id,examinations.exam_name, examinations.school_id,CONCAT(students.first_name_english,' ', COALESCE(students.second_name_english,'')) as student_name, students_answers_subs.created_at as started_at")
                ->join("sql_dsms_mentric.students", "students.id", "students_answers_subs.student_id")
                ->join("sql_dsms_mentric.license_types", "license_types.id", "students_answers_subs.licence_id")
                ->leftJoin("sql_dsms_mentric.license_types as sub_license", "sub_license.id", "students_answers_subs.sub_licence_id")
                ->join("sql_dsms_mentric.schools", "schools.id", "students.school_id")
                ->join("sql_em_mentric_uat22.examinations", "examinations.id", "students_answers_subs.exam_id")
                ->join("sql_dsms_mentric.users", "students.user_id", "users.id")
                ->where("students_answers_subs.is_submited", 1)
                ->where("students_answers_subs.student_id", $request->student_id);

        } else if ($exam_id == 0) {
            $data = DB::table('sql_em_mentric_uat22.students_answers_subs')
                ->selectRaw("examinations.sub_license_id,students_answers_subs.*,COALESCE(students_answers_subs.total_correct_answers,'--') as total_correct_answers,COALESCE(students_answers_subs.total_wrong_answers,'--') as total_wrong_answers,COALESCE(students_answers_subs.total_skipped_answers,'--') as total_skipped_answers,COALESCE(students_answers_subs.result,'Not Attended') as result,students_answers_subs.id as reference_id,examinations.exam_name, examinations.school_id,CONCAT(students.first_name_english,' ', COALESCE(students.second_name_english,'')) as student_name, students_answers_subs.created_at as started_at")
                ->join("sql_dsms_mentric.students", "students.id", "students_answers_subs.student_id")
                ->join("sql_dsms_mentric.license_types", "license_types.id", "students_answers_subs.licence_id")
                ->leftJoin("sql_dsms_mentric.license_types as sub_license", "sub_license.id", "students_answers_subs.sub_licence_id")
                ->join("sql_dsms_mentric.schools", "schools.id", "students.school_id")
                ->join("sql_em_mentric_uat22.examinations", "examinations.id", "students_answers_subs.exam_id")
                ->join("sql_dsms_mentric.users", "students.user_id", "users.id")
                ->where("students_answers_subs.is_submited", 1);
        } else {
            $data = DB::table('sql_em_mentric_uat22.students_answers_subs')
                ->selectRaw("students_answers_subs.*,students_answers_subs.id as reference_id,CONCAT(students.first_name_english,' ', COALESCE(students.second_name_english,'')) as student_name, students_answers_subs.created_at as started_at, COALESCE(students_answers_subs.total_correct_answers,'--') as total_correct_answers,COALESCE(students_answers_subs.total_wrong_answers,'--') as total_wrong_answers,COALESCE(students_answers_subs.total_skipped_answers,'--') as total_skipped_answers,COALESCE(students_answers_subs.result,'Not Attended') as result")
                ->join("sql_dsms_mentric.students", "students.id", "students_answers_subs.student_id")
                ->join("sql_dsms_mentric.license_types", "license_types.id", "students_answers_subs.licence_id")
                ->join("sql_dsms_mentric.schools", "schools.id", "students.school_id")
                ->join("sql_em_mentric_uat22.examinations", "examinations.id", "students_answers_subs.exam_id")
                ->join("sql_dsms_mentric.users", "students.user_id", "users.id")
                ->where("exam_id", $exam_id)
                ->where("is_submited", 1);
            $exam = Examination::find($exam_id);
            if (!$exam) {
                return response()->json(["status" => false, "message" => "invalid Exam Id"], 200);
            } else {
                $school_id = $exam->school_id;
            }
        }

        $data = $data->where('result', '!=', '')->where('total_marks', '>', 0);

        if ($request->has('sortby') && $request->sortby) {
            if ($request->sortby == 1) {
                $data = $data->orderby('students.first_name_english', 'asc');
            } else if ($request->sortby == 2) {
                $data = $data->orderby('students.first_name_english', 'desc');
            }
        } else {
            $data = $data->latest('students_answers_subs.id');
        }

        if ($request->has('q') && $request->q) {
            $name = explode(' ', $request->q);

            $data = $data->where(function ($condition) use ($name, $request) {
                if (count($name) == 2) {
                    $condition->where('students.first_name_english', 'LIKE', "%$name[0]%")
                        ->where('students.second_name_english', 'LIKE', "%$name[1]%")
                        ->orwhere("examinations.exam_name", "LIKE", "%$request->q%");
                } else {
                    $condition->where('students.first_name_english', 'LIKE', "%$request->q%")
                        ->orwhere('students.second_name_english', 'LIKE', "%$request->q%")
                        ->orwhere('students.id', 'LIKE', "%$request->q%")
                        ->orwhere('students.id_number', 'LIKE', "%$request->q%")
                        ->orwhere("examinations.exam_name", "LIKE", "%$request->q%");
                }
            });
        }

        if ($request->has('exam_id') && $request->exam_id) {
            $data = $data->where('exam_id', $request->exam_id);
        }
        if ($request->has("result") && $request->result) {
            $data = $data->where('result', $request->result);
        }

        $pagesize = ($request->has('pageSize') && $request->pageSize) ? $request->pageSize : 10;
        $temp = $data;
        $data = $data->paginate($pagesize);

        if ($request->has('student_id') || $exam_id == 0) {
            if (count($data) == 0) {
                $response = ["status" => true, "message" => "Students List", "data" => []];
                return response()->json($response, 200);
            }
            $school_id = $data[0]->school_id;
        }

        $temp = $temp->selectRaw("CONCAT(users.phone,' ',users.email,' ', students.id_number) as student_info, students.id")->get()->pluck('student_info', 'id');

        if ($exam_id == 0) {
            $response = ["status" => true, "message" => "Students List", "data" => $data];
        } else {
            $sub = DB::table('license_types')->find($exam->sub_license_id);
            $sub_license_name = $sub ? $sub->name : '--';
            $response = ["status" => true, "message" => "Examination Result List", "students_info" => $temp, "exam_name" => $exam->exam_name, "license_name" => DB::table('license_types')->find($exam->licence_id)->name, "sub_license_name" => $sub_license_name, "school_name" => DB::table('schools')->find($school_id)->name, "data" => $data];
        }

        return response()->json($response, 200);

    }

    public function releventquestions($id, Request $request)
    {
        $data = Examination::select('licence_id', 'sub_license_id', 'exam_name')->find($id);
        if (!$data) {
            return response()->json(["status" => false, 'message' => "Invalid Examination Id"], 200);
        }

        $license_name = DB::table('license_types')->find($data->licence_id)->name;
        if ($data->sub_license_id != Null)
            $sub_license_name = DB::table('license_types')->find($data->sub_license_id)->name;
        else
            $sub_license_name = '--';

        $exam_name = $data->exam_name;

        $data1 = ExamCriteriaSub::select("family_questions", "difficulty_questions")
            ->join("exam_criterias", "exam_criterias.id", "exam_criteria_subs.exam_criteria_id")
            ->where("licence_id", $data->licence_id)->where("sub_licence_id", $data->sub_license_id)->get()->first();

        $family_id = json_decode($data1->family_questions);
        $difficulty_id = json_decode($data1->difficulty_questions);

        $family_ids = [];
        $difficulty_ids = [];

        foreach ($family_id as $items) {
            array_push($family_ids, $items->family_id);
        }

        foreach ($difficulty_id as $items) {
            $id = DifficultyLevelMarks::find($items->difficulty_id)->level_id;
            array_push($difficulty_ids, $id);
        }



        $data2 = MainQuestionPool::selectRaw('families.family_name, difficulty_levels.level, languages_question_pools.id, question,marks, image, video,eliminatory_question, level,family_name')
            ->join("languages_question_pools", "languages_question_pools.main_question_pool_id", "main_question_pools.id")
            ->join('families', 'main_question_pools.family_id', 'families.id')
            ->join('difficulty_levels', 'main_question_pools.difficulty_level_id', 'difficulty_levels.id')
            ->join('languages', 'languages_question_pools.language_id', 'languages.id')
            ->where('languages.default_language', 1);


        if ($request->has('family_id') && $request->family_id) {
            $data2 = $data2->where('family_id', $request->family_id);
        } else {
            $data2 = $data2->whereIn("family_id", $family_ids);
        }
        if ($request->has('difficulty_level') && $request->difficulty_level) {
            $data2 = $data2->where('difficulty_level_id', $request->difficulty_level);
        } else {
            $data2 = $data2->whereIn("difficulty_level_id", $difficulty_ids);
        }
        if ($request->has('question_type') && $request->question_type) {
            switch ($request->question_type) {
                case 1:
                    $data2 = $data2->where('image', '')->where('video', '');
                    break;
                case 2:
                    $data2 = $data2->where('image', '!=', '');
                    break;
                case 3:
                    $data2 = $data2->where('video', '!=', '');
                    break;
            }

        }
        if ($request->has('is_elimentry') && $request->is_elimentry) {
            $data2 = $data2->where('eliminatory_question', $request->is_elimentry);
        }

        if ($request->has('page_size') && $request->page_size) {
            $data2 = $data2->paginate($request->page_size);
        } else {
            $data2 = $data2->paginate(10);
        }

        foreach ($data2 as $da2) {
            $da2->options = Option::select('option_name', 'is_correct')->where('question_pool_id', $da2->id)->get();
            if ($da2->image) {
                $da2->image = env("APP_URL") . $da2->image;
            } else if ($da2->video) {
                $da2->video = env("APP_URL") . $da2->video;
            }
        }

        $families = family::select('id', 'family_name')->whereIn("id", $family_ids)->get();
        $difficulty_levels = difficulty_level::select('id', 'level')->whereIn("id", $difficulty_ids)->get();

        return response()->json(["status" => true, "filter_data" => compact('families', 'difficulty_levels'), "total_family" => count($family_ids), "total_difficulty_levels" => count($difficulty_ids), "data" => $data2, "license_name" => $license_name, "sub_license_name" => $sub_license_name, "exam_name" => $exam_name]);


    }

    public function getRow($id)
    {
        $data = Examination::find($id);
        if (!$data) {
            return response()->json(["status" => false, "message" => "Invalid Examination Id"], 400);
        }
        $license = Http::get("https://dsms.technoiq.in/backend/api/auth/license/" . $data->licence_id . "/null");

        if ($license["errors"]) {
            return response()->json(["status" => false, "message" => "Invalid License Id"], 400);
        }

        $license_name = $license["data"]["result"]["name"];
        $data->license_name = $license_name;
        return response()->json(["status" => true, "message" => "Examination Details", "data" => $data], 200);
    }

    public function store(Request $request, Examination $examination)
    {
        $validate = Validator::make($request->all(), [
            'exam_name' => ['required', 'string', new uniqueFields($examination, $request->school_id)],
            "licence_id" => 'required',
            "school_id" => "required"
        ]);
        if ($validate->fails()) {
            return response()->json(["status" => false, "message" => $validate->messages()], 422);
        }

        $check = ExamCriteria::where("licence_id", $request->licence_id);
        if ($request->has("sub_license_id") && $request->sub_license_id) {
            $check = $check->where("sub_licence_id", $request->sub_license_id);
        }
        $check = $check->get()->first();

        if (!$check) {
            return response()->json(["status" => false, "message" => "Exam Criteria is Not Available For this License Type"], 200);

        }
        $license = Http::get("https://dsms.technoiq.in/backend/api/auth/license/" . $request->licence_id . "/null");
        if ($license["errors"]) {
            return response()->json(["status" => false, "message" => "Invalid License Id"], 200);
        }
        Examination::create($request->all() + ["pass_percentage" => $check->pass_percentage]);

        return response()->json(["status" => true, "message" => "Successfully Added"], 200);
    }


    public function show($school_id, Examination $examination, Request $request)
    {
        if ($school_id) {

            $data = DB::table('sql_em_mentric_uat22.examinations')
                ->selectraw('examinations.deleted_status, examinations.total_family, license_types.name as license_name,COALESCE(sublicense.name, "--") as sub_license_name, examinations.exam_name , examinations.id, examinations.licence_id, examinations.sub_license_id, examinations.status')
                ->join('license_types', 'license_types.id', 'examinations.licence_id')
                ->leftJoin('license_types as sublicense', 'sublicense.id', 'examinations.sub_license_id')
                ->where("examinations.school_id", $school_id);

        } else {
            $data = DB::table('sql_em_mentric_uat22.examinations')
                ->selectraw('examinations.deleted_status, examinations.total_family, examinations.school_id,license_types.name as license_name,COALESCE(sublicense.name, "--") as sub_license_name, examinations.exam_name , examinations.id, examinations.licence_id, examinations.sub_license_id, examinations.status')
                ->join('license_types', 'license_types.id', 'examinations.licence_id')
                ->leftJoin('license_types as sublicense', 'sublicense.id', 'examinations.sub_license_id');
        }

        if ($request->has('sortby') && $request->sortby) {
            if ($request->sortby == 2) {
                $data = $data->orderby('exam_name', 'desc');
            } elseif ($request->sortby == 1) {
                $data = $data->orderby('exam_name', 'asc');
            }
        } else {
            $data = $data->latest("examinations.id");
        }

        if ($request->has('license_id') && $request->license_id) {
            $data = $data->where('examinations.licence_id', $request->license_id);
        }
        if ($request->has('sub_license_id') && $request->sub_license_id) {
            $data = $data->where('examinations.sub_license_id', $request->sub_license_id);
        }
        if ($request->has('sub_id') && $request->sub_id) {
            $data = $data->where('examinations.sub_license_id', $request->sub_id);
        }

        if ($request->has('status') && $request->status && $request->status != '-1') {
            if ($request->status == 1) {
                $data = $data->where('status', $request->status);
            } else {
                $data = $data->where('status', 0);
            }
        }

        if ($request->has('q') && $request->q) {
            $data = $data->where('exam_name', 'LIKE', "%$request->q%");
        }

        $pagesize = ($request->has('pageSize') && $request->pageSize) ? $request->pageSize : 10;

        $data = $data->paginate($pagesize);

        foreach ($data as $item) {
            $total_family = $item->total_family;
            $item->total_students = DB::table('students')->where('school_id', $school_id)->where('students.license_type', $item->licence_id);
            if ($item->sub_license_id != 'null') {
                $item->total_students = $item->total_students->where('students.sub_license', $item->sub_license_id)->count();
            } else {
                $item->total_students = $item->total_students->where('students.sub_license', $item->sub_license_id)->count();
            }
            $item->total_attended_students = StudentsAnswersSub::where('exam_id', $item->id)->where('result', '!=', '')->count();
            $temp = StudentsAnswersSub::select('student_id')->where('exam_id', $item->id);
            $totalExamAttended = clone $temp;
            $totalExamPassed = clone $temp;

            $totalExamAttended = $totalExamAttended->where('result', '!=', '')->count();
            $totalExamPassed = $totalExamPassed->where('result', 'pass')->count();

            if ($totalExamAttended) {
                $item->pass_percentage = round(($totalExamPassed / $totalExamAttended) * 100, 2);
            } else {
                $item->pass_percentage = 0;
            }

            $item->total_family = $total_family;
            if ($school_id == 0) {
                $item->school_name = DB::table('schools')->find($item->school_id)->name;
            }
        }

        $mockExamStatus = MockExamStatus::select("status")->where("school_id", $school_id)->get()->first();

        if ($school_id && $mockExamStatus)
            $response = ["status" => true, "data" => $data, "mock_exam_status" => $mockExamStatus->status];
        else
            $response = ["status" => true, "data" => $data];

        return response()->json($response, 200);
    }

    function update(Request $request, Examination $examination)
    {
        $validate = Validator::make($request->all(), [
            "id" => "required",
            "school_id" => "required",
            "exam_name" => ['required', 'string', new uniqueFields($examination, $request->school_id, $request->id)],

        ]);
        if ($validate->fails()) {
            return response()->json(["status" => false, "message" => $validate->messages()], 422);
        }
        $update = $examination::find($request->id);
        if ($update) {
            $update->update($request->all());
            return response()->json(["status" => true, "message" => "Successfully Updated"], 200);

        } else {
            return response()->json(["status" => false, "message" => "Invalid Id"], 422);
        }
    }

    public function update_status(Request $request, Examination $examination)
    {
        $validate = Validator::make($request->all(), [
            "id" => "required",
            "status" => "required"
        ]);
        if ($validate->fails()) {
            return response()->json(["status" => false, "message" => $validate->messages()], 422);
        }
        $row = $examination::find($request->id);

        $check = ExamCriteria::where('licence_id', $row->licence_id);

        if ($row->sub_license_id && $row->sub_license_id != NULL) {
            $check = $check->where('sub_licence_id', $row->sub_license_id);
        }
        $check = $check->count();
        if ($check) {
            if ($row) {
                if ($request->status) {
                    Examination::where("licence_id", $row->licence_id)->where('sub_license_id', $row->sub_license_id)->update(["status" => 0]);
                }

                Examination::find($request->id)->update([
                    'status' => $request->status
                ]);

                $data = $request->status == 1 ? "Exam is activated successfully" : "Exam is Inactivated successfully";

                return response()->json(["status" => true, "message" => $data], 200);

            } else {
                return response()->json(["status" => false, "message" => "Invalid Id"], 422);

            }
        } else {
            return response()->json(["status" => false, "message" => "Status cannot be active due to exam criteria not available for this exam."], 200);

        }
    }

    public function delete(Request $request, Examination $examination)
    {
        $validate = Validator::make($request->all(), [
            "id" => "required",
        ]);
        if ($validate->fails()) {
            return response()->json(["status" => false, "message" => $validate->messages()], 422);
        }

        try {
            $examination::find($request->id)->update(['deleted_status' => 1]);
        } catch (\Throwable $th) {
            return response()->json(["status" => false, "message" => "Invalid Id"], 422);
        }

        return response()->json(["status" => true, "message" => "Successfully Deleted"], 200);


    }
    function getallexamination()
    {
        $val = Examination::all();
        return response()->json(["status" => true, "message" => "examination list", "data" => $val], 200);
    }

    function downloadExe()
    {
        return response()->download(storage_path('applications/Authenticator.exe'), "Authenticator.exe");
    }

}