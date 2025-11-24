<?php

namespace App\Http\Controllers;

use App\Models\Viking;
use Illuminate\Http\Request;

class VikingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(Request $request)
    // {
    //     $vikings = Viking::all();
    //     return view('vikings.index', compact('vikings'));
    // }

    public function index(Request $request)
    {
        $search = $request->input('search');
        //Fetch dragons from the database, optionally filtering by search query
        $vikings = Viking::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%"); //reads the query parameter 'search' from the request. Adds a SQL WHERE clause to filter dragons by type or color.
                     
            })
            ->get();
            //retrieves the filtered list of dragons from the database.
        return view('vikings.index', compact('vikings', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vikings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validate input
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'required|string',

            
        ]);

        //Check if the image is uploaded and handles it
        if ($request->hasFile('image')) {

            $imageName = time(). '.' .$request->image->extension();
            $request->image->move(public_path('images/vikings'), $imageName);
        }

        //create a dragon record in the database
        Viking::create([
            'name' => $request->name,
            'image' => $imageName, //store the image URL in the DB
            'bio'=> $request->bio,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //Redirect to the index page with a success message
        return to_route('vikings.index')->with('success', 'Viking created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Viking $viking)
    {
        return view('vikings.show')->with('viking', $viking);
                //load the ability with its associated abilities and the viking who made each review
        $viking->load('vikings.user');
        return view('vikings.show', compact('viking'));
        //compact is shorthand for this
        //return view ('dragons.show', ['dragon' => $dragon]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Viking $viking)
    {
        return view('vikings.edit', compact('viking'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Viking $viking)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'required|string',
        ]);

// prepare data for update. image is exluded to avoid overwriting it if no new image is uploaded.
        $data = $request->only(['name', 'bio']); //image is not included here. when $dragon->update($data) is called, image will not be updated and is left as is. This is to avoid having to always upload an image when updating other fields.

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/dragons'), $imageName);
            $data['image'] = $imageName;
        }

        $viking->update($data);

        //Redirect to the index page with a success message
        return redirect()->route('vikings.index')->with('success', 'Viking updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Viking $viking)
    {
        $viking->delete();

        return redirect()->route('vikings.index')->with('success', 'Viking deleted successfully!');
    }
}
