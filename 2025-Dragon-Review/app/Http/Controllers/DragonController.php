<?php

namespace App\Http\Controllers;

use App\Models\Dragon;
use Illuminate\Http\Request;

class DragonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dragons = Dragon::all(); //fetch all books
        return view('dragons.index', compact('dragons')); //return view with books
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dragons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validate input
        $request->validate([
            'type' => 'required',
            'color' => 'required|max:500',
            'personality' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        //Check if the image is uploaded and handle it
        if ($request->hasFile('image')) {

            $imageName = time(). '.' .$request->image->extension();

        }

        //create a book record in the database
        Dragon::create([
            'type' => $request->type,
            'color' => $request->color, //fuxed type from 'descriptn'
            'personality'=> $request->personality,
            'image' => $imageName, //store the image URL in the DB
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //Redirect to the index page with a success message
        return to_route('dragons.index')->with('success', 'Dragon created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dragon $dragon)
    {
        return view('dragons.show')->with('dragon', $dragon);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dragon $dragon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dragon $dragon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dragon $dragon)
    {
        //
    }
}
