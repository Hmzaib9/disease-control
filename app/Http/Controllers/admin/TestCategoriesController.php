<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TestCategory;

class TestCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all testCategories
        $categories = TestCategory::all();
        return view('admin.test_categories.view',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.test_categories.edit_add');
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
            'name' => 'required|string',
        ],
        [
            'required'=>"This field is required"
        ]);

        $category = TestCategory::create([
            'name'=>$request->name
        ]);

        if($category){
            return redirect()->route('test_categories.index')->with('success', 'Record created successfully.');
            // session()->flash('success', 'Data saved successfully.');
            // return redirect()->intended('admin.locations')->with('success', true);
        }
       return redirect()->route('test_categories.index')->with('error', 'Something went wrong.');
        // return redirect()->withErrors($validator)->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = TestCategory::findOrFail($id);
        return view('admin.test_categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = TestCategory::findOrFail($id);
        return view('admin.test_categories.edit_add', compact('category'));

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
        $category = TestCategory::findOrFail($id);
        $category->update([
            'name'=>$request->name
        ]);
        return redirect()->route('test_categories.index')->with('success', 'Record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = TestCategory::findOrFail($id);
        $category->delete();

        return redirect()->back()->with('success', 'Record deleted successfully.');
    }
}
