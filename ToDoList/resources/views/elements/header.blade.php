<body>
  <div class = "container" >
    <header class = "row" >
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">Laravel TP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/taches">Tâches</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/categories">Catégories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/calendrier">Calendrier</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="/ajouter-tache">Ajouter une tâche</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/ajouter-categorie">Ajouter une catégorie</a>
                    </li>
                    @endauth
                </ul>
            </div>
            @guest
            <a class="nav-link-account" href="/connexion"><i class="fa-solid fa-user"></i></a>
            @endguest
            @auth
            <div style="display: flex; flex-direction: row; gap: 1rem;">
                <a class="dropdown-item" href="{{ route('profil') }}">Profil</a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @endauth
        </div>
    </nav>
    </header>