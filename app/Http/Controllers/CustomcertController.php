<?php

namespace App\Http\Controllers;

use App\Models\CourseModules;
use App\Models\CustomcertIssues;
use App\Models\Modules;
use App\Models\UserMoodle;
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
            $courseModulexcurso = CourseModules::where('module', $modules->id)->where('course', $customcertIssue->customcerts->course)->get();
            foreach( $courseModulexcurso as $courseModulexcursoDatos ){
                $courseModulexcursoDatos->url = env('AULA_MOODLE', 'https://aulavirtual.jademlearning.com/').'mod/customcert/view.php?id='.$courseModulexcursoDatos->id.'&downloadissue='.$customcertIssue->userid;
            }
            $customcertIssue->coursemodule = $courseModulexcurso;
            $customcertIssue->datausermoodle = $usermoodle;
        }
        // return $customcertIssues;
        return view('customcert', compact('customcertIssues'));
    }
}
