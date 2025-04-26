<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use App\Models\Auteur;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    public function index()
    {
        $livres = Livre::with('auteur')->paginate(10);
        return view('livres.index', compact('livres'));
    }

    public function create()
    {
        $auteurs = Auteur::all();
        return view('livres.create', compact('auteurs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'annee_publication' => 'required|integer|min:1800|max:' . (date('Y') + 1),
            'nombre_pages' => 'required|integer|min:1',
            'auteur_id' => 'required|exists:auteurs,id',
        ]);

        Livre::create($request->all());

        return redirect()->route('livres.index')
            ->with('success', 'Livre créé avec succès.');
    }

    public function show(Livre $livre)
    {
        return view('livres.show', compact('livre'));
    }

    public function edit(Livre $livre)
    {
        $auteurs = Auteur::all();
        return view('livres.edit', compact('livre', 'auteurs'));
    }

    public function update(Request $request, Livre $livre)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'annee_publication' => 'required|integer|min:1800|max:' . (date('Y') + 1),
            'nombre_pages' => 'required|integer|min:1',
            'auteur_id' => 'required|exists:auteurs,id',
        ]);

        $livre->update($request->all());

        return redirect()->route('livres.index')
            ->with('success', 'Livre mis à jour avec succès.');
    }

    public function destroy(Livre $livre)
    {
        $livre->delete();

        return redirect()->route('livres.index')
            ->with('success', 'Livre supprimé avec succès.');
    }
} 