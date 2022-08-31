<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeItems extends Model
{
    use HasFactory;

    protected $connection = 'mysqlmoodle';
    protected $table = "weqh_grade_items";
}
