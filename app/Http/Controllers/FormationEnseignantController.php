<?php

namespace App\Http\Controllers;

use App\Models\FormationEnseignant;
use App\Models\Formation;
use App\Models\Enseignant;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FormationEnseignantController extends Controller
{
    public function index()
    {
        $formationEnseignants = FormationEnseignant::with(['formation', 'enseignant'])->get();
        return Inertia::render('FormationEnseignants/Index', ['formationEnseignants' => $formationEnseignants]);
    }

    public function create()
    {
        $formations = Formation::all();
        $enseignants = Enseignant::all();
        return Inertia::render('FormationEnseignants/Create', ['formations' => $formations, 'enseignants' => $enseignants]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_enseignant' => 'required|exists:enseignants,id',
            'id_cours' => 'required|exists:formations,id',
            'prix_heure' => 'required|numeric',
        ]);

        FormationEnseignant::create($request->all());

        return redirect()->route('formation-enseignants.index')->with('success', 'FormationEnseignant created successfully.');
    }

    public function show($id)
    {
        $formationEnseignant = FormationEnseignant::with(['formation', 'enseignant'])->findOrFail($id);
        return Inertia::render('FormationEnseignants/Show', ['formationEnseignant' => $formationEnseignant]);
    }

    public function edit($id)
    {
        $formationEnseignant = FormationEnseignant::findOrFail($id);
        $formations = Formation::all();
        $enseignants = Enseignant::all();
        return Inertia::render('FormationEnseignants/Edit', ['formationEnseignant' => $formationEnseignant, 'formations' => $formations, 'enseignants' => $enseignants]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_enseignant' => 'required|exists:enseignants,id',
            'id_cours' => 'required|exists:formations,id',
            'prix_heure' => 'required|numeric',
        ]);

        $formationEnseignant = FormationEnseignant::findOrFail($id);
        $formationEnseignant->update($request->all());

        return redirect()->route('formation-enseignants.index')->with('success', 'FormationEnseignant updated successfully.');
    }

    public function destroy($id)
    {
        $formationEnseignant = FormationEnseignant::findOrFail($id);
        $formationEnseignant->delete();

        return redirect()->route('formation-enseignants.index')->with('success', 'FormationEnseignant deleted successfully.');
    }
}
