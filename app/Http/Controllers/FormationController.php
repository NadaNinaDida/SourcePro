<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formations = Formation::all();
        return Inertia::render('Formations/Index', [
            'formations' => $formations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Formations/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'nbr_heure' => 'required|integer',
            'prix_heure' => 'required|numeric',
        ]);

        Formation::create($request->all());

        return redirect()->route('formations.index')
                         ->with('success', 'Formation créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Formation $formation)
    {
        return Inertia::render('Formations/Show', [
            'formation' => $formation
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Formation $formation)
    {
        return Inertia::render('Formations/Edit', [
            'formation' => $formation
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Formation $formation)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'nbr_heure' => 'required|integer',
            'prix_heure' => 'required|numeric',
        ]);

        $formation->update($request->all());

        return redirect()->route('formations.index')
                         ->with('success', 'Formation mise à jour avec succès.');    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formation $formation)
    {
        $formation->delete();

        return redirect()->route('formations.index')
                         ->with('success', 'Formation supprimée avec succès.');    }
}
