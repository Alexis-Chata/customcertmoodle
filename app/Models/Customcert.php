<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customcert extends Model
{
    use HasFactory;

    protected $connection = 'mysqlmoodle';
    protected $table = "weqh_customcert";

}
