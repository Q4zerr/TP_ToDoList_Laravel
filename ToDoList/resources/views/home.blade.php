@extends('layouts.default')
@section('content')
   @guest
   <h1 class="display-4 mb-2" style="text-align:center;">Bienvenue sur le gestionnaire de tâches</h1>
   @endguest
   @auth
   <h1 class="display-4 mb-2" style="text-align:center;">Bienvenue sur le gestionnaire de tâches {{ Auth::user()->name }}</h1>
   @endauth
   <p class="lead mb-2">Gérez vos tâches de manière efficace et organisée.</p>
   <div class="row row-cols-1 row-cols-md-2 g-4 mt-3">
      <div class="col">
         <div class="card text-dark bg-light mb-3 shadow" style="background-color: #f1f1f1 !important;">
               <div class="card-body">
                  <h5 class="card-title">Tâches</h5>
                  <p class="card-text mt-2 mb-2">Voir toutes vos tâches.</p>
                  <a href="/taches" class="btn btn-primary">Voir les tâches</a>
               </div>
         </div>
      </div>
      <div class="col">
         <div class="card text-dark bg-light mb-3 shadow" style="background-color: #f1f1f1 !important;">
               <div class="card-body">
                  <h5 class="card-title">Catégories</h5>
                  <p class="card-text mt-2 mb-2">Voir toutes les catégories.</p>
                  <a href="/categories" class="btn btn-primary">Voir les catégories</a>
               </div>
         </div>
      </div>
      <div class="col">
         <div class="card text-dark bg-light mb-3 shadow" style="background-color: #f1f1f1 !important;">
               <div class="card-body">
                  <h5 class="card-title">Calendrier</h5>
                  <p class="card-text mt-2 mb-2">Voir le calendrier de vos tâches.</p>
                  <a href="/calendrier" class="btn btn-primary">Voir le calendrier</a>
               </div>
         </div>
      </div>
      <div class="col">
         <div class="card text-dark bg-light mb-3 shadow" style="background-color: #f1f1f1 !important;">
               <div class="card-body">
                  <h5 class="card-title">Connexion</h5>
                  <p class="card-text mt-2 mb-2">Connectez-vous à votre compte.</p>
                  <a href="/connexion" class="btn btn-primary">Se connecter</a>
               </div>
         </div>
      </div>
   </div>
@stop
