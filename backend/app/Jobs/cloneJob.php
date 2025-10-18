<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\family;
use App\Models\DifficultyLevelMarks;
use App\Models\MainQuestionPool;
use App\Models\Language;
use App\Models\LanguagesQuestionPool;
use App\Models\Option;



class cloneJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $data;
    public $from;
    public $to;
    public function __construct($data, $from, $to)
    {
        $this->data = $data;
        $this->from = $from;
        $this->to = $to;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    // public function handle()
    // {
       
    //     foreach($this->data as $da)
    //     {
    //         $cloneFamily = family::find($da->family_id);

    //         $checkFamily = family::where("school_id", $this->to)->where('family_name', $cloneFamily->family_name)->get()->first();
    //            if(!$checkFamily)
    //            {
    //             $family_id = family::insertGetId([
    //                 "family_name" => $cloneFamily->family_name,
    //                 "school_id" => $this->to,
    //                 "status" => $cloneFamily->status,
    //                 "default_family" => $cloneFamily->default_family
    //             ]);
    //            }
    //            else
    //            {
    //             $family_id = $checkFamily->id;
    //            }

    //             $cloneDiffucultyLevel = DifficultyLevelMarks::where('level_id',$da->difficulty_level_id)->where('school_id', $this->from)->get()->first();
                
    //             $checkDiff = DifficultyLevelMarks::where("school_id", $this->to)->where('level_id', $cloneDiffucultyLevel->level_id)->get()->first();
    //             if(!$checkDiff)
    //             {
    //                 DifficultyLevelMarks::create([
    //                     "school_id" => $this->to,
    //                     "marks" => $cloneDiffucultyLevel->marks,
    //                     "level_id" => $da->difficulty_level_id
    //                 ]);
    //             }

    //             $main_pool_id = MainQuestionPool::insertGetId([
    //                 "school_id" => $this->to,
    //                 "marks" => $da->marks,
    //                 "family_id" => $family_id,
    //                 "difficulty_level_id" => $da->difficulty_level_id,
    //                 "image" => $da->image,
    //                 "video" => $da->video,
    //                 "eliminatory_question" => $da->eliminatory_question,
    //             ]);

    //             $getLang = MainQuestionPool::select('languages_question_pools.language_id')
    //             ->join('languages_question_pools', 'languages_question_pools.main_question_pool_id', 'main_question_pools.id')
    //             ->where("school_id", $this->from)
    //             ->where('main_question_pools.id', $da->main_id)->get();

    //             foreach($getLang as $lang)
    //             {
    //                 $cloneLang = Language::find($lang->language_id);
    //                 $checkLang = Language::where("school_id", $this->to)->where("language_code", $cloneLang->language_code)->get()->first();
    //                 if(!$checkLang)
    //                 {
    //                     $lang_id = Language::insertGetId([
    //                     "language_name" => $cloneLang->language_name,
    //                     "school_id" => $this->to,
    //                     "native_language_name" => $cloneLang->native_language_name,
    //                     "language_code" => $cloneLang->language_code,
    //                     "default_language" => $cloneLang->default_language,
    //                     "status" => $cloneLang->status
    //                     ]);
    //                 }
    //                 else
    //                 {
    //                     $checkLang->update([
    //                         "status" => $cloneLang->status
    //                     ]);
    //                     $lang_id = $checkLang->id;
    //                 }

    //                 $question = LanguagesQuestionpool::select('id', 'question')
    //                 ->where('main_question_pool_id', $da->main_id)
    //                 ->where('language_id', $lang->language_id)->get()->first();
                    
    //                 $pool_id = LanguagesQuestionPool::insertGetId([
    //                     "main_question_pool_id" => $main_pool_id,
    //                     "question" => $question->question,
    //                     "language_id" => $lang_id
    //                 ]);

    //                 $options = Option::where("question_pool_id", $question->id)->get();

    //                 foreach($options as $option)
    //                 {
    //                     Option::create([
    //                         "question_pool_id" => $pool_id,
    //                         "option_name" => $option->option_name,
    //                         "is_correct" => $option->is_correct,
    //                     ]);
    //                 }
    //             }
    //     }
    // }

    function handle()
    {
        foreach($this->data as $da)
        {
            $cloneFamily = family::find($da->family_id);

            $checkFamily = family::where("school_id", $this->to)->where('family_name', $cloneFamily->family_name)->get()->first();
               if(!$checkFamily)
               {
                $family_id = family::insertGetId([
                    "family_name" => $cloneFamily->family_name,
                    "school_id" => $this->to,
                    "status" => $cloneFamily->status,
                    "default_family" => $cloneFamily->default_family
                ]);
               }
               else
               {
                $family_id = $checkFamily->id;
               }

                $cloneDiffucultyLevel = DifficultyLevelMarks::where('level_id',$da->difficulty_level_id)->where('school_id', $this->from)->get()->first();
                
                $checkDiff = DifficultyLevelMarks::where("school_id", $this->to)->where('level_id', $cloneDiffucultyLevel->level_id)->get()->first();
                if(!$checkDiff)
                {
                    DifficultyLevelMarks::create([
                        "school_id" => $this->to,
                        "marks" => $cloneDiffucultyLevel->marks,
                        "level_id" => $da->difficulty_level_id
                    ]);
                }

                $main_pool_id = MainQuestionPool::insertGetId([
                    "school_id" => $this->to,
                    "marks" => $da->marks,
                    "family_id" => $family_id,
                    "difficulty_level_id" => $da->difficulty_level_id,
                    "image" => $da->image,
                    "video" => $da->video,
                    "eliminatory_question" => $da->eliminatory_question,
                ]);

                $getLang = MainQuestionPool::select('languages_question_pools.language_id')
                ->join('languages_question_pools', 'main_question_pools.id', 'languages_question_pools.main_question_pool_id')
                ->where("school_id", $this->from)
                ->where('languages_question_pools.main_question_pool_id', $da->id)->distinct('languages_question_pools.language_id')->get();

                foreach($getLang as $lang)
                {
                    $cloneLang = Language::find($lang->language_id);
                    $checkLang = Language::where("school_id", $this->to)->where("language_code", $cloneLang->language_code)->get()->first();
                    if(!$checkLang)
                    {
                        $lang_id = Language::insertGetId([
                        "language_name" => $cloneLang->language_name,
                        "school_id" => $this->to,
                        "native_language_name" => $cloneLang->native_language_name,
                        "language_code" => $cloneLang->language_code,
                        "default_language" => $cloneLang->default_language,
                        "status" => $cloneLang->status
                        ]);
                    }
                    else
                    {
                        $checkLang->update([
                            "status" => $cloneLang->status
                        ]);
                        $lang_id = $checkLang->id;
                    }

                    $question = LanguagesQuestionPool::select('id', 'question')
                    ->where('main_question_pool_id', $da->id)
                    ->where('language_id', $lang->language_id)->get()->first();
                    
                    $pool_id = LanguagesQuestionPool::insertGetId([
                        "main_question_pool_id" => $main_pool_id,
                        "question" => $question->question,
                        "language_id" => $lang_id
                    ]);

                    $options = Option::where("question_pool_id", $question->id)->get();

                    foreach($options as $option)
                    {
                        Option::create([
                            "question_pool_id" => $pool_id,
                            "option_name" => $option->option_name,
                            "is_correct" => $option->is_correct,
                        ]);
                    }
                }
        }

    }
}
