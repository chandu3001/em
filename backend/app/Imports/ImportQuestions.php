<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use App\Models\LanguagesQuestionPool;
use App\Models\MainQuestionPool;
use App\Models\DifficultyLevelMarks;
use App\Models\Language;
use App\Models\Option;
use App\Models\family;




class ImportQuestions implements ToCollection, WithHeadingRow, SkipsEmptyRows, WithChunkReading
{
    /**
     * @param Collection $collection
     */


    public function collection(Collection $collection)
    {
        if (count($collection) > 0) {
            if (isset($collection[0]['id']) && isset($collection[0]['language_id'])) {
                $numberstoAlpha = ["one", "two", "three", "four", "five", "six", "seven", "eight", "nine", "ten"];
                $language = Language::find($collection[0]['language_id']);
                $language_name = strtolower($language->language_name);

                foreach ($collection as $col) {
                    $isExist = MainQuestionPool::find($col['id']);

                    if ($isExist) {
                        $check = LanguagesQuestionPool::where('main_question_pool_id', $col['id'])->where('language_id', $language->id)->count();

                        if ($check == 0) {
                            $id = LanguagesQuestionPool::insertGetId([
                                "main_question_pool_id" => $col['id'],
                                "question" => $col[$language_name . '_question'],
                                "language_id" => $language->id
                            ]);

                            for ($i = 0; $i < 10; $i++) {
                                if (isset($col[$language_name . '_answer_' . $numberstoAlpha[$i]])) {

                                    Option::create([
                                        "option_name" => $col[$language_name . '_answer_' . $numberstoAlpha[$i]],
                                        "is_correct" => ($col[$language_name . '_correct_answer'] == ($i + 1)) ? 1 : 0,
                                        "question_pool_id" => $id
                                    ]);
                                }
                            }
                        }
                    }

                }
            } else {

                $numberstoAlpha = ["answer_1", "answer_2", "answer_3", "answer_4", "answer_5", "answer_6", "answer_7", "answer_8", "answer_9", "answer_10"];

                foreach ($collection as $col) {

                    $fam_id = (explode(' | ', $col['group']))[1];
                    $fam = family::find($fam_id);
                    $diff_id = (explode(' ', $col['difficulty_level']))[1];
                    $diff = DifficultyLevelMarks::where('level_id', $diff_id)->where('school_id', $fam->school_id)->get()->first();

                    $main_id = MainQuestionPool::insertGetId([
                        "family_id" => $fam_id,
                        "difficulty_level_id" => $diff_id,
                        "marks" => $diff->marks,
                        "school_id" => $fam->school_id,
                        "eliminatory_question" => $col['eliminatory_question'] == "Yes" ? 1 : 0,
                        "image" => '',
                        "video" => '',
                        "no_shuffle" => $col['all_of_the_above'] == "Yes" ? 1 : 0,

                    ]);
                    $pool_id = LanguagesQuestionPool::insertGetId([
                        'question' => $col['question'],
                        'language_id' => Language::where('school_id', $fam->school_id)->where('default_language', 1)->get()->first()->id,
                        "main_question_pool_id" => $main_id
                    ]);

                    foreach ($numberstoAlpha as $key => $num) {
                        if ($col['all_of_the_above'] == 'Yes' && $col['all_of_the_above_is_correct'] == 'Yes') {
                            $is_correct = 0;
                        } elseif (($col['correct_answer'] == $key + 1)) {
                            $is_correct = 1;
                        } else {
                            $is_correct = 0;
                        }

                        if (isset($col[$num])) {
                            Option::create([
                                "option_name" => $col[$num],
                                "is_correct" => $is_correct,
                                "question_pool_id" => $pool_id
                            ]);
                        }
                    }

                    if ($col['all_of_the_above'] == "Yes") {
                        Option::create([
                            "option_name" => "All of the above",
                            "is_correct" => ($col['all_of_the_above_is_correct'] == "Yes") ? 1 : 0,
                            "question_pool_id" => $pool_id
                        ]);
                    }

                }
            }
            return true;
        } else {
            return false;
        }
    }

    public function chunkSize(): int
    {
        return 100;
    }

}