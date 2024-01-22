<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tache;
use App\Http\Requests\TacheAddRequest;
use App\Http\Requests\TacheUpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Categorie;

class TacheController extends Controller
{
    public function getTaches()
    {
        $taches = Tache::where('user_id', Auth::id())->paginate(6);
        return view('taches.taches', compact('taches'));
    }

    public function getTachesAll()
    {
        $taches = Tache::where('user_id', Auth::id())->get();
        return view('calendrier', compact('taches'));
    }

    public function addTache(TacheAddRequest $request)
    {
        $validated = $request->validated();

        // Création d'une tâche avec les informations
        $tache = Tache::create([
            'nom' => $request->input('nom'),
            'date' => $request->input('date'),
            'categorie_id' => $request->input('categorie_id'),
            'user_id' => Auth::id()
        ]);

        return redirect('/ajouter-tache')->with('successTask', 'Tâche ajoutée avec succès.');
    }

    public function modifier($id)
    {
        $tache = Tache::findOrFail($id);
        $categories = Categorie::all();
        return view('taches.modifier-tache', compact('tache', 'categories'));
    }

    public function traiterModifier(TacheUpdateRequest $request, $id)
    {
        $tache = Tache::findOrFail($id);
        $tache->nom = $request->input('nom');
        $tache->date = $request->input('date');
        $tache->categorie_id = $request->input('categorie_id');
        $tache->save();
        return redirect('taches')->with('successTask', 'Tâche modifiée avec succès.');
    }

    public function traiterSupprimer($id)
    {
        $tache = Tache::findOrFail($id);
        $tache->delete();
        return redirect('taches')->with('successTask', 'Tâche supprimée avec succès.');
    }
}
