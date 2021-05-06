<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RobinLog;

class RobinReportController extends Controller
{
    public function dashboard(){

        $log = RobinLog::orderBy('created_at','desc')->get();
        return view('dashboard',['log'=>$log]);
    }
}
