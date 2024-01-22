@extends('layouts.default')
@section('content')
    <h1 class="display-4 mt-3">Modifier la tâche</h1>
    @auth
    <div class="row mt-5">
        <form class="form-modifyTask" method="POST" action="{{ route('traiter-modifier-categorie', ['id' => $categorie->id]) }}">
            @csrf
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ $categorie->nom }}">
                @error('nom')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label for="couleur">Couleur</label>
                <input type="color" class="form-control" id="couleur" name="couleur" value="{{ $categorie->couleur }}">
                @error('couleur')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <button type="submit" class="btn btn-primary">Modifier la Catégorie</button>
        </form>
    </div>
    @endauth
@stop
