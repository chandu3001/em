<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefaultBulkUploadIntruction extends Model
{
    use HasFactory;
    protected $connection = "mysql";

}
