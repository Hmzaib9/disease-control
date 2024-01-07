<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NormalRange;
use App\Models\PredefinedTest;

class NormalRangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Retrieve all normalRanges
        $parentid =$request->id;
        // dd($parentid);
        $normal_ranges = NormalRange::wherehas('predfined_tests', function($query) use($parentid){
            $query->where('id',$parentid);
        })->get();
// dd($normal_ranges);
        return view('admin.normal_ranges.view',compact('normal_ranges','parentid'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
       $tests = PredefinedTest::where('id', $id)->orwhere('parent_id', $id)->get();

       return view('admin.normal_ranges.edit_add', compact('id','tests'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        // dd('hi');
        $validator = $request->validate([
            'predefined_test_id' => 'required|exists:predefined_tests,id',
            'age' => 'required|numeric',
            'normal_range_type' => 'required|in:numeric,categorical,single_number',
            'normal_range_lower' => 'required_if:normal_range_type,numeric',
            'normal_range_upper' => 'required_if:normal_range_type,numeric',
            // 'normal_range_string' => 'required_if:normal_range_type,categorical|string',
            // 'normal_range_single_number'=>'required_if:normal_range_type,single_number',

        ],[
            'required'=>"This field is required",
            'required_if'=>"required with the range type."
        ]);
// dd('hi');
        $range = NormalRange::create([
            'predefined_test_id' =>$request->predefined_test_id,
            'age' =>$request->age,
            'normal_range_type' => $request->normal_range_type,
            'normal_range_lower' =>$request->normal_range_lower,
            'normal_range_upper' => $request->normal_range_lower,
            'normal_range_string' =>$request->normal_range_string,
            'normal_range_single_number'=>$request->normal_range_single_number,
        ]);

        if($range){
            return redirect()->route('normal_ranges.index',$range->predefined_test_id)->with('success', 'Record updated successfully.');
        }
       return redirect()->route('normal_ranges.index',$range->predefined_test_id)->with('error', 'Record was not updated.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $range = NormalRange::findOrFail($id);
        return view('admin.normal_ranges.show', compact('range'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $range = NormalRange::findOrFail($id);

        $tests = PredefinedTest::where('id', $range->predfined_tests->id)->orwhere('parent_id',$range->predfined_tests->id)->get();
        return view('admin.normal_ranges.edit_add', compact('range','tests','id'));

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
        $range = NormalRange::findOrFail($id);
        $range->update([
            'predefined_test_id' =>$request->predefined_test_id,
            'age' =>$request->age,
            'normal_range_type' => $request->normal_range_type,
            'normal_range_lower' =>$request->normal_range_lower,
            'normal_range_upper' => $request->normal_range_lower,
            'normal_range_string' =>$request->normal_range_string,
            'normal_range_single_number'=>$request->normal_range_single_number,
        ]);
        return redirect()->route('normal_ranges.index',$range->predefined_test_id)->with('success', 'Record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $range = NormalRange::findOrFail($id);
        $range->delete();

        return redirect()->back()->with('success', 'Record deleted successfully.');
    }
}
