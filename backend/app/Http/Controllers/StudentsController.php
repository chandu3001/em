<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\ExamCriteria;
use App\Models\Authenticator;
use App\Models\MockExamStatus;
use App\Models\Examination;
use App\Models\UserToken;
use App\Models\StudentsAnswer;
use App\Models\Option;
use App\Models\ExamCriteriaSub;
use App\Models\StudentsAnswersSub;
use App\Models\AuthenticatorId;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\LanguagesQuestionPool;
use App\Models\Language;
use App\Models\MainQuestionPool;
use App\Models\DifficultyLevelMarks;
use Http;


class StudentsController extends Controller
{
    public function login(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "email" => "required",
            "password" => "required",
        ]);

        if ($validate->fails()) {
            return response()->json(['status' => false, 'message' => $validate->messages()], 422);
        }

        if (!$request->has('auth') || !$request->auth) {
            return response()->json(["status" => false, "message" => "Please launch the application provided by the school admin."], 200);
        } else {
            try {
                $authData = Crypt::decrypt($request->auth);
            } catch (DecryptException $e) {
                return response()->json(["status" => false, "message" => "Something went wrong, Kindly re-open the application"], 200);
            }
        }

        $AuthenticatorCheck = AuthenticatorId::where("username", $request->email)->where("password", $request->password)->first();

        if ($AuthenticatorCheck) {
            $school_id = $AuthenticatorCheck->school_id;

            if ($request->auth) {

                try {
                    $authData = Crypt::decrypt($request->auth);
                } catch (DecryptException $e) {
                    return response()->json(["status" => false, "message" => "Something went wrong, Kindly re-open the application"], 200);
                }

                $auth = Authenticator::where("school_id", $school_id)->where("mac_id", $authData['mac_id'])->first();

                if (!$auth) {
                    Authenticator::create([
                        "host" => $authData['host'],
                        "mac_id" => $authData['mac_id'],
                        "request_date" => date("d-m-Y"),
                        "school_id" => $school_id
                    ]);
                }


            } else {
                return response()->json(["status" => false, "message" => "Please launch the application provided by the school admin."], 200);
            }
            return response()->json(["status" => true, "authenticator" => true, "message" => "Authenticator request has been submitted", "host" => $authData['host']], 200);
        }


        $res = Http::post('https://dsms.technoiq.in/backend/api/auth/student_login', [
            'email' => $request->email,
            'password' => $request->password
        ]);

        if ($res['errors']) {
            return response()->json(["status" => false, "message" => isset($res["data"]["message"]) ? $res["data"]["message"] : "Invalid email or password"], 401);
        }


        $user_id = Arr::get($res, "data.result.userdata.id");
        $role = "student";
        $school_id = Arr::get($res, "data.result.userdata.schools_id");
        $token = Arr::get($res, "data.result.access_token");

        $valid = Authenticator::where("school_id", $school_id)
            ->where("mac_id", $authData['mac_id'])
            ->where("status", 1)
            ->count();

        if ($valid == 0) {
            return response()->json(["status" => false, "message" => "Device is unauthorized, Please contact school admin!"], 200);
        }


        // $user = UserToken::where('user_id', $user_id)->first();

        // if($user)
        // {
        //     $user->update([
        //         "token" => $token
        //     ]);
        // }
        // else{
        UserToken::create([
            "user_id" => $user_id,
            "role" => $role,
            "school_id" => $school_id,
            "token" => $token
        ]);
        // }
        return response()->json(['status' => true, 'message' => "Login Successfull", "data" => $res["data"]['result'], "device_status" => $valid, 'host' => $authData['host']], 200);
    }

    function getStudentSubLicenseTypes($license_id, $student_id)
    {
        $data = DB::table('license_types')->select('license_types.id', 'license_types.name')
            ->join('students', 'students.sub_license', 'license_types.id')
            ->where('students.license_type', $license_id)
            ->where('students.id', $student_id)->get();
        if (count($data) > 0)
            return response()->json(["status" => true, "data" => $data], 200);
        else
            return response()->json(["status" => false, "message" => "No Sublicense Available."], 200);

    }

    function getStudentLicenseTypes($student_id)
    {
        $data = DB::table('students')
            ->select('license_types.id', 'license_types.name')
            ->join('license_types', 'license_types.id', 'students.license_type')
            ->where('students.id', $student_id)->get();
        if (count($data) > 0)
            return response()->json(["status" => true, "data" => $data], 200);
        else
            return response()->json(["status" => false, "message" => "Invalid License Id"], 200);

    }

    function getValidLanguages($license_id, $sub_license_id)
    {
        $criteria = ExamCriteria::select('no_of_elimentary_questions', 'family_questions', 'difficulty_questions', 'school_id', 'exam_criterias.total_questions')
            ->join("exam_criteria_subs", 'exam_criterias.id', 'exam_criteria_subs.exam_criteria_id')
            ->where('licence_id', $license_id);

        if ($sub_license_id) {
            $criteria = $criteria->where('sub_licence_id', $sub_license_id)->get()->first();
        } else {
            $criteria = $criteria->whereNull('sub_licence_id')->get()->first();
        }

        $languages = Language::where('status', 1)->where('school_id', $criteria->school_id)->get()->pluck('id');

        $langArr = [];
        foreach ($languages as $lang) {
            $questions = $this->getQuestions($criteria, $lang);
            if (count($questions) >= $criteria->total_questions) {
                array_push($langArr, $lang);
            }
        }

        $data = Language::whereIn('id', $langArr)->where('status', 1)->get();

        return response()->json(["status" => true, "data" => $data], 200);
    }

    public function saveAnswer(Request $request, StudentsAnswer $studentsAnswer)
    {
        $validate = Validator::make($request->all(), [
            'question_pool_id' => 'required',
            'reference_id' => "required",
            "date_time" => "required"
        ]);

        if ($validate->fails()) {
            return response()->json(["status" => false, "message" => $validate->messages()], 422);
        }

        $ch = StudentsAnswersSub::find($request->reference_id);

        if (!$ch)
            return response()->json(["status" => false, "message" => "Invalid reference_id"], 200);

        $chh = StudentsAnswer::where("students_answers_sub_id", $request->reference_id)->where("question_pool_id", $request->question_pool_id)->first();

        if ($chh) {

            $options = Option::select("id", "option_name", "is_correct")->where("question_pool_id", $request->question_pool_id)->get();
            $pooll = LanguagesQuestionPool::select("question", "eliminatory_question", "marks")
                ->join('main_question_pools', 'main_question_pools.id', 'languages_question_pools.main_question_pool_id')
                ->where('languages_question_pools.id', $request->question_pool_id)
                ->where('language_id', $ch->language_id)
                ->get()->first();

            if ($pooll->eliminatory_question) {
                $option = Option::find($request->option_id);
                if ($option->is_correct == 0) {
                    $ch->update(["result" => 'fail']);
                } elseif ($ch->result == 'fail') {
                    $ch->update(["result" => '']);
                }
            }
            $chh->update([
                "option_id" => $request->option_id,
                "updated_at" => Carbon::parse($request->date_time)->toDateTimeString()
            ]);


            $resId = $chh->id;
        } else
            return response()->json(["status" => false, "message" => "Invalid question pool id"], 200);



        if ($resId) {
            return response()->json(["status" => true, "message" => "Successfully Saved"], 200);
        } else {
            return response()->json(["status" => false, "message" => "Something went wrong, Try Again!"], 400);
        }
    }


    function getQuestions($data, $langId)
    {

        $questions = [];
        $diff_details = json_decode($data->difficulty_questions);
        $family_details = json_decode($data->family_questions);

        $diff_ids = [];
        $family_ids = [];

        foreach ($diff_details as $arr) {
            $id = DifficultyLevelMarks::find($arr->difficulty_id)->level_id;
            array_push($diff_ids, $id);
        }

        foreach ($family_details as $ar) {
            array_push($family_ids, $ar->family_id);
        }

        if ($data->no_of_elimentary_questions > 0) {
            $eli_questions = LanguagesQuestionPool::select('main_question_pools.no_shuffle', "languages_question_pools.id", "question", "image", "video", "marks", "eliminatory_question", "school_id", "difficulty_level_id", 'family_id')
                ->join('main_question_pools', 'main_question_pools.id', 'languages_question_pools.main_question_pool_id')
                ->whereIn('family_id', $family_ids)
                ->where('eliminatory_question', 1)
                ->where('language_id', $langId)
                ->inRandomOrder()
                ->take($data->no_of_elimentary_questions)
                ->get();
        } else {
            $eli_questions = collect([]);
        }

        $fam_questions = collect([]);
        foreach ($family_details as $fam) {
            $temp = LanguagesQuestionPool::select('main_question_pools.no_shuffle', "languages_question_pools.id", "question", "image", "video", "marks", "eliminatory_question", "school_id", "difficulty_level_id", 'family_id')
                ->join('main_question_pools', 'main_question_pools.id', 'languages_question_pools.main_question_pool_id')
                ->where('family_id', $fam->family_id)
                ->where('eliminatory_question', 0)
                ->where('language_id', $langId)
                ->inRandomOrder()
                ->take($fam->total_questions)
                ->get();

            $fam_questions = $fam_questions->merge($temp);
        }

        $fam_questions = $fam_questions->toArray();
        if (count($eli_questions) > 0) {
            for ($i = 0; $i < count($eli_questions); $i++) {
                array_pop($fam_questions);
            }
        }

        $fam_questions = collect($fam_questions);

        if (count($eli_questions) > 0) {
            $questions = $fam_questions->merge($eli_questions);
        } else {
            $questions = $fam_questions;
        }

        return $questions;
    }

    function get_questions(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'school_id' => 'required',
            'license_id' => "required",
            'sub_license_id' => "required",
            'student_id' => "required",
            'language_id' => "required",
            'exam_type' => "required",
            "date_time" => "required"

        ]);

        if ($validate->fails()) {
            return response()->json(["status" => false, "message" => $validate->messages()], 422);
        }

        if ($request->exam_type == 1) {
            $ch = MockExamStatus::where("school_id", $request->school_id)->where("status", 1)->get()->first();

            if (!$ch) {
                return response()->json(["status" => false, "message" => "Mock Exam Not Activated"], 200);
            }
        }

        $em = Examination::where("licence_id", $request->license_id)->where("status", 1);
        if ($request->has('sub_license_id') && $request->sub_license_id) {
            $em = $em->where("sub_license_id", $request->sub_license_id)->get()->first();
        } else {
            $em = $em->whereNull("sub_license_id")->get()->first();
        }

        if (!$em) {
            return response()->json(["status" => false, "message" => "Exam Not Activated"], 200);
        }
        $data = ExamCriteriaSub::select("exam_criterias.pass_percentage", "exam_criterias.duration", 'exam_criterias.no_of_elimentary_questions', "exam_criterias.pass_percentage", "exam_criterias.total_questions", "exam_criteria_subs.difficulty_questions", "exam_criteria_subs.family_questions")
            ->join('exam_criterias', 'exam_criterias.id', 'exam_criteria_subs.exam_criteria_id')
            ->where("exam_criterias.licence_id", $request->license_id);

        if ($request->has('sub_license_id') && $request->sub_license_id) {
            $data = $data->where("exam_criterias.sub_licence_id", $request->sub_license_id);
        } else {
            $data = $data->whereNull("exam_criterias.sub_licence_id");
        }

        $data = $data->get()->first();

        $questions = $this->getQuestions($data, $request->language_id);
        $total_Exam_marks = 0;
        $finalQuestions = [];
        foreach ($questions as $te) {
            if ($te["no_shuffle"] == 1) {
                $lastId = Option::select("id")->where("question_pool_id", $te['id'])->get()->last()->id;
                $optionss = Option::select("id", "option_name")->where("question_pool_id", $te['id'])->where('id', '!=', $lastId)->inRandomOrder()->get();
                $lastOption = Option::select("id", "option_name")->where("question_pool_id", $te['id'])->where('id', $lastId)->get();
                $te['options'] = $optionss->merge($lastOption);
            } else {
                $te['options'] = Option::select("id", "option_name")->where("question_pool_id", $te['id'])->inRandomOrder()->get();
            }

            array_push($finalQuestions, $te);
            $total_Exam_marks += $te['marks'];
        }

        if (count($finalQuestions) == 0) {
            return response()->json(["status" => false, "message" => "Questions Not Available!"], 200);
        }

        $result = [];
        $result["media_url"] = env('APP_URL');

        $result["exam_name"] = $em->exam_name;
        $result["duration"] = $data->duration;
        $result["data"] = $finalQuestions;


        $ch = StudentsAnswersSub::where("student_id", $request->student_id)
            ->where("exam_type", $request->exam_type)
            ->where("licence_id", $request->license_id)
            ->where("sub_licence_id", $request->sub_license_id)
            ->where("is_submited", 0)->first();


        if ($ch) {
            $ch->is_submited = 1;
            $ch->save();
        }

        $id = StudentsAnswersSub::insertGetId([
            "exam_id" => $em->id,
            "exam_type" => $request->exam_type ? $request->exam_type : 1,
            "student_id" => $request->student_id,
            "licence_id" => $request->license_id,
            "sub_licence_id" => $request->sub_license_id,
            "language_id" => $request->language_id,
            "total_marks" => $total_Exam_marks,
            "total_questions" => count($finalQuestions),
            "pass_percentage" => $data->pass_percentage,
            "created_at" => Carbon::parse($request->date_time)->toDateTimeString()
        ]);


        $systemDate = Carbon::parse($request->date_time)->toDateTimeString();
        foreach ($finalQuestions as $ques) {

            StudentsAnswer::create([
                "question_pool_id" => $ques['id'],
                "option_id" => null,
                "question" => $ques['question'],
                "options" => Option::select('id', 'is_correct', 'option_name')->where("question_pool_id", $ques['id'])->get(),
                "image" => $ques['image'],
                "video" => $ques['video'],
                "marks" => $ques['marks'],
                "students_answers_sub_id" => $id,
                "is_eliminatory_question" => $ques['eliminatory_question'],
                "created_at" => $systemDate
            ]);

        }

        $result["reference_id"] = $id;

        return response()->json(["status" => true, "data" => $result], 200);




    }

    function gett_questions(Request $request, Students $students)
    {
        $validate = Validator::make($request->all(), [
            'school_id' => 'required',
            'license_id' => "required",
            'sub_license_id' => "required",
            'student_id' => "required",
            'language_id' => "required",
            'exam_type' => "required",
            "date_time" => "required"

        ]);

        if ($validate->fails()) {
            return response()->json(["status" => false, "message" => $validate->messages()], 422);
        }


        if ($request->exam_type == 1) {
            $ch = MockExamStatus::where("school_id", $request->school_id)->where("status", 1)->get()->first();

            if (!$ch) {
                return response()->json(["status" => false, "message" => "Mock Exam Not Activated"], 200);
            }
        }

        $em = Examination::where("licence_id", $request->license_id)
            ->where("status", 1);
        if ($request->has('sub_license_id') && $request->sub_license_id) {
            $em = $em->where("sub_license_id", $request->sub_license_id)->get()->first();
        } else {
            $em = $em->whereNull("sub_license_id")->get()->first();
        }

        if (!$em) {
            return response()->json(["status" => false, "message" => "Exam Not Activated"], 200);
        }

        $data = ExamCriteriaSub::select("exam_criterias.pass_percentage", "exam_criterias.duration", 'exam_criterias.no_of_elimentary_questions', "exam_criterias.pass_percentage", "exam_criterias.total_questions", "exam_criteria_subs.difficulty_questions", "exam_criteria_subs.family_questions")
            ->join('exam_criterias', 'exam_criterias.id', 'exam_criteria_subs.exam_criteria_id')
            ->where("exam_criterias.licence_id", $request->license_id)
            ->inRandomOrder();

        if ($request->has('sub_license_id') && $request->sub_license_id) {
            $data = $data->where("exam_criterias.sub_licence_id", $request->sub_license_id);
        } else {
            $data = $data->whereNull("exam_criterias.sub_licence_id");
        }

        $data = $data->get();


        $questions = [];
        foreach ($data as $da) {
            $diff_details = json_decode($da->difficulty_questions);
            $family_details = json_decode($da->family_questions);

            $diff_ids = [];
            $family_ids = [];

            foreach ($diff_details as $arr) {
                $id = DifficultyLevelMarks::find($arr->difficulty_id)->level_id;
                array_push($diff_ids, $id);
            }

            foreach ($family_details as $ar) {
                array_push($family_ids, $ar->family_id);
            }

            foreach ($family_details as $key => $de) {

                if ($key == 0 && $da->no_of_elimentary_questions > 0) {
                    $temp2 = LanguagesQuestionPool::select('main_question_pools.no_shuffle', "languages_question_pools.id", "question", "image", "video", "marks", "eliminatory_question", "school_id", "difficulty_level_id", 'family_id')
                        ->join('main_question_pools', 'main_question_pools.id', 'languages_question_pools.main_question_pool_id')
                        ->whereIn('family_id', $family_ids)
                        ->where('eliminatory_question', 1)
                        ->where('language_id', $request->language_id)
                        ->inRandomOrder()
                        ->take($da->no_of_elimentary_questions)
                        ->get();

                    $temp = LanguagesQuestionPool::select('main_question_pools.no_shuffle', "languages_question_pools.id", "question", "image", "video", "marks", "eliminatory_question", "school_id", "difficulty_level_id", 'family_id')
                        ->join('main_question_pools', 'main_question_pools.id', 'languages_question_pools.main_question_pool_id')
                        ->where('family_id', $de->family_id)
                        ->whereIn("difficulty_level_id", $diff_ids)
                        ->where('eliminatory_question', 0)
                        ->where('language_id', $request->language_id)
                        ->inRandomOrder()
                        ->take($de->total_questions - $da->no_of_elimentary_questions)
                        ->get();

                    $temp = $temp->merge($temp2);
                } else {
                    $temp = LanguagesQuestionPool::select('main_question_pools.no_shuffle', "languages_question_pools.id", "question", "image", "video", "marks", "eliminatory_question", "school_id", "difficulty_level_id", 'family_id')
                        ->join('main_question_pools', 'main_question_pools.id', 'languages_question_pools.main_question_pool_id')
                        ->where('family_id', $de->family_id)
                        ->whereIn("difficulty_level_id", $diff_ids)
                        ->where('eliminatory_question', 0)
                        ->where('language_id', $request->language_id)
                        ->inRandomOrder()
                        ->take($de->total_questions)
                        ->get();
                }
                $total_Exam_marks = 0;
                foreach ($temp as $te) {
                    if ($te->no_shuffle)
                        $te->options = Option::select("id", "option_name")->where("question_pool_id", $te->id)->get();
                    else
                        $te->options = Option::select("id", "option_name")->where("question_pool_id", $te->id)->inRandomOrder()->get();

                    array_push($questions, $te);
                    $total_Exam_marks += $te->marks;
                }

            }
            $exist = $questions;

            if (count($questions) < $da->total_questions) {
                $wantedQuestion = $da->total_questions - count($questions);
                $existFamilies = [];
                foreach ($exist as $q) {
                    array_push($existFamilies, $q->family_id);
                }
                $leftedFamilies = array_merge(array_diff($family_ids, $existFamilies), array_diff($existFamilies, $family_ids));
                $exist_ids = [];

                foreach ($exist as $q) {
                    array_push($exist_ids, $q->id);
                }

                foreach ($family_details as $dee) {
                    if (in_array($dee->family_id, $leftedFamilies)) {
                        $temp4 = LanguagesQuestionPool::select('main_question_pools.no_shuffle', "languages_question_pools.id", "question", "image", "video", "marks", "eliminatory_question", "school_id", "difficulty_level_id", 'family_id')
                            ->join('main_question_pools', 'main_question_pools.id', 'languages_question_pools.main_question_pool_id')
                            ->where('family_id', $dee->family_id)
                            ->whereNotIn('languages_question_pools.id', $exist_ids)
                            ->where('eliminatory_question', 0)
                            ->where('language_id', $request->language_id)
                            ->inRandomOrder()
                            ->take($dee->total_questions)
                            ->get();

                        foreach ($temp4 as $te4) {
                            if ($te4->no_shuffle)
                                $te4->options = Option::select("id", "option_name")->where("question_pool_id", $te4->id)->get();
                            else
                                $te4->options = Option::select("id", "option_name")->where("question_pool_id", $te4->id)->inRandomOrder()->get();

                            array_push($questions, $te4);
                            $total_Exam_marks += $te4->marks;
                        }
                    } else {
                        $temp4 = [];
                    }
                }

                if (count($temp4) > 0)
                    $temp = $temp->merge($temp4);

            }

            if (count($questions) < $da->total_questions) {
                $wantedQuestion = $da->total_questions - count($questions);
                $exist_ids = [];

                foreach ($exist as $q) {
                    array_push($exist_ids, $q->id);
                }

                $temp3 = LanguagesQuestionPool::select('main_question_pools.no_shuffle', "languages_question_pools.id", "question", "image", "video", "marks", "eliminatory_question", "school_id", "difficulty_level_id", 'family_id')
                    ->join('main_question_pools', 'main_question_pools.id', 'languages_question_pools.main_question_pool_id')
                    ->whereIn('family_id', $family_ids)
                    ->whereNotIn('languages_question_pools.id', $exist_ids)
                    ->where('eliminatory_question', 0)
                    ->where('language_id', $request->language_id)
                    ->inRandomOrder()
                    ->take($wantedQuestion)
                    ->get();

                foreach ($temp3 as $te3) {
                    if ($te3->no_shuffle)
                        $te3->options = Option::select("id", "option_name")->where("question_pool_id", $te3->id)->get();
                    else
                        $te3->options = Option::select("id", "option_name")->where("question_pool_id", $te3->id)->inRandomOrder()->get();

                    array_push($questions, $te3);
                    $total_Exam_marks += $te3->marks;
                }
                $temp = $temp->merge($temp3);
            }
        }


        if (count($questions) == 0) {
            return response()->json(["status" => false, "message" => "Questions Not Available!"], 200);
        }

        $result = [];
        $result["media_url"] = env('APP_URL');

        $result["exam_name"] = $em->exam_name;
        $result["duration"] = $data[0]->duration;
        $result["data"] = $questions;


        $ch = StudentsAnswersSub::where("student_id", $request->student_id)
            ->where("exam_type", $request->exam_type)
            ->where("licence_id", $request->license_id)
            ->where("sub_licence_id", $request->sub_license_id)
            ->where("is_submited", 0)->first();


        if ($ch) {
            $ch->is_submited = 1;
            $ch->save();
        }

        $id = StudentsAnswersSub::insertGetId([
            "exam_id" => $em->id,
            "exam_type" => $request->exam_type ? $request->exam_type : 1,
            "student_id" => $request->student_id,
            "licence_id" => $request->license_id,
            "sub_licence_id" => $request->sub_license_id,
            "language_id" => $request->language_id,
            "total_marks" => $total_Exam_marks,
            "total_questions" => count($questions),
            "pass_percentage" => $data[0]->pass_percentage,
            "created_at" => Carbon::parse($request->date_time)->toDateTimeString()
        ]);



        foreach ($questions as $ques) {

            StudentsAnswer::create([
                "question_pool_id" => $ques['id'],
                "option_id" => null,
                "question" => $ques['question'],
                "options" => Option::select('id', 'is_correct', 'option_name')->where("question_pool_id", $ques['id'])->get(),
                "image" => $ques['image'],
                "video" => $ques['video'],
                "marks" => $ques['marks'],
                "students_answers_sub_id" => $id,
                "is_eliminatory_question" => $ques['eliminatory_question'],
                "created_at" => Carbon::parse($request->date_time)->toDateTimeString()

            ]);

        }

        $result["reference_id"] = $id;

        return response()->json(["status" => true, "data" => $result], 200);
    }


    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'first_name' => "required",
            'second_name' => "required",
            'email' => "required|email",
            'gender' => "required|boolean",
            'id_number' => "required",
            'nationality' => "required",
            'school_id' => "required",
            'username' => "required",
            'password' => "required|confirmed",
            'license_id' => "required",
            'city' => "required",
            'image' => "required|mimes:jpg,bmp,png",
        ]);

        if ($validate->fails()) {
            return response()->json(["status" => false, "message" => $validate->messages()], 422);
        }

        $imageName = $request->first_name . '(' . $request->id_number . ').' . $request->image->extension();

        $request->image->move(storage_path('/public/students/images'), Str::lower($imageName));

        $temp = $request->all();
        $temp["image"] = "/storage/students/images/" . Str::lower($imageName);

        Students::create(Arr::except($temp, ["password_confirmation"]));

        return response()->json(["status" => true, "message" => "Successfully Added"], 200);

    }


    public function validateExam(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "reference_id" => "required",
            "license_id" => "required",
            "sub_license_id" => "required",
            "duration" => "required"
        ]);
        if ($validate->fails()) {
            return response()->json(["status" => false, "message" => $validate->messages()], 422);
        }

        $ExamCriteria = ExamCriteria::select("pass_percentage", "total_questions")
            ->where("licence_id", $request->license_id);

        if ($request->has('sub_license_id') && $request->sub_license_id) {
            $ExamCriteria = $ExamCriteria->where("sub_licence_id", $request->sub_license_id)->get()->first();
        } else {
            $ExamCriteria = $ExamCriteria->whereNull("sub_licence_id")->get()->first();
        }

        if (!$ExamCriteria) {
            return response()->json(["status" => false, "message" => "Invalid License Type ID!"], 422);
        }
        $exam = StudentsAnswersSub::find($request->reference_id);

        if (!$exam) {
            return response()->json(["status" => false, "message" => "Invalid referance id"], 400);
        } else if ($exam->is_submited == 1) {
            return response()->json(["status" => false, "message" => "Exam Already Submited"], 400);
        }

        $answers = StudentsAnswer::select("main_question_pools.eliminatory_question", "main_question_pools.marks", "students_answers.option_id")
            ->join("languages_question_pools", "languages_question_pools.id", "students_answers.question_pool_id")
            ->join("main_question_pools", 'main_question_pools.id', 'languages_question_pools.main_question_pool_id')
            ->where("students_answers.students_answers_sub_id", $exam->id)
            ->where('language_id', $exam->language_id)
            ->get();


        $total_questions = $ExamCriteria->total_questions;
        $correct = 0;
        $wrong = 0;
        $totalMarks = 0;
        $skippedQuestions = 0;
        $obtainedMarks = 0;
        $elimentaryWrong = 0;

        foreach ($answers as $answer) {

            $totalMarks += $answer->marks;
            if ($answer->option_id == null) {
                $skippedQuestions++;
            } else {

                $option = Option::find($answer->option_id);


                if ($option->is_correct == 1) {
                    $correct++;
                    $obtainedMarks += $answer->marks;
                } else {
                    if ($answer->eliminatory_question == 1) {
                        $elimentaryWrong++;
                    }
                    $wrong++;
                }
            }
        }

        $percentage = round((($obtainedMarks / $totalMarks) * 100), 2);

        if ($percentage >= $ExamCriteria->pass_percentage && $elimentaryWrong == 0) {
            $result = "pass";
        } else {
            $result = "fail";
        }
        $exam->total_marks = $totalMarks;
        $exam->obtained_marks = $obtainedMarks;
        $exam->total_correct_answers = $correct;
        $exam->total_wrong_answers = $wrong;
        $exam->total_skipped_answers = $skippedQuestions;
        $exam->total_questions = $total_questions;
        $exam->is_submited = 1;
        $exam->result = $result;
        $exam->duration = $request->duration;
        $exam->save();

        $response = [
            "total_question" => $total_questions,
            "correct_answers" => $correct,
            "wrong_answers" => $wrong,
            "eliminatory_wrong_answers" => $elimentaryWrong,
            "skipped_questions" => $skippedQuestions,
            "total_marks" => $totalMarks,
            "obtained_marks" => $obtainedMarks,
            "percentage" => $percentage . "%",
            "result" => $result,
            "duration" => $request->duration
        ];

        if ($exam->exam_type == 1) {
            $exam->delete();
        } else {
            $student = DB::table('students')->find($exam->student_id);
            DB::table('students')->where('id', $exam->student_id)->update(["status" => 0]);

            if ($student->user_id && $student->user_id != NULL) {
                $user = DB::table('users')->find($student->user_id);
                if ($user) {
                    DB::table('users')->where('id', $user->id)->update(["status" => 0]);

                }
            }
        }

        return response()->json(["status" => true, "data" => $response], 200);

    }

    function examPreview(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "reference_id" => "required",
        ]);
        if ($validate->fails()) {
            return response()->json(["status" => false, "message" => "reference id required"], 422);
        }

        $ch = StudentsAnswersSub::find($request->reference_id);
        $exam = Examination::find($ch->exam_id);

        $data = StudentsAnswer::selectRaw('COALESCE(duration, "--") as duration, options, question, COALESCE(option_id, 0) as selected_option_id, image, video, marks, students_answers.updated_at, students_answers.created_at, students_answers.is_eliminatory_question')
            ->leftJoin("students_answers_subs", "students_answers_subs.id", "students_answers.students_answers_sub_id")
            ->where("students_answers_sub_id", $request->reference_id)->get();

        foreach ($data as $da) {
            $da->options = json_decode($da->options);
            if ($ch->result == NULL || !$ch->result) {
                $da->answered_time = 0;
            } else {
                $da->answered_time = $da->updated_at != null ? date($da->updated_at) : 0;
            }
            if ($da->image) {
                $da->image = env("APP_URL") . $da->image;
            } else if ($da->video) {
                $da->video = env("APP_URL") . $da->video;
            }
        }


        if (!$ch) {
            return response()->json(["status" => false, "message" => "Invalid reference id"], 200);
        }

        if ($ch->total_marks == 0) {
            return response()->json(["status" => false, "message" => "Exam Not Submitted!"], 200);
        }

        $score_card = [
            "total_question" => $ch->total_questions,
            "correct_answers" => $ch->total_correct_answers ? $ch->total_correct_answers : 0,
            "wrong_answers" => $ch->total_wrong_answers ? $ch->total_wrong_answers : 0,
            "skipped_questions" => $ch->total_skipped_answers,
            "total_marks" => $ch->total_marks,
            "obtained_marks" => $ch->obtained_marks,
            "percentage" => round((($ch->obtained_marks / $ch->total_marks) * 100), 2) . "%",
            "result" => $ch->result,
            "duration" => $ch->duration ? $ch->duration : '--',
            "attended_status" => $ch->result ? 1 : 0,
            "exam_name" => $exam ? $exam->exam_name : '--'
        ];


        $res = Http::get("https://dsms.technoiq.in/backend/api/auth/student/get-name/0", [
            "student_id" => $ch->student_id
        ]);

        $student_names = $res["students_names"];
        $school_name = $res["school_name"];
        $nationality = $res["nationality"];
        $language = language::select('language_name')->find($ch->language_id);

        $student_info = [
            "id" => $ch->student_id,
            "name" => $student_names[$ch->student_id],
            "nationality_id" => $nationality[$ch->student_id] != NULL ? $nationality[$ch->student_id] : "--",
            "full_info" => $res['student_info'],
            "school_name" => $school_name[$exam->school_id],
            "language_name" => $language ? $language->language_name : '-'
        ];


        return response()->json(["status" => true, "message" => "Exam Preview", "data" => $data, "score_card" => $score_card, "student_info" => $student_info], 200);
    }

    function systemValidation(Request $request)
    {
        try {
            $authData = Crypt::decrypt($request->auth);
        } catch (DecryptException $e) {
            return response()->json(["status" => false, "message" => "Something went wrong, Kindly re-open the application"], 200);
        }
        $auth = Authenticator::where("school_id", $request->school_id)
            ->where("mac_id", $authData['mac_id'])
            ->where("status", 1)
            ->count();

        if ($auth > 0) {
            return response()->json(["status" => true, "message" => "Device is authorised"], 200);
        } else {
            return response()->json(["status" => false, "message" => "Device is unauthorized, Please contact school admin!"], 200);
        }

    }

    function mockExamStatus(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "school_id" => "required",
        ]);
        if ($validate->fails()) {
            return response()->json(["status" => false, "message" => "school_id required"], 422);
        }

        $ch = MockExamStatus::where("school_id", $request->school_id)->where("status", 1)->get()->first();
        if ($ch) {
            return response()->json(["status" => true], 200);
        } else {
            return response()->json(["status" => false, "message" => "Mock Exam is not activated"], 200);

        }

    }


}