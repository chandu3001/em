<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Examination;
use App\Models\StudentsAnswersSub;
use Carbon\Carbon;
use DB;


class DashboardController extends Controller
{

    function overview($school_id, Request $request)
    {
        $duration = $request->has('dates') && $request->dates ? $request->dates : 1;

        switch ($duration) {
            case '1':
                $duration = Carbon::now();
                break;
            case '2':
                $duration = Carbon::now()->startOfWeek();
                break;
            case '3':
                $duration = Carbon::now()->startOfMonth();
                break;
            case '4':
                $duration = Carbon::now()->subMonths(6);
                break;
            case '5':
                $duration = Carbon::now()->startOfYear();
                break;
        }

        if ($request->has('todate') && $request->todate) {
            $todate = Carbon::parse($request->todate);
        } else {
            $todate = Carbon::now();
        }

        if ($request->has('fromdate') && $request->fromdate) {
            $duration = Carbon::parse($request->fromdate);
        }

        $fromDate = clone $duration;

        $total_registered_students = DB::table('students')->join("users", "users.id", "students.user_id")
            ->join("license_types", "license_types.id", "students.license_type")
            ->leftJoin('license_types as sub_licesnse', 'sub_licesnse.id', 'students.sub_license')
            ->where('first_name_english', '!=', '');
        if ($school_id) {
            $total_registered_students = $total_registered_students->where('school_id', $school_id);
            $total_exams = Examination::where('school_id', $school_id);
        } else {
            $total_exams = new Examination;
        }
        $total_students = clone $total_registered_students;
        $total_students = $total_students->get()->count();
        $date = Carbon::now()->subDays(30);
        $total_students_attended_the_exam = StudentsAnswersSub::select('students_answers_subs.student_id')
            ->join('examinations', 'students_answers_subs.exam_id', 'examinations.id');

        $total_students_passed = StudentsAnswersSub::select('students_answers_subs.student_id')
            ->join('examinations', 'students_answers_subs.exam_id', 'examinations.id')->where('result', 'pass');
        $total_students_failed = StudentsAnswersSub::select('students_answers_subs.student_id')
            ->join('examinations', 'students_answers_subs.exam_id', 'examinations.id')->where(function ($condition) {
                $condition->where('result', 'fail')->orwhere('result', '');
            });

        if (!$school_id) {
            $schools = DB::table('schools')->get();
        }
        if ($school_id) {
            $total_students_attended_the_exam = $total_students_attended_the_exam->where('school_id', $school_id);
            $total_students_passed = $total_students_passed->where('school_id', $school_id);
            $total_students_failed = $total_students_failed->where('school_id', $school_id);
        }

        $total_students_attended_the_exam_analitics = [];
        $total_registered_students_analitics = [];
        $total_students_passed_analitics = [];
        $total_students_failed_analitics = [];
        $total_exams_analitics = [];
        $school_analitics = [];
        $activeSchoolAnalitics = [];

        $labels = [];

        for ($i = $duration; $i <= $todate; $i->addDay()) {
            $datte = $date->addDay()->format('Y-m-d');

            $a = clone $total_registered_students;
            array_push($total_registered_students_analitics, $a->whereDate('students.created_at', $duration)->count());

            $b = clone $total_students_attended_the_exam;
            array_push(
                $total_students_attended_the_exam_analitics,
                $b->whereDate('students_answers_subs.created_at', $duration)->get()->count()
            );

            $c = clone $total_students_passed;
            array_push(
                $total_students_passed_analitics,
                $c->whereDate('students_answers_subs.created_at', $duration)->get()->count()
            );

            $d = clone $total_students_failed;
            array_push(
                $total_students_failed_analitics,
                $d->whereDate('students_answers_subs.created_at', $duration)->get()->count()
            );

            $e = clone $total_exams;
            array_push($total_exams_analitics, $e->whereDate('created_at', $duration)->get()->count());

            array_push($school_analitics, DB::table('schools')->whereDate('created_at', $duration)->get()->count());
            array_push($activeSchoolAnalitics, DB::table('schools')->whereDate('created_at', $duration)->where('status', 1)->get()->count());


            array_push($labels, Carbon::parse($duration)->format('d-M-Y'));
        }

        if ($school_id) {
            $latestExams = Examination::select('id', 'status', 'exam_name')->where('school_id', $school_id)->whereDate('created_at', '>=', $fromDate)->whereDate('created_at', '<=', $todate)->latest()->take(3)->get();
        } else {
            $latestExams = DB::table('schools')->selectRaw('schools.id, schools.name, cities.name as city_name')
                ->join('cities', 'schools.city_id', 'cities.id')
                ->join('sql_em_mentric_uat22.examinations', 'schools.id', 'examinations.school_id')
                ->whereDate('examinations.created_at', '>=', $fromDate)->whereDate('examinations.created_at', '<=', $todate)
                ->latest('schools.id')->distinct('schools.id')->take(3)->get();
            foreach ($latestExams as $lexam) {
                $temp = Examination::where('school_id', $lexam->id)->get();
                $lexam->total_exams = count($temp);
                $arr = [];
                foreach ($temp as $exam) {
                    array_push($arr, StudentsAnswersSub::where('exam_id', $exam->id)->where('result', 'pass')->latest()->take(10)->count());
                }
                $lexam->pass_analitics = $arr;
            }
        }
        foreach ($latestExams as $exam) {
            $data = StudentsAnswersSub::where('exam_id', $exam->id);
            $attended = clone $data;
            $passed = clone $data;
            $failed = clone $data;

            $exam->attended = $attended->get()->count();
            $exam->passed = $passed->where('result', 'pass')->get()->count();
            $exam->failed = $failed->where(function ($condition) {
                $condition->where('result', 'fail')->orwhere('result', '');
            })->get()->count();
        }


        return response()->json(['status' => true, "data" => compact('labels', 'activeSchoolAnalitics', 'total_students', 'latestExams', 'total_exams_analitics', 'total_registered_students_analitics', 'total_students_attended_the_exam_analitics', 'total_students_passed_analitics', 'total_students_failed_analitics', 'school_analitics')], 200);

    }
}