<?php

namespace App\Http\Controllers;

use App\Models\Ability;
use App\Models\Dragon;
use Illuminate\Http\Request;

class AbilityController extends Controller
{
    /**
     * Display a listing of all abilities.
     */
    public function index()
    {
        // Fetch every ability from the database
        $abilities = Ability::all();

        // Return the ability index view with the retrieved data
        return view('abilities.index', compact('abilities'));
    }

    /**
     * Show form to create a new ability for a specific dragon.
     */
    public function create(Dragon $dragon)
    {
        // Only admins are allowed to create abilities
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('dragons.index')->with('error', 'Access Denied');
        }

        // Show the ability creation form
        return view('abilities.create', compact('dragon'));
    }

    /**
     * Store a newly created ability in the database.
     */
    public function store(Request $request, Dragon $dragon)
    {
        // Validate the incoming request fields
        $request->validate([
            'name' => 'required|string|min:1|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        // Create a new ability linked to the dragon
        Ability::create([
            'dragon_id'   => $request->input('dragon_id'), // could also use $dragon->id
            'name'        => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        // Redirect back to the dragon's page with a success message
        return redirect()
            ->route('dragons.show', $dragon)
            ->with('success', 'Ability added successfully');
    }

    /**
     * form for editing an ability.
     */
    public function edit(Ability $ability)
    {
        // Only the ability owner OR an admin can edit
        if (auth()->user()->id !== $ability->user_id && auth()->user()->role !== 'admin') {
            return redirect()->route('dragons.index')->with('error', 'Access denied.');
        }

        // Load the edit view with the ability's current data
        return view('abilities.edit', compact('ability'));
    }

    /**
     * Update an existing ability in storage.
     */
    public function update(Request $request, Ability $ability)
    {
        // Update the ability’s attributes (name, description)
        $ability->update($request->only(['name', 'description']));

        // Redirect back to the dragon page with confirmation
        return redirect()
            ->route('dragons.show', $ability->dragon_id)
            ->with('success', 'Ability updated successfully.');
    }

    /**
     * Remove an ability from the database.
     */
    public function destroy(Ability $ability)
    {
        $ability->delete();

        // Redirect with success message
        return redirect()->route('dragons.index')->with('success', 'Ability deleted successfully!');
    }
}
