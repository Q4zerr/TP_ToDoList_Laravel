@extends('layouts.default')
@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
    <h1 class="display-4">Page de connexion</h1>
    <form class="form-login" method="POST" action="{{ route('traiter-connexion') }}">
        @csrf
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
        <button type="submit" class="btn btn-primary">Connexion</button>
    </form>
    <div class="mt-3 link-register">
        <p>Vous n'avez pas de compte? <a href="/inscription">Inscrivez-vous</a></p>
    </div>
@stop
