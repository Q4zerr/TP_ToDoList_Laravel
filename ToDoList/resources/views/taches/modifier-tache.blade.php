@extends('layouts.default')
@section('content')
    <h1 class="display-4 mt-3">Modifier la tâche</h1>
    @auth
    <div class="row mt-5">
        <form class="form-modifyTask" method="POST" action="{{ route('traiter-modifier-tache', ['id' => $tache->id]) }}">
            @csrf
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ $tache->nom }}">
                @error('nom')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ $tache->date }}">
                @error('date')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label for="categorie_id">Catégorie</label>
                <select class="form-control" id="categorie_id" name="categorie_id">
                    @foreach($categories as $categorie)
                        <option value="{{ $categorie->id }}" {{ $tache->categorie_id == $categorie->id ? 'selected' : '' }}>{{ $categorie->nom }}</option>
                    @endforeach
                </select>
                @error('categorie_id')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <button type="submit" class="btn btn-primary">Modifier la Tâche</button>
        </form>
    </div>
    @endauth
@stop
