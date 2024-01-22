<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\InscriptionRequest;
use App\Http\Requests\ConnexionRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getUsers(){
        $utilisateurs = User::all();

        return view('list', ['utilisateurs' => $utilisateurs]);
    }

    public function traiterInscription(InscriptionRequest $request)
    {
        $validated = $request->validated();

        // Création d'un utilisateur avec les informations
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        // Connecter l'utilisateur
        Auth::login($user);

        return redirect()->route('inscription')->with('success', 'Inscription réussie.');
    }

    public function traiterConnexion(ConnexionRequest $request)
    {
        $validated = $request->validated();

        // Tenter de connecter l'utilisateur
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            // Si la tentative réussit, rediriger l'utilisateur vers la page d'accueil
            return redirect()->intended('/');
        }

        // Si la tentative échoue, rediriger l'utilisateur vers la page de connexion avec un message d'erreur
        return back()->withErrors([
            'email' => 'Les informations d\'identification fournies ne correspondent à aucun compte.',
        ]);
    }
}
