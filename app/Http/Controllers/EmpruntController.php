<?php

namespace App\Http\Controllers;

use App\Models\Emprunt;
use App\Models\Livre;
use App\Models\Adherent;
use Illuminate\Http\Request;

class EmpruntController extends Controller
{
    public function index()
    {
        $emprunts = Emprunt::with(['livre'])->paginate(10);
        return view('emprunts.index', compact('emprunts'));
    }

    public function create()
    {
        $livres = Livre::where('quantite', '>', 0)->get();
        return view('emprunts.create', compact('livres', 'adherents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'livre_id' => 'required|exists:livres,id',
            'adherent_id' => 'required|exists:adherents,id',
            'date_emprunt' => 'required|date',
            'date_retour_prevue' => 'required|date|after:date_emprunt',
            'date_retour_effective' => 'nullable|date|after:date_emprunt',
            'statut' => 'required|in:en_cours,retourne,en_retard',
        ]);

        
        $livre = Livre::findOrFail($request->livre_id);
        if ($livre->quantite <= 0) {
            return back()->with('error', 'Ce livre n\'est plus disponible.');
        }

        
        $emprunt = Emprunt::create($request->all());

        
        $livre->decrement('quantite');

        return redirect()->route('emprunts.index')
            ->with('success', 'Emprunt créé avec succès.');
    }

    public function show(Emprunt $emprunt)
    {
        return view('emprunts.show', compact('emprunt'));
    }

    public function edit(Emprunt $emprunt)
    {
        $livres = Livre::all();
        return view('emprunts.edit', compact('emprunt', 'livres', 'adherents'));
    }

    public function update(Request $request, Emprunt $emprunt)
    {
        $request->validate([
            'livre_id' => 'required|exists:livres,id',
            'adherent_id' => 'required|exists:adherents,id',
            'date_emprunt' => 'required|date',
            'date_retour_prevue' => 'required|date|after:date_emprunt',
            'date_retour_effective' => 'nullable|date|after:date_emprunt',
            'statut' => 'required|in:en_cours,retourne,en_retard',
        ]);

        
        if ($emprunt->livre_id != $request->livre_id) {
            
            $emprunt->livre->increment('quantite');
            
            $livre = Livre::findOrFail($request->livre_id);
            if ($livre->quantite <= 0) {
                return back()->with('error', 'Ce livre n\'est plus disponible.');
            }
            $livre->decrement('quantite');
        }

        $emprunt->update($request->all());

        return redirect()->route('emprunts.index')
            ->with('success', 'Emprunt mis à jour avec succès.');
    }

    public function destroy(Emprunt $emprunt)
    {
        
        $emprunt->livre->increment('quantite');
        
        $emprunt->delete();

        return redirect()->route('emprunts.index')
            ->with('success', 'Emprunt supprimé avec succès.');
    }
} 