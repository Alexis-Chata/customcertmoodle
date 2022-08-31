<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeGrades extends Model
{
    use HasFactory;

    protected $connection = 'mysqlmoodle';
    protected $table = "weqh_grade_grades";

    public function gradeItems(){
        return $this->belongsTo(GradeItems::class, 'itemid');
    }
}
