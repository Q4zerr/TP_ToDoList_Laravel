@extends('layouts.default')
@section('content')
    @auth
        @if(session('successCategory'))
        <div class="alert alert-success">
            {{ session('successCategory') }}
        </div>
        @endif
        <h1 class="display-4">Ajouter une catégorie</h1>
        <form class="form-addTask" method="POST" action="{{ route('traiter-categorie') }}">
            @csrf
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom de la Catégorie">
                @error('nom')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label for="couleur">Couleur</label>
                <input type="color" class="form-control" id="couleur" name="couleur" placeholder="Couleur de la Catégorie">
                @error('couleur')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <button type="submit" class="btn btn-primary">Créer une Catégorie</button>
        </form>
    @endauth
@stop
