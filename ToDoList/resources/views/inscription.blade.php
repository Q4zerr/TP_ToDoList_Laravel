@extends('layouts.default')
@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
    <h1 class="display-4">Page d'inscription</h1>
    <form class="form-register" method="POST" action="{{ route('traiter-inscription') }}">
        @csrf
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Entrez votre nom">
            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email">
            @error('email')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe">
            @error('password')<span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirmez le mot de passe</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirmez votre mot de passe">
        </div>
        <button type="submit" class="btn btn-primary">Inscription</button>
    </form>
    <div class="mt-3 link-login">
        <p>Vous avez déjà un compte? <a href="/connexion">Connectez-vous</a></p>
    </div>
@stop
