@extends('layouts.default')
@section('content')
    <div class="container d-flex flex-column justify-content-center align-items-center custom-container-profil">
        <h1 class="display-4">Page Profil</h1>
        <div class="col-md-8 d-flex flex-column justify-content-center align-items-center">
            <div class="card mb-2 mt-2" style="width: 100%">
                <div class="card-body">
                    <h2 class="fs-m">Bonjour, {{ Auth::user()->name }}</h2>
                    <p class="card-text">{{ Auth::user()->email }}</p>
                </div>
            </div>
        </div>
    </div>
@stop
