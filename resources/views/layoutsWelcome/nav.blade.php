<header>
    <div class="topbar  " style="background-color: #284a71;color:#ffff;">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 text-sm">
                    <div class="site-info">
                        <a class="btn text-white p-1 m-1 nav-item fw-400 " href="#"><i class="fas fa-phone-alt p-1 m-1"></i> +00 123 4455 6666</a>
                        <span class="divider text-white">|</span>
                        <a href="#" class="btn text-white fw-400 p-1 m-1 nav-item "><i class="fas fa-envelope p-1 m-1 "></i> mail@example.com</a>
                    </div>
                </div>
                <div class="col-sm-4 text-right text-sm">
                    <div class="social-mini-button">
                        <a href="#" class="text-white p-1 m-1 nav-item "><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-white p-1 m-1 nav-item "><i class="fab fa-instagram "></i></a>
                        <a href="#" class="text-white p-1 m-1 nav-item "><i class="fab fa-youtube "></i></a>
                        <a href="#" class="text-white p-1 m-1 nav-item "><i class="fab fa-linkedin "></i></a>
                    </div>
                </div>
            </div> <!-- .row -->
        </div> <!-- .container -->
    </div> <!-- .topbar -->
<style>
    .nav-link{
        color:#284a71;
        font-family: 'Roboto';

    }
</style>
    <nav class="navbar navbar-expand-lg navbar-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="{{ asset('images/g-coop-no-bg.png') }}" alt="G-COOP LOGO" width="100" height="58">
                {{-- <span class="text-primary">G</span>-COOP --}}
            </a>

            <form action="#">
                <div class="input-group input-navbar">
                    <div class="input-group-prepend">
                        {{-- <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span> --}}
                    </div>
                    {{-- <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username"
                        aria-describedby="icon-addon1"> --}}
                </div>
            </form>

            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupport"
                aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fas fa-bars" ></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupport">

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ml-lg-3 {{ setMenuActive('welcome') }} " style="font-family:'Roboto', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif ;">
                        <a class="nav-link " href="{{ route('welcome') }}" >Accueil</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link ml-lg-3" href="#">Actualités</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-lg-3" href="#">Nos programmes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-lg-3" href="#">Nous contacter</a>
                    </li>


                    @auth
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link ml-lg-3">Tableau de bord</a>
                    </li>
                    <li class="nav-item ">
                        <a class="btn btn-danger ml-lg-3r " href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">Déconnexion</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    @else
                    <li class="nav-item {{ setMenuActive('inscription') }} ">
                        <a class=" nav-link ml-lg-3  " href="{{ route('inscription') }}" >S'inscrire</a>
                    </li>
                    <li class="nav-item {{ setMenuActive('login') }} ">
                        <a class="nav-link  ml-lg-3" href="{{ route('login') }}">Se connecter</a>
                    </li>
                    @endauth
                </ul>
            </div> <!-- .navbar-collapse -->
        </div> <!-- .container -->
    </nav>
</header>
{{--
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <a href="../../index3.html" class="navbar-brand">
            <img src="{{ asset('images/g-coop2.png') }}" alt="Logo SINONE" style="opacity: .8;">
        </a>
        <!-- Navbar Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="{{ route('welcome') }}" class="nav-link text-success
                        @if (setMenuActive('welcome') == 'active') font-weight-bold @endif"
                        style="font-size: 1.2em;">Accueil</a>
                </li>
                <li class="nav-item">
                    <a href="index3.html" class="nav-link text-success" style="font-size: 1.2em;">Nos programmes</a>
                </li>
                <li class="nav-item">
                    <a href="index3.html" class="nav-link text-success" style="font-size: 1.2em;">À propos de nous</a>
                </li>
                <li class="nav-item">
                    <a href="index3.html" class="nav-link text-success" style="font-size: 1.2em;">Nous contacter</a>
                </li>
                @auth
                <li class="nav-item">
                    <a href="{{ route('profile.edit') }}" class="nav-link text-success" style="font-size: 1.2em;">Mon
                        compte</a>
                </li>
                <div class="float-right">
                    <li class="nav-item ">
                        <a class="btn btn-danger " style="font-size: 1.2em;" href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">Déconnexion</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </div>




                @else
                <li class="nav-item">
                    <a href="{{ route('inscription') }}"
                        class="nav-link text-success @if (setMenuActive('inscription') == 'active') font-weight-bold @endif"
                        style="font-size: 1.2em;">Créer un compte</a>

                </li>
                <li class="nav-item">
                    <a href="{{ route('login') }}"
                        class="nav-link text-success @if (setMenuActive('login') == 'active') font-weight-bold @endif"
                        style="font-size: 1.2em;">Se connecter</a>

                </li>
                @endauth
            </ul>

        </div>
    </div>
</nav> --}}


{{--

<style>
    /* Styles pour la topbar */
    .topbar {
        background-color: #8B0000;
        color: white;
        padding: 10px 0;
    }

    .topbar .social-icons a {
        color: white;
        margin-right: 15px;

    }

    .topbar .search-bar input {
        margin-right: 10px;
    }


    .topbar .form-control {
        width: 200px;
        /* Ajustez la largeur du champ de recherche */
    }

    .fas,
    .far,
    .fab {
        color: white;
    }

    .fas-flag {
        font-size: 1.5em;
        /* Ajustez la taille du drapeau */
    }

    .fas-flag::before {
        content: "\f0f3";
        /* Code Unicode du drapeau français */
        color: blue;
    }

    .fas-flag::after {
        content: "\f0f4\f0f5";
        color: white;
    }

    .navbar {
        background-color: #ffff;
    }

    .navbar .nav-item .nav-link,
    .navbar .btn {
        color: #8B0000 !important;
    }

    .navbar .btn-outline-light {
        border-color: white;
    }

    .navbar .btn-outline-light:hover {
        background-color: white;
        color: #8B0000 !important;
    }

    .nav-item {
        font-size: 1.7rem;
        padding: 2px;
    }
</style>
<div class="topbar">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <input type="hidden">
            </div>
            <div class="col-md-3">



            </div>
            <div class="col-md-3 ">

                <div class="float-right">

                    <a href="#" class="ms-2"><i class="fab fa-twitter "></i></a>
                    <a href="#" class="ms-2"><i class="fab fa-facebook-f "></i></a>
                    <a href="#" class="ms-2"><i class="far fa-calendar-alt "></i></a>
                    <a href="#" class="ms-2"><i class="fas fa-flag fa-3x"></i></a>
                    <a href="#" class="ms-2"><i class="fas fa-angle-down fa-3x"></i></a>
                </div>
            </div>
        </div>





    </div>
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg" style="height: 115px;">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/g-coop2.png') }}" alt="Logo-GCOOP" style="max-height: 300px;">
        </a>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Qui sommes-nous ?</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Nos programmes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Nous contactez</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Connexion</a>
                </li>
            </ul>
        </div>

        <!-- Bouton d'inscription -->
        <a href="#" class="btn btn-outline-light">
            <i class="fas fa-user"></i> S'inscrire
        </a>
    </div>
</nav>
--}}
