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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
