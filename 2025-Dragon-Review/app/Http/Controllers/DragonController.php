<?php

namespace App\Http\Controllers;

use App\Models\Dragon;
use Illuminate\Http\Request;

class DragonController extends Controller
{
    /**
     * Display a listing of the resource.
     */


public function index(Request $request) //this handles search functionality
{
    $search = $request->input('search');
    //Fetch dragons from the database, optionally filtering by search query
    $dragons = Dragon::query()
        ->when($search, function ($query, $search) {
            $query->where('type', 'like', "%{$search}%") //reads the query parameter 'search' from the request. Adds a SQL WHERE clause to filter dragons by type or color.
                  ->orWhere('color', 'like', "%{$search}%");
        })
        ->get();
        //retrieves the filtered list of dragons from the database.
    return view('dragons.index', compact('dragons', 'search'));
}
    
    /**
     * Show the form for creating a new resource.
     */

    // displays the form to create a new dragon.
    //admin access check commented out for now.
    public function create()
    {
        // if (auth()->$user()->role !== 'admin') {
        //     return redirect()->route('dragons.index')->with('error', 'Access denied.');
        // }
        return view('dragons.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    // handles the form submission for creating a new dragon and creates a new dragon record in the database.
    public function store(Request $request)
    {
        //Validate input
        $request->validate([
            'type' => 'required',
            'color' => 'required|max:500',
            'personality' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
              'video_id' => 'nullable|string|max:500',
        ]);

        //Check if the image is uploaded and handles it
        if ($request->hasFile('image')) {

            $imageName = time(). '.' .$request->image->extension();
            $request->image->move(public_path('images/dragons'), $imageName);
        }

        //create a book record in the database
        Dragon::create([
            'type' => $request->type,
            'color' => $request->color, //fixed type from 'descriptn'
            'personality'=> $request->personality,
            'image' => $imageName, //store the image URL in the DB
            'video_id' => $request->video_id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //Redirect to the index page with a success message
        return to_route('dragons.index')->with('success', 'Dragon created successfully!');
    }

    /**
     * Display the specified resource.
     */
    // shows the details of a specific dragon.
    public function show(Dragon $dragon)
    {
        return view('dragons.show')->with('dragon', $dragon);
    }

    /**
     * Show the form for editing the specified resource.
     */

    // displays the form to edit an existing dragon.
    public function edit(Dragon $dragon)
    {
        return view('dragons.edit', compact('dragon'));
    }

    /**
     * Update the specified resource in storage.
     */

    // handles the form submission for updating an existing dragon and updates the dragon record in the database. optionally handles image uploads.
    public function update(Request $request, Dragon $dragon)
    {
        $request->validate([
            'type' => 'required',
            'color' => 'required|max:500',
            'personality' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_id' => 'nullable|string|max:255', // just a string, no file
        ]);

// prepare data for update. image is exluded to avoid overwriting it if no new image is uploaded.
        $data = $request->only(['type', 'color', 'personality', 'video_id']); //image is not included here. when $dragon->update($data) is called, image will not be updated and is left as is. This is to avoid having to always upload an image when updating other fields.

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/dragons'), $imageName);
            $data['image'] = $imageName;
        }

        $dragon->update($data);

        //Redirect to the index page with a success message
        return redirect()->route('dragons.index')->with('success', 'Dragon updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dragon $dragon)
    {
        $dragon->delete();

        return redirect()->route('dragons.index')->with('success', 'Dragon deleted successfully!');
    }



}
