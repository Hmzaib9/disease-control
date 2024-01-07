<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Institution;
use Illuminate\Validation\Rule;

class InstitutionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // Retrieve all institutions
         $labs = Institution::all();
         return view('admin.institutions.view',compact('labs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.institutions.edit_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd('hi');
        // dd($request->all());
        $validator = $request->validate([
            'name' => 'required|string',
            'active' => 'required',
            'address' => 'required|string',
            'map_link' => 'string',
            'email' => 'required|email|unique:institutions,email',
            'contact_number' => 'required|numeric',
            'head_doctor_name' => 'string',
            'head_doctor_phone' => 'numeric',
            'technical_officer_name'=>'string',
            'technical_officer_phone'=>'numeric',
        ],
        [
            'required'=>"This field is required",
            'string'=>'This field must be a string',
            'numeric'=>"This field must be numeric"
        ]);



        $institute = Institution::create([
            'name' => $request->name,
            'active' => $request->active,
            'address' => $request->address,
            'map_link' => $request->map_link ?? '',
            'email' => $request->email,
            'password' => bcrypt($request->email),
            'contact_number' => $request->contact_number,
            'head_doctor_name' => $request->head_doctor_name,
            'head_doctor_phone' => $request->head_doctor_phone,
            'technical_officer_name'=>$request->technical_officer_name,
            'technical_officer_phone'=>$request->technical_officer_phone,
            'avatar'=>'anything'
        ]);

        if($institute){
            return redirect()->route('institutions.index')->with('success', 'Record created successfully.');
        }
       return redirect()->route('institutions.index')->with('error', 'Record was not created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $institute = Institution::findOrFail($id);
        return view('admin.institutions.show', compact('institute'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $institute = Institution::findOrFail($id);
        return view('admin.institutions.edit_add', compact('institute'));
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

        $institute = Institution::findOrFail($id);
        $validator = $request->validate([
            'name' => 'required|string',
            'active' => 'required',
            'address' => 'required|string',
            'map_link' => 'string',
            'email' => [
                'required',
                'email',
                Rule::unique('institutions')->ignore($id),
            ],
            'contact_number' => 'required|numeric',
            'head_doctor_name' => 'string',
            'head_doctor_phone' => 'numeric',
            'technical_officer_name'=>'string',
            'technical_officer_phone'=>'numeric',
        ],
        [
            'required'=>"This field is required",
            'string'=>'This field must be a string',
            'numeric'=>"This field must be numeric"

        ]);


        $institute = $institute->update([
            'name' => $request->name,
            'active' => $request->active,
            'address' => $request->address,
            'map_link' => $request->map_link ?? '',
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            'head_doctor_name' => $request->head_doctor_name,
            'head_doctor_phone' => $request->head_doctor_phone,
            'technical_officer_name'=>$request->technical_officer_name,
            'technical_officer_phone'=>$request->technical_officer_phone,
        ]);

        if($institute){
            return redirect()->route('institutions.index')->with('success', 'Record updated successfully.');
        }
       return redirect()->route('institutions.index')->with('error', 'Record was not updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $institute = Institution::findOrFail($id);
        $institute->delete();

        return redirect()->route('institutions.index')->with('success', 'Record deleted successfully.');
    }
}
