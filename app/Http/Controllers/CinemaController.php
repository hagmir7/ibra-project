<?php

namespace App\Http\Controllers;

use App\Models\cinema;
use Illuminate\Http\Request;

class CinemaController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(cinema $cinema)
    {
        // dd($cinema->films);
        return view("cinema.show", compact("cinema"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cinema $cinema)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cinema $cinema)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cinema $cinema)
    {
        //
    }
}
