<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use App\Models\Livre;
use App\Models\Emprunt;
use Illuminate\Http\Request;

class BibliothequeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // Livres
    public function indexLivres()
    {
        $livres = Livre::with('auteur')->paginate(10);
        return view('livres.index', compact('livres'));
    }

    public function createLivre()
    {
        $auteurs = Auteur::all();
        return view('livres.create', compact('auteurs'));
    }

    public function storeLivre(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|max:255',
            'annee_publication' => 'required|digits:4|integer|min:1900|max:'.(date('Y')+1),
            'nombre_pages' => 'required|integer|min:1',
            'auteur_id' => 'required|exists:auteurs,id'
        ]);

        Livre::create($validated);
        return redirect()->route('livres.index')->with('success', 'Livre ajouté avec succès');
    }

    public function editLivre(Livre $livre)
    {
        $auteurs = Auteur::all();
        return view('livres.edit', compact('livre', 'auteurs'));
    }

    public function updateLivre(Request $request, Livre $livre)
    {
        $validated = $request->validate([
            'titre' => 'required|max:255',
            'annee_publication' => 'required|digits:4|integer|min:1900|max:'.(date('Y')+1),
            'nombre_pages' => 'required|integer|min:1',
            'auteur_id' => 'required|exists:auteurs,id'
        ]);

        $livre->update($validated);
        return redirect()->route('livres.index')->with('success', 'Livre mis à jour avec succès');
    }

    public function destroyLivre(Livre $livre)
    {
        $livre->delete();
        return redirect()->route('livres.index')->with('success', 'Livre supprimé avec succès');
    }

    // Auteurs
    public function indexAuteurs()
    {
        $auteurs = Auteur::paginate(10);
        return view('auteurs.index', compact('auteurs'));
    }

    public function createAuteur()
    {
        return view('auteurs.create');
    }

    public function storeAuteur(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255'
        ]);

        Auteur::create($validated);
        return redirect()->route('auteurs.index')->with('success', 'Auteur ajouté avec succès');
    }

    public function editAuteur(Auteur $auteur)
    {
        return view('auteurs.edit', compact('auteur'));
    }

    public function updateAuteur(Request $request, Auteur $auteur)
    {
        $validated = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255'
        ]);

        $auteur->update($validated);
        return redirect()->route('auteurs.index')->with('success', 'Auteur mis à jour avec succès');
    }

    public function destroyAuteur(Auteur $auteur)
    {
        $auteur->delete();
        return redirect()->route('auteurs.index')->with('success', 'Auteur supprimé avec succès');
    }

    // Emprunts
    public function indexEmprunts()
    {
        $emprunts = Emprunt::with('livre.auteur')->paginate(10);
        return view('emprunts.index', compact('emprunts'));
    }

    public function createEmprunt()
    {
        $livres = Livre::all();
        return view('emprunts.create', compact('livres'));
    }

    public function storeEmprunt(Request $request)
    {
        $validated = $request->validate([
            'livre_id' => 'required|exists:livres,id',
            'date_emprunt' => 'required|date',
            'date_retour' => 'required|date|after:date_emprunt'
        ]);

        Emprunt::create($validated);
        return redirect()->route('emprunts.index')->with('success', 'Emprunt ajouté avec succès');
    }

    public function editEmprunt(Emprunt $emprunt)
    {
        $livres = Livre::all();
        return view('emprunts.edit', compact('emprunt', 'livres'));
    }

    public function updateEmprunt(Request $request, Emprunt $emprunt)
    {
        $validated = $request->validate([
            'livre_id' => 'required|exists:livres,id',
            'date_emprunt' => 'required|date',
            'date_retour' => 'required|date|after:date_emprunt'
        ]);

        $emprunt->update($validated);
        return redirect()->route('emprunts.index')->with('success', 'Emprunt mis à jour avec succès');
    }

    public function destroyEmprunt(Emprunt $emprunt)
    {
        $emprunt->delete();
        return redirect()->route('emprunts.index')->with('success', 'Emprunt supprimé avec succès');
    }
}
