<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DifficultyLevelMarks extends Model
{
    use HasFactory;
    protected $connection = "mysql";

    protected $fillable = [
        'school_id',
        'level_id',
        'marks'
    ];
}
