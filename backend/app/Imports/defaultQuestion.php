<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use App\Models\LanguagesQuestionPool;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\DifficultyLevelMarks;
use App\Models\MainQuestionPool;
use App\Models\Language;
use App\Models\Option;
use App\Models\family;

use Log;

class defaultQuestion implements ToCollection, SkipsEmptyRows, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public $numberstoAlpha = ["option_1","option_2","option_3","option_4","option_5","option_6","option_7","option_8","option_9","option_10"];

    public function collection(Collection $collection)
    {
        foreach($collection as $col)
        {
            
            $fam_id = (explode(' | ', $col['family']))[1];
            $fam = family::find($fam_id);
            $diff_id = (explode(' ', $col['difficulty_level']))[1];
            $diff = DifficultyLevelMarks::where('level_id',$diff_id)->where('school_id', $fam->school_id)->get()->first();
            $main_id = MainQuestionPool::insertGetId([
                "family_id" => $fam_id,
                "difficulty_level_id" => $diff_id,
                "marks" => $diff->marks,
                "school_id" => $fam->school_id,
                "eliminatory_question" => $col['eliminatory_question'] == "Yes" ? 1 : 0,
                "image" =>  $col['question_type'] == "Image" ? $col['media'] : '',
                "video" =>  $col['question_type'] == "Video" ? $col['media'] : '',
            ]);
            $pool_id = LanguagesQuestionPool::insertGetId([
                'question'=> $col['question'],
                'language_id' => Language::where('school_id', $fam->school_id)->where('default_language', 1)->get()->first()->id,
                "main_question_pool_id" => $main_id
            ]);

            foreach($this->numberstoAlpha as $key=>$num)
            {
                if(isset($col[$num]))
                {
                    Option::create([
                        "option_name" => $col[$num],
                        "is_correct" => ($col['correct_option'] == $key+1) ? 1 : 0,
                        "question_pool_id" => $pool_id
                    ]);
                }
            }
        }
    }
}
