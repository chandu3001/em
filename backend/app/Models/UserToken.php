<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserToken extends Model
{
    use HasFactory;
    protected $connection = "mysql";

    protected $fillable = [
        'user_id',
        'role',
        'school_id',
        'token'
    ];
}
