@extends('layouts.default')
@section('content')
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarElement = document.getElementById('calendrier');
        var calendar = new FullCalendar.Calendar(calendarElement, {
            initialView: 'timeGridWeek',
            locale: 'fr',
            buttonText: {
                today: 'Aujourd\'hui',
                day: 'Jour',
                week: 'Semaine',
                month: 'Mois',
            },
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'timeGridDay,timeGridWeek,dayGridMonth'
            },
            events: [
                @foreach ($taches as $tache)
                {
                    title: '{{ $tache->nom }} - {{ $tache->categorie->nom }}',
                    start: '{{ $tache->date }}',
                    color: '{{ $tache->categorie->couleur }}',
                },
                @endforeach
            ]
        });
        calendar.render();
    });
    </script>
    @guest
    <h1 class="display-4 mt-3">Calendrier</h1>
    <div class="row mt-3 d-flex justify-content-center align-items-center flex-column gap-3">
        <span class="card-text" style="font-size: 1.15rem;">Connectez-vous pour voir vos tâches dans le calendrier</span>
        <a href="/connexion" class="btn btn-primary">Connexion</a>
    </div>
    @endguest
   @auth
   <h1 class="display-4 mt-3" style="margin-top: 2rem;">Votre Calendrier de Tâches</h1>
   <div id="calendrier"></div>
   @endauth
@stop