<?php

namespace App\Http\Controllers;

use App\Models\FilmPlace;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        !auth()->check() && abort(404);
        $tickets = auth()->user()->tickets;
        return view('ticket.index', compact('tickets'));
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
        $request->validate([
            'film_place_id' => "required|numeric",
            'places' => 'required|numeric|max:4',
        ]);

        // Use the validated number of places from the request
        for ($places = 1; $places <= intval($request->places); $places++) {
            $tickets = Ticket::whereHas('filmPlace', function ($query) use ($request) {
                $query->where('film_place_id', $request->film_place_id);
            })->count();

            Ticket::create([
                'user_id' => auth()->user()->id,
                'film_place_id' => $request->film_place_id,
                'number_place' => $tickets + 1
            ]);
        }

        return redirect()->route('ticket.index');
    }





    /**
     * Display the specified resource.
     */
    public function show(ticket $ticket)
    {
        return view('ticket.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ticket $ticket)
    {
        //
    }
}
