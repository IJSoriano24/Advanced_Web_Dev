<?php

namespace App\Http\Controllers;

use App\Models\Viking;
use App\Models\Dragon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VikingController extends Controller
{

    public function index(Request $request)
    {
        // Retrieve the search query from the request
        $search = $request->input('search');

        // Fetch vikings, applying search filtering if needed
        $vikings = Viking::query()
            ->when($search, function ($query, $search) {
                // If a search term is provided, filter vikings by name only
                $query->where('name', 'like', "%{$search}%");
            })
            ->get(); // Retrieve results

        // Return view with vikings and the search input value
        return view('vikings.index', compact('vikings', 'search'));
    }

    /**
     * Show the form for creating a new viking.
     */
    public function create()
    {
        // Fetch all dragons so user can select which dragons this viking is linked to
        $dragons = Dragon::all();

        return view('vikings.create', compact('dragons'));
    }

    /**
     * Store a newly created viking in the database.
     */
    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'name'    => 'required',
            'image'   => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio'     => 'required|string',
            'dragons' => 'nullable|array',           // Expecting array of dragon IDs
            'dragons.*' => 'exists:dragons,id',     // Validate each ID exists
        ]);

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            // Create a unique filename using timestamp
            $imageName = time() . '.' . $request->image->extension();

            // Move uploaded image to public folder
            $request->image->move(public_path('images/vikings'), $imageName);
        }

        // Create new Viking record
        $viking = Viking::create([
            'name'  => $request->name,
            'image' => $imageName, // Saved image filename
            'bio'   => $request->bio,
        ]);

        // Attach selected dragons to the pivot table (dragon_viking)
        if ($request->has('dragons')) {
            $viking->dragons()->attach($request->dragons);
        }

        // Redirect back to index with success message
        return to_route('vikings.index')->with('success', 'Viking created successfully!');
    }

    /**
     * Display a single viking and its associated dragons.
     */
    public function show(Viking $viking)
    {
     
        $viking->load('dragons');

        return view('vikings.show', compact('viking'));
    }

    /**
     * Show the form for editing an existing viking.
     */
    public function edit(Viking $viking)
    {
        // Fetch dragons in case the edit form includes dragon selection
        $dragons = Dragon::all();

        return view('vikings.edit', compact('viking'));
    }

    /**
     * Update an existing viking.
     */
    public function update(Request $request, Viking $viking)
    {
        // Validate incoming request
        $request->validate([
            'name'  => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio'   => 'required|string',
        ]);

        //  update data without the image so you don't overwrite it if no new image is uploaded
        $data = $request->only(['name', 'bio']);

        // If a new image is uploaded, process and update it
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/vikings'), $imageName);

            $data['image'] = $imageName;
        }

        // Update the Viking record in database
        $viking->update($data);

        // Redirect with success message
        return redirect()->route('vikings.index')->with('success', 'Viking updated successfully!');
    }


    public function destroy(Viking $viking)
    {
        // Delete the Viking 
        $viking->delete();

        return redirect()->route('vikings.index')->with('success', 'Viking deleted successfully!');
    }
}
