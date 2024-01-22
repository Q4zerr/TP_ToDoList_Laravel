<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Http\Requests\CategorieAddRequest;
use App\Http\Requests\CategorieUpdateRequest;

class CategorieController extends Controller
{
    public function getAllCategories(){
        $categories = Categorie::all();
        return view('taches.ajouter-tache')->with(['categories' => $categories]);
    }

    public function getCategories()
    {
        $categories = Categorie::paginate(6);
        return view('categories.categories', compact('categories'));
    }

    public function addCategorie(CategorieAddRequest $request)
    {
        $validated = $request->validated();

        // Création d'une tâche avec les informations
        $categorie = Categorie::create([
            'nom' => $request->input('nom'),
            'couleur' => $request->input('couleur')
        ]);

        return redirect('/ajouter-categorie')->with('successCategory', 'Catégorie ajoutée avec succès.');
    }

    public function modifier($id)
    {
        $categorie = Categorie::findOrFail($id);
        return view('categories.modifier-categorie', compact('categorie'));
    }

    public function traiterModifier(CategorieUpdateRequest $request, $id)
    {
        $categorie = Categorie::findOrFail($id);
        $categorie->nom = $request->input('nom');
        $categorie->couleur = $request->input('couleur');
        $categorie->save();
        return redirect('categories')->with('successCategory', 'Catégorie modifiée avec succès.');
    }

    public function traiterSupprimer($id)
    {
        $categorie = Categorie::findOrFail($id);
        $categorie->delete();
        return redirect('categories')->with('successCategory', 'Catégorie supprimée avec succès.');
    }
}
