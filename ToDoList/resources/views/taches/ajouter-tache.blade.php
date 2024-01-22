@extends('layouts.default')
@section('content')
    @auth
        @if(session('successTask'))
        <div class="alert alert-success">
            {{ session('successTask') }}
        </div>
        @endif
        <h1 class="display-4">Ajouter une tâche</h1>
        <form class="form-addTask" method="POST" action="{{ route('traiter-tache') }}">
            @csrf
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom de la Tâche">
                @error('nom')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" placeholder="Date de la Tâche">
                @error('date')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label for="categorie_id">Catégorie</label>
                <select class="form-control" id="categorie_id" name="categorie_id">
                    <option value=""></option>
                    @foreach($categories as $categorie)
                        <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                    @endforeach
                </select>
                @error('categorie_id')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <button type="submit" class="btn btn-primary">Créer une Tâche</button>
        </form>
    @endauth
@stop
