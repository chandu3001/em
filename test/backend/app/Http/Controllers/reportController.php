<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Examination;
use Illuminate\Support\Facades\DB;
use App\Exports\downloadReport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Language;
use Carbon\Carbon;

class reportController extends Controller
{
    function index($school_id, Request $request)
    {

        $data = DB::table('sql_em_mentric_uat22.students_answers_subs')
            ->join("sql_dsms_mentric.students", "students.id", "students_answers_subs.student_id")
            ->join("sql_dsms_mentric.license_types", "license_types.id", "students_answers_subs.licence_id")
            ->leftJoin("sql_dsms_mentric.license_types as sub_license", "sub_license.id", "students_answers_subs.sub_licence_id")
            ->join("sql_dsms_mentric.schools", "schools.id", "students.school_id")
            ->join("sql_dsms_mentric.users", "users.id", "students.user_id")
            ->join("sql_em_mentric_uat22.languages", "students_answers_subs.language_id", "languages.id")
            ->join("sql_em_mentric_uat22.examinations", "examinations.id", "students_answers_subs.exam_id")
            ->where('students_answers_subs.result', '!=', '')->latest('students_answers_subs.id');


        if ($school_id) {
            $data = $data->selectRaw("CONCAT(students.first_name_english,' ', COALESCE(students.second_name_english, '')) as full_name, students.id_number, students.id as student_id,
            users.gender, language_name, license_types.name as license_name, COALESCE(sub_license.name,'--') as sub_license_name, examinations.exam_name,
            students_answers_subs.created_at as date_time, students_answers_subs.total_marks, students_answers_subs.total_questions, COALESCE(students_answers_subs.total_correct_answers, 0) as total_correct_answers,
            COALESCE(students_answers_subs.total_wrong_answers, 0) as total_wrong_answers, students_answers_subs.obtained_marks, COALESCE(students_answers_subs.result, 'Not Submitted') as result")->where('students.school_id', $school_id);
        } else {
            $data = $data->selectRaw("CONCAT(students.first_name_english,' ', COALESCE(students.second_name_english, '')) as full_name, students.id_number, students.id as student_id,
            users.gender, language_name, schools.name as school_name, license_types.name as license_name, COALESCE(sub_license.name,'--') as sub_license_name, examinations.exam_name,
            students_answers_subs.created_at as date_time, students_answers_subs.total_marks, students_answers_subs.total_questions, COALESCE(students_answers_subs.total_correct_answers, 0) as total_correct_answers,
            COALESCE(students_answers_subs.total_wrong_answers, 0) as total_wrong_answers, students_answers_subs.obtained_marks, COALESCE(students_answers_subs.result, 'Not Submitted') as result");
        }

        $data = $data->where("total_marks", '>', 0);
        if ($request->has("school_id") && $request->school_id) {
            $data = $data->whereIn("schools.id", $request->school_id);
        }

        if ($request->has("student_id") && $request->student_id) {
            $data = $data->whereIn("students_answers_subs.student_id", $request->student_id);
        }
        if ($request->has("gender") && $request->gender) {
            $data = $data->where("users.gender", $request->gender);
        }
        if ($request->has("exam_id") && $request->exam_id) {
            $data = $data->whereIn("examinations.id", $request->exam_id);
        }
        if ($request->has("license_id") && $request->license_id) {
            $data = $data->where("license_types.id", $request->license_id);
        }
        if ($request->has("sub_license_id") && $request->sub_license_id && $request->sub_license_id != 'null') {
            $data = $data->where("sub_license.id", $request->sub_license_id);
        }
        if ($request->has("result") && $request->result) {
            $data = $data->where("result", $request->result);
        }

        if ($request->has("att_lang") && $request->att_lang) {
            $data = $data->where("languages.language_code", $request->att_lang);
        }


        if ($request->has("from_date") && $request->from_date && $request->has('to_date') && $request->to_date) {
            if ($request->from_date == $request->to_date) {
                $data = $data->whereDate("students_answers_subs.created_at", Carbon::parse($request->from_date)->format('Y-m-d'));
            } else
                $data = $data->whereDate("students_answers_subs.created_at", '>=', Carbon::parse($request->from_date)->format('Y-m-d'))
                    ->whereDate("students_answers_subs.created_at", '<=', Carbon::parse($request->to_date)->format('Y-m-d'));
        } else if ($request->has("from_date") && $request->from_date) {
            $data = $data->whereDate("students_answers_subs.created_at", '>=', Carbon::parse($request->from_date)->format('Y-m-d'));
        } else if ($request->has("to_date") && $request->to_date) {
            $data = $data->whereDate("students_answers_subs.created_at", '<=', Carbon::parse($request->to_date)->format('Y-m-d'));
        }


        if ($request->has("download")) {
            $data = $data->get();
            if (count($data) == 0) {
                return response()->json(["status" => false, "message" => "No Data Found!"], 200);
            }
            return Excel::download(new downloadReport($data, $school_id), Carbon::now() . ".xlsx");
        }

        return response()->json(["status" => true, "data" => $data->whereNotNull("students.first_name_english")->paginate(10)], 200);
    }

    function getLicenseBySchoolIds(Request $request)
    {
        if ($request->has('school_ids') && $request->school_ids && count(json_decode($request->school_ids)) > 0) {
            $data = DB::table('license_types')->select('id', 'name')->whereNull('parent_id')->whereIn('schools_id', json_decode($request->school_ids)[0])->where('registration_status', 1)->get();
            return response()->json(["status" => true, "data" => $data], 200);

        } else {
            $data = [];
            return response()->json(["status" => false, "message" => "No data found!", "data" => $data], 200);

        }
    }

    function getstudentsByGender($gender_id, Request $request)
    {
        $data = DB::table('students')->selectRaw('students.id,first_name_english,COALESCE(second_name_english, "") as second_name_english')
            ->join('users', 'students.user_id', 'users.id')
            ->where('first_name_english', '!=', '')
            ->whereNotNull('first_name_english');
        if ($request->has('school_ids') && $request->school_ids && count(json_decode($request->school_ids)) > 0) {
            $data = $data->whereIn('school_id', json_decode($request->school_ids)[0]);
        }
        if ($gender_id) {
            $data = $data->where('users.gender', $gender_id);
        }
        $data = $data->get();
        return response()->json(["status" => true, "data" => $data], 200);
    }

    function getStudents($school_id, Request $request)
    {
        if ($request->has("school_ids") && $request->school_ids) {
            $data = DB::table('students')->selectRaw("students.id, CONCAT(first_name_english,' ', COALESCE(second_name_english, '')) as student_name")
                ->join('users', 'users.id', "students.user_id")
                ->join("license_types", "license_types.id", '=', "students.license_type")
                ->whereIn("school_id", json_decode($request->school_ids)[0])->get();
        } else if ($request->has('school_id') && $request->school_id) {
            $data = DB::table('students')->selectRaw("students.id, CONCAT(first_name_english,' ', COALESCE(second_name_english, '')) as student_name")
                ->join('users', 'users.id', "students.user_id")
                ->join("license_types", "license_types.id", '=', "students.license_type")
                ->where("school_id", $school_id)->get();
        } elseif ($school_id) {
            $data = DB::table('students')->selectRaw("students.id, CONCAT(first_name_english,' ', COALESCE(second_name_english, '')) as student_name")
                ->join('users', 'users.id', "students.user_id")
                ->join("license_types", "license_types.id", '=', "students.license_type")
                ->where("school_id", $school_id)->get();
        } else {
            $data = DB::table('students')->selectRaw("students.id, CONCAT(first_name_english,' ', COALESCE(second_name_english, '')) as student_name")
                ->join('users', 'users.id', "students.user_id")
                ->join("license_types", "license_types.id", '=', "students.license_type")
                ->get();
        }
        return response()->json(["status" => true, "data" => $data, "total" => count($data)], 200);
    }

    function getExamBySchoolIds(Request $request)
    {
        if ($request->has('school_ids') && $request->school_ids) {
            $data = Examination::select('id as exam_id', 'exam_name')->wherein("school_id", json_decode($request->school_ids)[0])->get();
            return response()->json(["status" => true, "data" => $data], 200);

        } else {
            return response()->json(["status" => false, "message" => "School ids Required!"], 200);
        }

    }

    public function getLanguagesByExamIds(Request $request)
    {
        if ($request->has('exam_ids') && $request->exam_ids) {
            $data = Language::select('languages.language_code', 'language_name')->join('students_answers_subs', 'languages.id', 'students_answers_subs.language_id')->whereIn("exam_id", $request->exam_ids)->distinct('language_code')->get();
            return response()->json(["status" => true, "data" => $data], 200);

        } else {
            return response()->json(["status" => false, "message" => "Exam ids Required!"], 200);
        }
    }
}