<?php

namespace App\Http\Controllers;


use App\Models\Enseignant;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $enseignants = Enseignant::all();
            return Inertia::render('Enseignants/Index', [
                'enseignants' => $enseignants
            ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Enseignants/Create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'telephone' => 'required',
            'adresse' => 'required',
            'email' => 'required|email|unique:enseignants,email',
            'qualification' => 'required',
        ]);

        Enseignant::create($request->all());

        return redirect()->route('enseignants.index')
                         ->with('success', 'Enseignant créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Enseignant $enseignant)
    {
        return Inertia::render('Enseignants/Show', [
            'enseignant' => $enseignant
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enseignant $enseignant)
    {
        return Inertia::render('Enseignants/Edit', [
            'enseignant' => $enseignant
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enseignant $enseignant)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'telephone' => 'required',
            'adresse' => 'required',
            'email' => 'required|email|unique:enseignants,email,' . $enseignant->id,
            'qualification' => 'required',
        ]);

        $enseignant->update($request->all());

        return redirect()->route('enseignants.index')
                         ->with('success', 'Enseignant mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enseignant $enseignant)
    {
        $enseignant->delete();

        return redirect()->route('enseignants.index')
                         ->with('success', 'Enseignant supprimé avec succès.');
    }
}
