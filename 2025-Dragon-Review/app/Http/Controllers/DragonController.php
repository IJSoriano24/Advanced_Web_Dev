<?php

namespace App\Http\Controllers;

use App\Models\Dragon;
use Illuminate\Http\Request;

class DragonController extends Controller
{
    /**
     * Display a listing of the resource.
     */


public function index(Request $request)
{
    $search = $request->input('search');

    $dragons = Dragon::query()
        ->when($search, function ($query, $search) {
            $query->where('type', 'like', "%{$search}%")
                  ->orWhere('color', 'like', "%{$search}%");
        })
        ->get();

    return view('dragons.index', compact('dragons', 'search'));
}
    
    /**
     * Show the form for creating a new resource.
     */
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

        //Check if the image is uploaded and handle it
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
    public function show(Dragon $dragon)
    {
        return view('dragons.show')->with('dragon', $dragon);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dragon $dragon)
    {
        return view('dragons.edit', compact('dragon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dragon $dragon)
    {
        $request->validate([
            'type' => 'required',
            'color' => 'required|max:500',
            'personality' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_id' => 'nullable|string|max:255', // just a string, no file
        ]);

        $data = $request->only(['type', 'color', 'personality', 'video_id']);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/dragons'), $imageName);
            $data['image'] = $imageName;
        }

        $dragon->update($data);

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
