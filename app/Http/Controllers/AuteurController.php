<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use Illuminate\Http\Request;

class AuteurController extends Controller
{
    public function index()
    {
        $auteurs = Auteur::paginate(10);
        return view('auteurs.index', compact('auteurs'));
    }

    public function create()
    {
        return view('auteurs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'nullable|date',
            'nationalite' => 'nullable|string|max:255',
            'biographie' => 'nullable|string',
        ]);

        Auteur::create($request->all());

        return redirect()->route('auteurs.index')
            ->with('success', 'Auteur créé avec succès.');
    }

    public function show(Auteur $auteur)
    {
        return view('auteurs.show', compact('auteur'));
    }

    public function edit(Auteur $auteur)
    {
        return view('auteurs.edit', compact('auteur'));
    }

    public function update(Request $request, Auteur $auteur)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'nullable|date',
            'nationalite' => 'nullable|string|max:255',
            'biographie' => 'nullable|string',
        ]);

        $auteur->update($request->all());

        return redirect()->route('auteurs.index')
            ->with('success', 'Auteur mis à jour avec succès.');
    }

    public function destroy(Auteur $auteur)
    {
        $auteur->delete();

        return redirect()->route('auteurs.index')
            ->with('success', 'Auteur supprimé avec succès.');
    }
} 