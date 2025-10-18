<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Examination;
use App\Models\StudentsAnswersSub;
use App\Models\family;
use Http;
use Carbon\Carbon;


class DashboardController extends Controller
{
    function index($school_id, Request $request)
    {

        if($request->has("overview_duration") && $request->overview_duration)
        {
            $duration = $request->overview_duration;
        }
        else
        {
            $duration = carbon::now()->endOfMonth()->format("d");
        }

        $examinations = Examination::count();
        $families = family::count();
        $dsmsData = Http::get("https://dsms.technoiq.in/backend/api/auth/get-dashborad-details/".$school_id);
    
        if(isset($dsmsData["status"]) && $dsmsData["status"])
        {
            $studentCount = $dsmsData["student_count"];
            $schoolCount = $dsmsData["school_count"];
        }
        else
        {
            return response()->json(["status"=>false, "message" => "error occured while fetching data from dsms."], 200);
        }

        
        
        $examinationAnalytics = [];
        $familiesAnalytics = [];
        $pass_analytics = [];
        $fail_analytics = [];
        $attended_analytics = [];

        if($school_id)
        {
            $pass = StudentsAnswersSub::leftJoin("examinations", "examinations.id", "students_answers_subs.exam_id")
            ->where("school_id", $school_id)
            ->where("result", 'pass')
            ->count();

            $fail = StudentsAnswersSub::leftJoin("examinations", "examinations.id", "students_answers_subs.exam_id")
            ->where("school_id", $school_id)
            ->where("result", 'fail')
            ->count();

            $attended = StudentsAnswersSub::leftJoin("examinations", "examinations.id", "students_answers_subs.exam_id")
            ->where("school_id", $school_id)
            ->count();

            $startDay = carbon::now()->startOfMonth();
            $days = carbon::now()->endOfMonth()->format("d");

            $monthlyActiveStudent = StudentsAnswersSub::leftJoin("examinations", "examinations.id", "students_answers_subs.exam_id")
            ->whereMonth("students_answers_subs.created_at",date("m"))
            ->where("school_id", $school_id)->distinct("student_id")->count();

            $weeklyActiveStudent = $monthlyActiveStudent/($days/7);
            $dailyActiveStudent = $monthlyActiveStudent/$days;
            
            $active_students_analytics = [];

            for ($j=1; $j <= $days; $j++) { 
                if($j > date("d"))
                break;
                else
                {
                    $temp = StudentsAnswersSub::leftJoin("examinations", "examinations.id", "students_answers_subs.exam_id")
                    ->whereDate("students_answers_subs.created_at",$startDay->addDays($j))
                    ->where("school_id", $school_id)
                    ->distinct("student_id")->count();
                    array_push($active_students_analytics, $temp);
                }
            }
            $active_students = [ 
                "monthly" => $monthlyActiveStudent,
                "weekly" => round($weeklyActiveStudent, 2),
                "daily" => round($dailyActiveStudent, 2),
                "active_students_analytics" => $active_students_analytics

            ];

            for($i=0; $i<11; $i++)
            {
                array_push($attended_analytics,[
                    "date" => date(Carbon::now()->subMonth($i)->format("Y-m")),
                    "data" => StudentsAnswersSub::leftJoin("examinations", "examinations.id", "students_answers_subs.exam_id")
                    ->where("school_id", $school_id)
                    ->whereMonth('students_answers_subs.created_at', Carbon::now()->subMonth($i)->format('m'))
                    ->whereYear('students_answers_subs.created_at', Carbon::now()->subMonth($i)->format('Y'))->count()
                ]);
                array_push($pass_analytics,[
                    "date" => date(Carbon::now()->subMonth($i)->format("Y-m")),
                    "data" => StudentsAnswersSub::leftJoin("examinations", "examinations.id", "students_answers_subs.exam_id")
                    ->where("school_id", $school_id)
                    ->whereMonth('students_answers_subs.created_at', Carbon::now()->subMonth($i)->format('m'))
                    ->whereYear('students_answers_subs.created_at', Carbon::now()->subMonth($i)->format('Y'))
                    ->where("result", 'pass')->count()
                ]);
                array_push($fail_analytics,[
                    "date" => date(Carbon::now()->subMonth($i)->format("Y-m")),
                    "data" => StudentsAnswersSub::leftJoin("examinations", "examinations.id", "students_answers_subs.exam_id")
                    ->where("school_id", $school_id)
                    ->whereMonth('students_answers_subs.created_at', Carbon::now()->subMonth($i)->format('m'))
                    ->whereYear('students_answers_subs.created_at', Carbon::now()->subMonth($i)->format('Y'))
                    ->where("result", 'fail')
                    ->count()
                ]);
            }

            for($i=1; $i<$duration; $i++)
            {
                if($i > date('d'))
                {
                    break;
                }
                else
                {
                    array_push($examinationAnalytics,[
                        "date" => date(Carbon::now()->addDays($i)),
                        "data" => Examination::where('school_id', $school_id)->whereDate('created_at', Carbon::now()->addDays($i))->count()
                    ]);
                }
                
            }
            for($i=1; $i<$duration; $i++)
            {
                if($i > date('d'))
                {
                    break;
                }
                else
                {
                    array_push($familiesAnalytics,[
                        "date" => date(Carbon::now()->addDays($i)),
                        "data" => family::where('school_id', $school_id)->whereDate('created_at', Carbon::now()->addDays($i))->count()
                    ]);
                }
                
            }
        }
        else
        {
            $attended = StudentsAnswersSub::count();
            $pass = StudentsAnswersSub::where("result", 'pass')->count();
            $fail = StudentsAnswersSub::where("result", 'fail')->count();


            $startDay = carbon::now()->startOfMonth();
            $days = carbon::now()->endOfMonth()->format("d");

            $monthlyActiveSchools = StudentsAnswersSub::leftJoin("examinations", "examinations.id", "students_answers_subs.exam_id")
            ->whereMonth("students_answers_subs.created_at",date("m"))->distinct("school_id")->count();
            $weeklyActiveSchools = $monthlyActiveSchools/($days/7);
            $dailyActiveSchools = $monthlyActiveSchools/$days;
            
            $active_schools_analytics = [];

            for ($j=1; $j <= $days; $j++) { 
                if($j > date("d"))
                break;
                else
                {
                    $temp = StudentsAnswersSub::leftJoin("examinations", "examinations.id", "students_answers_subs.exam_id")
                    ->whereDate("students_answers_subs.created_at",$startDay->addDays($j))
                    ->distinct("school_id")->count();
                    array_push($active_schools_analytics, $temp);
                }
            }
            $active_schools = [ 
                "monthly" => $monthlyActiveSchools,
                "weekly" => round($weeklyActiveSchools, 2),
                "daily" => round($dailyActiveSchools, 2),
                "active_schools_analytics" => $active_schools_analytics

            ];

            for($i=0; $i<11; $i++)
            {
                array_push($attended_analytics,[
                    "date" => date(Carbon::now()->subDays($i)->format("Y-m")),
                    "data" => StudentsAnswersSub::whereMonth('created_at', Carbon::now()->subMonth($i)->format("m"))
                    ->whereYear("created_at", Carbon::now()->subMonth($i)->format("Y"))->count()
                ]);
                array_push($pass_analytics,[
                    "date" => date(Carbon::now()->subDays($i)->format("Y-m")),
                    "data" => StudentsAnswersSub::whereMonth('created_at', Carbon::now()->subMonth($i)->format("m"))
                    ->whereYear("created_at", Carbon::now()->subMonth($i)->format("Y"))
                    ->where("result", 'pass')->count()
                ]);
                array_push($fail_analytics,[
                    "date" => date(Carbon::now()->subDays($i)->format("Y-m")),
                    "data" => StudentsAnswersSub::whereMonth('created_at', Carbon::now()->subMonth($i)->format("m"))
                    ->whereYear("created_at", Carbon::now()->subMonth($i)->format("Y"))
                    ->where("result", 'fail')
                    ->count()
                ]);
            }
            for($i=1; $i<$days; $i++)
            {
                if($i > date('d'))
                {
                    break;
                }
                else
                {
                    array_push($examinationAnalytics,[
                        "date" => date(Carbon::now()->addDays($i)),
                        "data" => Examination::whereDate('created_at', Carbon::now()->addDays($i))->count()
                    ]);
                }
            }
            for($i=1; $i<$days; $i++)
            {
                if($i > date('d'))
                {
                    break;
                }
                else
                {
                    array_push($familiesAnalytics,[
                        "date" => date(Carbon::now()->addDays($i)),
                        "data" => family::whereDate('created_at', Carbon::now()->addDays($i))->count()
                    ]);
                }
                
            }
        }

        $overviewAnalytics = ["examination_analytics" => $examinationAnalytics, "families_analytics" => $familiesAnalytics];


        $overview = [
            "total_families" => $families,
            "total_exams" => $examinations,
            "total_active_students" => $studentCount,
            "total_active_schools" => $schoolCount,
            "overview_analytics" => $overviewAnalytics
        ];
        $students_performance = [
            "attended" => $attended,
            "passed" => $pass,
            "failed" => $fail,
            "students_performance_analytics" => compact("attended_analytics", "pass_analytics", "fail_analytics")
        ];
        $status = true;
        if($school_id)
        return response()->json(compact("status", "overview", "students_performance","active_students"), 200);
        else
        return response()->json(compact("status", "overview", "students_performance", "active_schools"), 200);


    }
}
