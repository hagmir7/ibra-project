<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Ville;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if (isset($request->query->all()['query'])) {
            $query = $request->query->all()['query'];
            $films = Film::where('title', 'like', "%$query%")
                ->orwhere('category', 'like', "%$query%")
                ->paginate(12);
        }elseif(isset($request->query->all()['ville'])){

            $ville = $request->query->all()['ville'];
            $films = Ville::where('name', $ville)->first()->films()->paginate(12);

        }else {
            $films = Film::paginate(12);
        }

        $villes = Ville::all();
        return view("welcome", compact('films', "villes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

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
    public function show(film $film)
    {
        return view('film.show' , compact('film')) ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(film $film)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, film $film)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(film $film)
    {
        //
    }
}
