<?php

namespace App\Http\Controllers;

use App\Models\Adherant;
use App\Models\Formation;
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
        $adherant->load('formations');
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



    public function assignForm(Adherant $adherent)
{
    $formations = Formation::all();
    return Inertia::render('Adherants/Assign', [
        'adherent' => $adherent,
        'formations' => $formations,
    ]);
}

public function assign1(Request $request, Adherant $adherent)
{
    $request->validate([
        'formation_id' => 'required|exists:formations,id',
        'date_debut' => 'required|date',
        'prix_heure' => 'required|numeric',
    ]);

    $adherent->formations()->attach($request->formation_id, [
        'date_debut' => $request->date_debut,
        'prix_heure' => $request->prix_heure,
    ]);

    return redirect()->route('adherants.show', $adherent->id)
                     ->with('success', 'Formation assignée avec succès.');
}
public function assign(Request $request, Adherant $adherent)
{
    $request->validate([
        'formation_id' => 'required|exists:formations,id',
        'date_debut' => 'required|date',
        'prix_heure' => 'required|numeric',
    ]);

    // Vérifier si l'adhérent est déjà assigné à cette formation
    if ($adherent->formations()->where('formation_id', $request->formation_id)->exists()) {
        return redirect()->route('adherants.show', $adherent->id)
                         ->with('error', 'Cet adhérent est déjà assigné à cette formation.');
    }

    // Assigner la formation si elle n'est pas déjà assignée
    $adherent->formations()->attach($request->formation_id, [
        'date_debut' => $request->date_debut,
        'prix_heure' => $request->prix_heure,
    ]);

    return redirect()->route('adherants.show', $adherent->id)
                     ->with('success', 'Formation assignée avec succès.');
}


}
