<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::all();
    return view('properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
     public function create()
{
    return view('properties.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
        'name' => 'required',
        'location' => 'required',
        'units' => 'required|integer',
        'rent_amount' => 'required|numeric',
    ]);

    Property::create($request->all());

    return redirect()->route('properties.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('properties.edit', compact('property'));
}
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        $request->validate([
        'name' => 'required',
        'location' => 'required',
        'units' => 'required|integer',
        'rent_amount' => 'required|numeric',
    ]);

    $property->update($request->all());

    return redirect()->route('properties.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        //
    }


}
