<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LabTest;
use App\Models\Institution;



class AdminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('admin_check')->;
    // }
    public function index(){
        $medical_tests = LabTest::all()->groupBy('medical_number')->count();
        $joins = Institution::where('active',0)->count();
        $labs =Institution::where('active',1)->count();

        return view('admin.index', compact('medical_tests','joins','labs'));
    }
}
