<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TacheController;
use App\Http\Controllers\CategorieController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name("home");

Route::get('/connexion', function() {
    return view('connexion');
})->name('connexion');

Route::post('/traiter-connexion', [UserController::class, 'traiterConnexion'])->name('traiter-connexion');

Route::get('/inscription', function() {
    return view('inscription');
})->name('inscription');

Route::post('/traiter-inscription', [UserController::class, 'traiterInscription'])->name('traiter-inscription');

Route::get('/profil', function(){
    return view('profil');
})->name('profil');

Route::post('/logout', function() {
    request()->session()->invalidate();
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/calendrier', [TacheController::class, 'getTachesAll'])->name('calendrier');

Route::get('/taches', [TacheController::class, 'getTaches'])->name('taches');

Route::get('/ajouter-tache', [CategorieController::class, 'getAllCategories'])->name('ajouter-tache');

Route::post('/traiter-tache', [TacheController::class, 'addTache'])->name('traiter-tache');

Route::get('/taches/{id}/modifier', [TacheController::class, 'modifier'])->name('modifier-tache');

Route::post('/taches/{id}/modifier', [TacheController::class, 'traiterModifier'])->name('traiter-modifier-tache');

Route::delete('/taches/{id}/supprimer', [TacheController::class, 'traiterSupprimer'])->name('supprimer-tache');

Route::get('/categories', [CategorieController::class, 'getCategories'])->name('categories');

Route::get('/ajouter-categorie', function(){
    return view('categories.ajouter-categorie');
})->name('ajouter-categorie');

Route::post('/traiter-categorie', [CategorieController::class, 'addCategorie'])->name('traiter-categorie');

Route::get('/categories/{id}/modifier', [CategorieController::class, 'modifier'])->name('modifier-categorie');

Route::post('/categories/{id}/modifier', [CategorieController::class, 'traiterModifier'])->name('traiter-modifier-categorie');

Route::delete('/categories/{id}/supprimer', [CategorieController::class, 'traiterSupprimer'])->name('supprimer-categorie');
