<?php

namespace App\Http\Controllers;

use App\Models\Adherant;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdherantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adherants = Adherant::all();
        return Inertia::render('Adherants/Index', [
            'adherants' => $adherants
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Adherants/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:adherants',
            'adresse' => 'required',
            'tel' => 'required',
            'tel_parent' => 'required',
            'date_inscription' => 'required|date',
        ]);

        Adherant::create($request->all());

        return redirect()->route('adherants.index')
                         ->with('success', 'Adhérant créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Adherant $adherant)
    {
        return Inertia::render('Adherants/Show', [
            'adherant' => $adherant
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Adherant $adherant)
    {
        return Inertia::render('Adherants/Edit', [
            'adherant' => $adherant
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Adherant $adherant)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:adherants,email,'.$adherant->id,
            'adresse' => 'required',
            'tel' => 'required',
            'tel_parent' => 'required',
            'date_inscription' => 'required|date',
        ]);

        $adherant->update($request->all());

        return redirect()->route('adherants.index')
                         ->with('success', 'Adhérant mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Adherant $adherant)
    {
        $adherant->delete();

        return redirect()->route('adherants.index')
                         ->with('success', 'Adhérant supprimé avec succès.');
    }
}
