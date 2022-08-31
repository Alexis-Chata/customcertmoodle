<?php

namespace App\Http\Controllers;

use App\Models\CourseModules;
use App\Models\CustomcertIssues;
use App\Models\GradeGrades;
use App\Models\GradeItems;
use App\Models\Modules;
use App\Models\UserMoodle;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomcertController extends Controller
{
    public function index(){

        $customcertIssues = collect();

        return view('customcert', compact('customcertIssues'));
    }

    public function obtenercertificado(Request $request){

        $usermoodle = UserMoodle::firstWhere('username', $request->input('username'));
        $modules = Modules::firstWhere('name', 'customcert');
        $customcertIssues = CustomcertIssues::with('customcerts')->where('userid', $usermoodle->id)->get();
        foreach($customcertIssues as $customcertIssue){
            $courseModulexcurso = CourseModules::where('module', $modules->id)->where('course', $customcertIssue->customcerts->course)->first();
            $courseModulexcurso->url = env('AULA_MOODLE', 'https://aulavirtual.jademlearning.com/').'mod/customcert/view.php?id='.$courseModulexcurso->id.'&downloadissue='.$customcertIssue->userid;
            $gradeItems = GradeItems::where('courseid', $customcertIssue->customcerts->course)->whereNull('categoryid')->where('itemtype', 'course')->first();
            $gradeGrades = GradeGrades::with('gradeItems')->where('itemid', $gradeItems->id)->where('userid', $usermoodle->id)->first();
            $customcertIssue->fecha_expiracion = Carbon::parse($customcertIssue->timecreated)->addYear()->format('d-m-Y');
            $customcertIssue->gradeGrades = $gradeGrades;
            $customcertIssue->coursemodule = $courseModulexcurso;
            $customcertIssue->datausermoodle = $usermoodle;
        }
        // return $customcertIssues;
        return view('customcert', compact('customcertIssues'));
    }
}
