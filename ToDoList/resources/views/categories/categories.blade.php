@extends('layouts.default')
@section('content')
    <h1 class="display-4">Page des categories</h1>
    @guest
    <div class="row mt-3 d-flex justify-content-center align-items-center flex-column gap-3">
        <span class="card-text" style="font-size: 1.15rem;">Connectez-vous pour voir/ajouter des categories</span>
        <a href="/connexion" class="btn btn-primary">Connexion</a>
    </div>
    @endguest
    @auth
    @if(session('successCategory'))
        <div class="alert alert-success mt-5">
            {{ session('successCategory') }}
        </div>
    @endif
    <div class="row mt-5 w-100">
        @foreach ($categories as $categorie)
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="category-info d-flex justify-content-center flex-column">
                            <span class="category-title">Catégorie</span>
                            <p class="card-title">{{ $categorie->nom }}</p>
                            <p class="card-text">{{ $categorie->couleur }}<span class="card-color" style="background-color: {{ $categorie->couleur }}"></span></p>
                        </div>
                        <div class="task-action d-flex justify-content-center flex-column mt-3 gap-2">
                            <a href="{{ route('modifier-categorie', ['id' => $categorie->id]) }}" class="btn btn-primary w-100">Modifier</a>
                            <form method="POST" action="{{ route('supprimer-categorie', ['id' => $categorie->id]) }}">
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
            {{ $categories->render('pagination::bootstrap-4') }}
        </div>
    </div>
    @endauth
@stop
