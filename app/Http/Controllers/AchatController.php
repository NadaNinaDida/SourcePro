<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AchatController extends Controller
{

    public function index()
    {
        $achats = Achat::all();
        return Inertia::render('Achats/Index', ['achats' => $achats]);
    }

    public function create()
    {
        return Inertia::render('Achats/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'designation' => 'required|string|max:255',
            'quantite' => 'required|integer',
            'prix_achat' => 'required|numeric',
            'date_achat' => 'required|date',
        ]);

        Achat::create($request->all());

        return redirect()->route('achats.index')->with('success', 'Achat créé avec succès.');
    }

    public function show($id)
    {
        $achat = Achat::findOrFail($id);
        return Inertia::render('Achats/Show', ['achat' => $achat]);
    }

    public function edit($id)
    {
        $achat = Achat::findOrFail($id);
        return Inertia::render('Achats/Edit', ['achat' => $achat]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'designation' => 'required|string|max:255',
            'quantite' => 'required|integer',
            'prix_achat' => 'required|numeric',
            'date_achat' => 'required|date',
        ]);

        $achat = Achat::findOrFail($id);
        $achat->update($request->all());

        return redirect()->route('achats.index')->with('success', 'Achat mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $achat = Achat::findOrFail($id);
        $achat->delete();

        return redirect()->route('achats.index')->with('success', 'Achat supprimé avec succès.');
    }



}
