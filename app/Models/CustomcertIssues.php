<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomcertIssues extends Model
{
    use HasFactory;

    protected $connection = 'mysqlmoodle';
    protected $table = "weqh_customcert_issues";

    public function customcerts(){
        return $this->belongsTo(Customcert::class, 'customcertid');
    }
}
