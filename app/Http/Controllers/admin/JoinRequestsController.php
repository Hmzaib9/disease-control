<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Institution;
class JoinRequestsController extends Controller
{
    public function index(){
        $requests = Institution::where('active',0)->get();
        return view('admin.join_requests.view',compact('requests'));
    }

    public function accept_request(Request $request){
        try{
            $requests = Institution::where(['active'=>0, 'id'=>$request->id])->update(['active'=>1]);
            return redirect()->route('join.index')->with('success','Account is now active.');
        }catch(\Exception $e ){
            return redirect()->route('join.index')->with('error','Account is not active. Try Again.');

        }

    }

    public function refuse_request(Request $request){

        try{
            $requests = Institution::where(['active'=>0, 'id'=>$request->id])->delete();
            return redirect()->route('join.index')->with('success','Account has been refused.');
        }catch(\Exception $e ){
            return redirect()->route('join.index')->with('error','Something went wrong.. Try Again.');

        }
    }

    public function show_request(Request $req){
        $request = Institution::findOrFail($req->id);
        return view('admin.join_requests.show', compact('request'));
    }
}
