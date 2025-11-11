<?php

namespace App\Http\Controllers;

use App\Models\Ability;
use App\Models\Dragon;
use Illuminate\Http\Request;


class AbilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abilities = Ability::all(); //fetch all abilities
        return view('abilities.index', compact('abilities')); //return the view with books
    }

    /**
     * Show the form for creating a new resource.
     */
public function create(Dragon $dragon)
    {
       
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('dragons.index')->with('error', 'Access Denied');
        }
        return view('abilities.create', compact('dragon'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Dragon $dragon)
    {
  
        $request->validate([
            'dragon_id'=> 'required',
            'name' => 'required|string|min:1|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

     
        //create the review associated with the dragon and user
        $dragon->abilities()->create([
            
            // 'user_id' => auth()->id(),
            'dragon_id'=> 2,
            // 'dragon_id'=> $request->input('dragon_id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            
        ]);
  dd($request);
        return redirect()->route('dragons.show', $dragon)->with('success', 'Ability added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Ability $ability)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ability $ability)
    {
        //check if user is the ownder or an admin
        if (auth()->user()->id !== $ability->user_id && auth()->user()->role !== 'admin') {
            return redirect()->route('dragons.index')->with('error', 'Access denied.');
        }

        return view('abilities.edit', compact('ability'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ability $ability)
    {
        //check to ensure the user is authorised to update this content

        //your validation code here

        //you must consider what attributes can be altered in your table
        //only rating and comment cam be altered, not dragon_id or user_id
        $ability->update($request->only(['name', 'description']));

        //once its updated its updated in the db, redirect somewhere that makes sense for your application
        return redirect()->route('dragons.show', $ability->dragon_id)
                        ->with('success', 'ability updated successfully.');
                        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ability $ability)
    {
        //
    }
}
