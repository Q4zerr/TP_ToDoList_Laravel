@extends('layouts.default')
@section('content')
    @guest
    <h1 class="display-4 mt-3">Page des Tâches</h1>
    <div class="row mt-3 d-flex justify-content-center align-items-center flex-column gap-3">
        <span class="card-text" style="font-size: 1.15rem;">Connectez-vous pour voir/ajouter vos tâches</span>
        <a href="/connexion" class="btn btn-primary">Connexion</a>
    </div>
    @endguest
    @auth
    <h1 class="display-4 mt-3">Vos Tâches</h1>
    @if(session('successTask'))
        <div class="alert alert-success mt-5">
            {{ session('successTask') }}
        </div>
    @endif
    <div class="row mt-5 w-100">
        @foreach ($taches as $tache)
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="task-info d-flex justify-content-center flex-column">
                            <span class="task-title">Tâche</span>
                            <p class="card-title">{{ $tache->nom }}</p>
                            <p class="card-text">{{ $tache->date }}</p>
                        </div>
                        <div class="card-separator"></div>
                        <div class="category-info d-flex justify-content-center flex-column">
                            <span class="category-title">Catégorie</span>
                            <p class="card-title">{{ $tache->categorie->nom }}</p>
                            <p class="card-text">{{ $tache->categorie->couleur }}<span class="card-color" style="background-color: {{ $tache->categorie->couleur }}"></span></p>
                        </div>
                        <div class="task-action d-flex justify-content-center flex-column mt-3 gap-2">
                            <a href="{{ route('modifier-tache', ['id' => $tache->id]) }}" class="btn btn-primary w-100">Modifier</a>
                            <form method="POST" action="{{ route('supprimer-tache', ['id' => $tache->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger w-100">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="d-flex justify-content-center">
            {{ $taches->render('pagination::bootstrap-4') }}
        </div>
    </div>
    @endauth
@stop
