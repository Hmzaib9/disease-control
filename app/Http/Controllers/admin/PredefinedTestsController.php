<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PredefinedTest;
use Illuminate\Http\Response;

class PredefinedTestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all predefined tests
        $defined_tests = PredefinedTest::whereNull('parent_id')->get();
        return view('admin.predefined_tests.view', compact('defined_tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.predefined_tests.edit_add');
    }


    public function store(Request $request )
    {
        $validator = $request->validate([
            'test_name' => 'required|string',
            'measurement_unit' => 'required',
        ],
        [
            'required' => "This field is required",
            'string' => "This field measurement_unitst be a string only."
        ]);

        $predefinedTest = PredefinedTest::create([
            'test_name' => $request->test_name,
            'measurement_unit' => $request->measurement_unit,
        ]);
        if(isset($request->all) && count($request->all) > 0){
            foreach($request->all as $sub){
                PredefinedTest::create([
                    'test_name' => $sub['test_name'],
                    'measurement_unit' => $sub['measurement_unit'] ,
                    'parent_id'=>$predefinedTest->id
                ]);
            }
        }


        if ($predefinedTest) {
            return response()->json(['success' => 'Record updated successfully.'], Response::HTTP_OK);
        }

        return response()->json(['error' => 'Record was not stored.'], Response::HTTP_BAD_REQUEST);
    }

    public function show($id)
    {
        $predefined_tests = PredefinedTest::findOrFail($id);
        return view('admin.predefined_tests.show', compact('predefined_tests'));
    }

    public function edit($id)
    {
        $defined_test = PredefinedTest::findOrFail($id);
        $subs = PredefinedTest::where('parent_id', $id)->whereNull('deleted_at')->get();
        return view('admin.predefined_tests.edit_add', compact('defined_test','subs'));

    }


    public function update(Request $request, $id)
    {
        $defined_test = PredefinedTest::findOrFail($id);
        $validator = $request->validate([
            'test_name' => 'required|string',
            'measurement_unit' => 'required',
        ],
        [
            'required' => "This field is required",
            'string' => "This field must be a string only."
        ]);

        $defined_test->update([
            'test_name' => $request->test_name,
            'measurement_unit' => $request->measurement_unit,
        ]);

        try{
            PredefinedTest::where('parent_id', $defined_test->id)->delete();
            if($request->all){
                foreach($request->all as $sub){
                    PredefinedTest::create([
                        'test_name' => $sub['test_name'],
                        'measurement_unit' => $sub['measurement_unit'],
                        'parent_id'=>$defined_test->id
                    ]);
                }
            }
            if ($defined_test) {
                return response()->json(['success' => 'Record updated successfully.'], Response::HTTP_OK);
            }

        }catch(\Exception $e){
            return response()->json(['error' => 'Record was not updated.'], Response::HTTP_BAD_REQUEST);

        }
    }

    public function destroy($id)
    {
        $PredefinedTest = PredefinedTest::findOrFail($id);
        $PredefinedTest->delete();

        return redirect()->back()->with('success', 'Record deleted successfully.');
    }
}
