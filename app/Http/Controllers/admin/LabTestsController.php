<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LabTest;
use App\Models\LabTestMetadata;
class LabTestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all lab_tests
        $lab_tests = LabTest::all()->groupBy('medical_number');
         return view('admin.lab_tests.view',compact('lab_tests'));
    }

    public function view_tests_by_category_id($category_id){
        $lab_tests = LabTest::whereHas('category',function($query) use($category_id){
           $query->where('cat_id',$category_id);
        })->get()->groupBy('medical_number');
        return view('admin.lab_tests.view',compact('lab_tests'));

    }

    public function show_tests_by_medical_number($medical_number){
        $lab_tests = LabTest::where('medical_number',$medical_number)->get();
        return view('admin.lab_tests.view',compact('lab_tests'));

    }

    public function search(Request $request){
        $key = $request->key;
        $lab_tests = LabTest::whereHas('category',function($query) use($key){
           $query->where('name', 'like', '%' . $key . '%');
        })->orwherehas('meta_data', function($query)use($key){
            $query->where('patient_name', 'like', '%' . $key . '%');
        })->orwherehas('location', function($query) use($key){
            $query->where('name', 'like', '%' . $key . '%');
        })->orwherehas('meta_data', function($query) use($key){
            $query->where('medical_number', 'like', '%' . $key . '%');
        })->get()->groupBy('medical_number');
        // dd($lab_tests);
        return view('admin.lab_tests.view',compact('lab_tests'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lab_tests.edit_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {

        $validator = $request->validate([
            'test_id' => 'required|exists:predefined_tests,id',
            'lab_testmetadata_id'=>'required|exists:lab_test_metadata,id',
            'test_value'=>'required',
            'parent_id'=> 'sometimes|exists:lab_tests,id',
        ],
        [
            'required'=>"This field is required",
            'exists'=>'This value does not exists'
        ]);

        $labTest = LabTest::create([
            'test_id' => $request->test_id,
            'lab_testmetadata_id'=>$request->lab_testmetadata_id,
            'test_value'=>$request->test_value,
            'parent_id'=> $request->parent_id,
        ]);

        if($labTest){
            return redirect()->back()->with('success', 'Record created successfully.');
        }
       return redirect()->back()->with('success', 'Record created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $labTest = LabTest::findOrFial($id);
        return view('admin.lab_tests.show', compact('labTest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $labTest = LabTest::findOrFial($id);
        return view('admin.lab_tests.edit_add', compact('labTest'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $labTest = LabTest::findOrFail($id);
        $validator = $request->validate([
            'test_id' => 'exists:predefined_tests,id',
            'lab_testmetadata_id'=>'exists:lab_test_metadata,id',
            'parent_id'=> 'sometimes|exists:lab_tests,id',
        ],
        [
            'required'=>"This field is required",
            'exists'=>'This value does not exists'
        ]);

        $labTest = $labTest->update([
            'test_id' => $request->test_id,
            'lab_testmetadata_id'=>$request->lab_testmetadata_id,
            'test_value'=>$request->test_value,
            'parent_id'=> $request->parent_id,
        ]);

        if($labTest){
            return redirect()->back()->with('success', 'Record updated successfully.');
        }
       return redirect()->back()->with('success', 'Record updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::findOrFial($id);
        $location->delete();

        return redirect()->back()->with('success', 'Record deleted successfully.');
    }
}
