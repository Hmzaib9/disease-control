<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use Illuminate\Support\Facades\Session;

class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all locations
        $locations = Location::all();
        return view('admin.locations.view',compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.locations.edit_add');
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
            'location' => 'required|string',
        ],
        [
            'required'=>"This field is required",
            
        ]);

        try{
            $location = Location::create([
                'name'=>$request->location
            ]);
            return redirect()->route('locations.index')->with('success', 'Record created successfully');

        }catch(\Exception $e){
            return redirect()->route('locations.index')->with('error', 'Record creation failed.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $location = Location::findOrFail($id);
        return view('admin.locations.show', compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location = Location::findOrFail($id);
        return view('admin.locations.edit_add', compact('location'));

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
        $location = Location::findOrFail($id);

        try{
            $location->update([
                'name'=>$request->location
            ]);
                // update successful, show success flash message
                return redirect()->route('locations.index')->with('success', 'Record updated successfully.');
            } catch (\Exception $e) {
                // Delete failed, show error flash message
                return redirect()->route('locations.index')->with('error', 'Failed to delete location');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
        $location = Location::findOrFail($id);
        $location->delete();
            // Delete successful, show success flash message
            return redirect()->route('locations.index')->with('success', 'Record deleted successfully.');
        } catch (\Exception $e) {
            // Delete failed, show error flash message
            return redirect()->route('locations.index')->with('error', 'Failed to delete location');
        }
    }
}
