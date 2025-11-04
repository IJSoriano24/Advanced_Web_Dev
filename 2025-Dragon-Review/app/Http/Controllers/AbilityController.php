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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Dragon $dragon)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ])

        //create the review associated with the book and user
        $dragon->abilities()->create([
            'user_id' => auth()->id(),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'dragon_id' => $dragon->id
        ]);

        return redirect()->('dragons.show', $dragon)->with('success', 'Ability added successfully');

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ability $ability)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ability $ability)
    {
        //
    }
}
