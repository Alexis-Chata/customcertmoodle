<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseModules extends Model
{
    use HasFactory;

    protected $connection = 'mysqlmoodle';
    protected $table = "weqh_course_modules";
}
