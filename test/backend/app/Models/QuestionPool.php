<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class QuestionPool extends Model
{
    use HasFactory;
    protected $connection = "mysql";

    protected $guarded = [];

    // public function getImageAttribute($value)
    // {
    //     if($value)
    //     {
    //         return env('APP_URL') . $value;
    //     }
    // }
    // public function getVideoAttribute($value)
    // {
    //     if($value)
    //     {
    //         return env('APP_URL') . $value;
    //     }
    // }
}
