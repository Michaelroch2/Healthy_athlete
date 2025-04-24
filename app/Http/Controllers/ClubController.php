<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    /**
     * Display a listing of the clubes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clubes = Club::all();
        return view('clubes.index', compact('clubes'));
    }

    /**
     * Show the form for creating a new club.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clubes.create');
    }

    /**
     * Store a newly created club in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombreClub' => 'required|string|max:25',
            'descripcionClub' => 'nullable|string|max:100',
            'mensualidadClub' => 'required|integer|min:0',
        ]);
        
        // Crear el club
        $club = Club::create($validated);

        return redirect()->route('entrenadores.clubes')
            ->with('success', 'Club creado exitosamente.');
    }

    /**
     * Display the specified club.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function show(Club $club)
    {
        return view('clubes.show', compact('club'));
    }

    /**
     * Show the form for editing the specified club.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function edit(Club $club)
    {
        return view('clubes.edit', compact('club'));
    }

    /**
     * Update the specified club in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Club $club)
    {
        $validated = $request->validate([
            'nombreClub' => 'required|string|max:25',
            'descripcionClub' => 'nullable|string|max:100',
            'mensualidadClub' => 'required|integer|min:0',
        ]);
        
        // Actualizar el club
        $club->update($validated);

        return redirect()->route('clubes.index')
            ->with('success', 'Club actualizado exitosamente.');
    }

    /**
     * Remove the specified club from storage.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function destroy(Club $club)
    {
        $club->delete();

        return redirect()->route('clubes.index')
            ->with('success', 'Club eliminado exitosamente.');
    }
}