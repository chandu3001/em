<?php

namespace App\Http\Controllers;

use App\Models\DifficultyLevelMarks;
use App\Models\difficulty_level;
use App\Models\MainQuestionPool;
use App\Models\Language;
use App\Models\family;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class DifficultyLevelMarksController extends Controller
{

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "difficulty_levels" => "required",
            "school_id" => "required",
        ]);

        if ($validate->fails()) {
            return response()->json(['status' => false, 'message' => $validate->messages()], 422);
        }

        foreach ($request->difficulty_levels as $data) {
            $check = DifficultyLevelMarks::where("school_id", $request["school_id"])->where("level_id", $data["level_id"])->first();
            if ($check) {
                MainQuestionPool::where('difficulty_level_id', $check->level_id)->where('school_id', $request["school_id"])->update(['marks' => $data["marks"]]);
                $check->update([
                    "marks" => $data["marks"],
                ]);
            } else {
                DifficultyLevelMarks::create([
                    "school_id" => $request["school_id"],
                    "marks" => $data["marks"],
                    "level_id" => $data["level_id"]
                ]);
            }
        }
        return response()->json(["status" => true, "message" => "Successfully Updated"], 200);

    }


    public function show($school_id, DifficultyLevelMarks $difficultyLevelMarks)
    {
        $data = $difficultyLevelMarks::select('difficulty_levels.*', 'difficulty_level_marks.*')
            ->join("difficulty_levels", "difficulty_levels.id", "difficulty_level_marks.level_id")
            ->where("school_id", $school_id)->orderby('difficulty_levels.id')->get();
        return response()->json(["status" => true, "message" => "diffuculty level list", "data" => $data], 200);
    }

    function getAvailableQuestions($data, $family_ids)
    {
        $language_ids = Language::select('id')->where('school_id', $data->school_id)->where('default_language', 1)->where('status', 1)->get()->pluck('id');
        $commonQuestions = [];
        foreach ($language_ids as $lang_id) {
            $temp = MainQuestionPool::join('languages_question_pools', 'main_question_pools.id', 'languages_question_pools.main_question_pool_id')
                ->whereIn('family_id', $family_ids)
                ->where("difficulty_level_id", $data->level_id)
                ->where('language_id', $lang_id)->where("eliminatory_question", 0)->count();
            if ($temp == 0) {
                $commonQuestions = [0];
                break;
            }
            array_push($commonQuestions, $temp);

        }
        return min($commonQuestions);
    }
    function getTotalQuestions($diff_id, MainQuestionPool $pool, Request $request)
    {
        $validate = Validator::make($request->all(), [
            "family_ids" => "required",
        ]);

        if ($validate->fails()) {
            return response()->json(['status' => false, 'message' => "Family ids Required"], 422);
        }

        $data = DifficultyLevelMarks::select('school_id', 'level_id')->find($diff_id);

        if ($data) {

            $total = $this->getAvailableQuestions($data, $request->family_ids);
            return response()->json(["status" => true, "message" => "Total Questions in Difficulty", "total_questions" => $total], 200);

        } else {
            return response()->json(["status" => false, "message" => "Invalid Difficulty Id"], 200);
        }
    }

    function getDiffLevelsByFamilyId($family_id)
    {
        $data = MainQuestionPool::select('difficulty_levels.id', 'difficulty_levels.level')
            ->join('difficulty_levels', 'main_question_pools.difficulty_level_id', 'difficulty_levels.id')
            ->join('languages_question_pools', 'main_question_pools.id', 'languages_question_pools.main_question_pool_id')
            ->join('languages', 'languages_question_pools.language_id', 'languages.id')
            ->where('default_language', 1)
            ->where('main_question_pools.family_id', $family_id)->orderby('id')->groupby('id', 'level')->get();
        return response()->json(["status" => true, "data" => $data], 200);
    }
    function getDiffLevelsByFamilyIds(Request $request)
    {

        $family_ids = $request->family_ids;
        if (count($family_ids) > 0) {
            $school_id = family::select('school_id')->find($family_ids[0])->school_id;
            $data = MainQuestionPool::select('difficulty_level_marks.id', 'difficulty_levels.level')
                ->join('difficulty_levels', 'main_question_pools.difficulty_level_id', 'difficulty_levels.id')
                ->join('difficulty_level_marks', 'difficulty_levels.id', 'difficulty_level_marks.level_id')
                ->join('languages_question_pools', 'main_question_pools.id', 'languages_question_pools.main_question_pool_id')
                ->join('languages', 'languages_question_pools.language_id', 'languages.id')
                ->where('default_language', 1)
                ->where('difficulty_level_marks.school_id', $school_id)
                ->whereIn('main_question_pools.family_id', $family_ids)
                ->where('eliminatory_question', 0)
                ->orderby('id')
                ->groupby('difficulty_level_marks.id', 'difficulty_levels.level')->get();
        } else {
            $data = [];
        }
        return response()->json(["status" => true, "data" => $data], 200);
    }
}