@extends('layoutsWelcome.master')
@section('content')
<div class="page-hero bg-image overlay-dark"
    style="background-image: url({{ asset('images/register-img2.jpg') }}); background-size: cover; background-position: center;">
    <div class="hero-section">
        <div class="container  text-center wow zoomIn">
            <h1 class="display-4 fw-boldtext-white pb-1 mb-1">G-COOP</h1>
            <h3 class="pb-2 mb-2">Votre partenaire pour une gestion transparente et efficace des subventions </h3>
            <span class="h5 text-white text-justify">Facilitez le dépôt et le suivi des programmes de financement par
                les coopératives à l'échelle nationale <br>Découvrez comment notre plateforme peut transformer la
                gestion de vos financements pour une meilleure allocation des ressources</span>

            <div class="">
                <a href="#" class="btn text-white pt-2 mt-5"
                    style="background-color: #284a71; font-size:1.2em; border-radius:30px;font-weight:bold;">Déposez
                    votre demande dès aujourd'hui !</a>
            </div>
        </div>
    </div>
</div>


<div class="bg-white">

    <div class="page-section mt-0 pt-0 pb-1 mb-1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 py-3 wow fadeInUp">
                    <h1 style="color:#318ead;font-weight:500; font-family: inherit; font-size: 3rem;">Présentation de
                        G-COOP</h1>
                    <p class="text-gray text-justify mb-4" style="font-size: 1.2rem;">Gcoop est une solution innovante
                        conçue pour transformer la gestion des financements coopératifs. En offrant une plateforme
                        transparente et efficace pour la gestion des subventions, Gcoop facilite non seulement le dépôt
                        des demandes, mais aussi le suivi des programmes de financement à l'échelle nationale. Grâce à
                        son interface intuitive et ses fonctionnalités de suivi en temps réel, Gcoop optimise le
                        processus de demande de financement, élargit l'accès aux opportunités de financement et garantit
                        une répartition équitable des ressources. Cette approche permet aux coopératives de se focaliser
                        sur leur croissance et leur pérennité. </p>
                    {{-- <a href="about.html" class="btn btn-success">Lire plus</a> --}}
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
                    <div class="img-place custom-img-1">
                        <img src="{{ asset('images/g-coop.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- .bg-light -->
</div> <!-- .bg-light -->

<div class="page-section  mt-0 mb-0" style="background-color: #f7f9fb;">
    <div class="container pt-1 mt-1">
        <h1 class="text-center mt-1 pt-1 mb-5 wow fadeInUp" style="color:#318ead;font-weight:500; font-family: inherit; font-size: 3rem;">Actualités</h1>

        <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
            <div class="item">
                <div class="card-blog wow zoomIn">
                    <div class="header">

                        <a href="#" class="post-thumb">
                            <img src="{{ asset('images/register-img.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="body">
                        <h5 class="post-title"><a href="#">Actualité 1</a>
                        </h5>
                        <div class="site-info">
                            <div class="avatar mr-2">
                                <div class="avatar-img">

                                </div>

                            </div>
                            <span class="mai-time"></span> 21/10/2022
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card-blog wow zoomIn">
                    <div class="header">

                        <a href="#" class="post-thumb">
                            <img src="{{ asset('images/actu1.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="body">
                        <h5 class="post-title"><a href="#">Actualité 2</a>
                        </h5>
                        <div class="site-info">
                            <div class="avatar mr-2">
                                <div class="avatar-img">

                                </div>

                            </div>
                            <span class="mai-time"></span> 21/10/2022
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card-blog wow zoomIn">
                    <div class="header">

                        <a href="#" class="post-thumb">
                            <img src="{{ asset('images/actu2.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="body">
                        <h5 class="post-title"><a href="#">Actualité 3</a>
                        </h5>
                        <div class="site-info">
                            <div class="avatar mr-2">
                                <div class="avatar-img">

                                </div>

                            </div>
                            <span class="mai-time"></span> 21/10/2022
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card-blog wow zoomIn">
                    <div class="header">

                        <a href="#" class="post-thumb">
                            <img src="{{ asset('images/actu3.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="body">
                        <h5 class="post-title"><a href="#">Actualité 4</a>
                        </h5>
                        <div class="site-info">
                            <div class="avatar mr-2">
                                <div class="avatar-img">

                                </div>

                            </div>
                            <span class="mai-time"></span> 21/10/2022
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div> <!-- .page-section -->

<div class="page-section mt-0 mb-0 " style="background-color:#fff;">
    <div class="container">
        <h1 class="text-center pb-4  wow fadeInUp"
            style="color:#318ead;font-weight:500; font-family: inherit; font-size: 3rem;">Nos Programmes</h1>


        <div id="carouselExampleIndicators" class="carousel slide " data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <img src="{{ asset('images/acc3.jpg') }}" class="d-block w-100 h-25 " alt="Slide 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>PROGRAMME «MOURAFAKA»</h5>
                        <p>Le programme « Mourafaka » est un programme d’appui post-création aux coopératives
                            nouvellement créées.</p>
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="carousel-item">
                    <img src="{{ asset('images/login.jpg') }}" class="d-block w-100 h-25 " alt="Slide 2">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Autre Slide</h5>
                        <p>Une description pour le deuxième slide.</p>
                    </div>
                </div>
                <!-- Slide 3 -->
                <div class="carousel-item">
                    <img src="https://via.placeholder.com/1343x700.png" class="d-block w-100 h-25" alt="Slide 3">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Encore un Slide</h5>
                        <p>Une description pour le troisième slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>




    </div>
</div>



<div class="page-section bg-light mt-0 mb-0"style="background-color:#f7f9fb;">
    <div class="container">
        <h1 class="text-center pb-4 wow fadeInUp"
            style="color:#318ead;font-weight:500; font-family: inherit; font-size: 3rem;">Statistiques</h1>
        <p class="lead text-center">Découvrez les données essentielles sur le mouvement coopératif grâce à notre section
            « Statistiques ». Parcourez les chiffres clés qui façonnent le paysage coopératif, et renforcez votre
            compréhension pour des décisions éclairées.</p>
        <div class="container mt-5">
            <div class="row text-center">
                <div class="col-md-3">
                    <h2 class="display-6"
                        style="color : #318ead; font-family:Montserrat,Sans-serif;font-size: 50px;font-weight: 600;">14
                    </h2>
                    <p class="text-muted">Nombre des coopératives</p>
                </div>
                <div class="col-md-3">
                    <h2 class="display-6"
                        style="color : #318ead; font-family:Montserrat,Sans-serif;font-size: 50px;font-weight: 600;">590
                    </h2>
                    <p class="text-muted">Adhérents aux coopératives</p>
                </div>
                <div class="col-md-3">
                    <h2 class="display-6"
                        style="color : #318ead; font-family:Montserrat,Sans-serif;font-size: 50px;font-weight: 600;">21
                    </h2>
                    <p class="text-muted">Programmes</p>
                </div>
                <div class="col-md-3">
                    <h2 class="display-6"
                        style="color : #318ead; font-family:Montserrat,Sans-serif;font-size: 50px;font-weight: 600;">4
                    </h2>
                    <p class="text-muted">Programmes en cours</p>
                </div>
            </div>
        </div>
        {{-- <div class="container text-center mt-4">
            <a href="" class="btn btn-success">En savoir plus</a>
        </div> --}}
    </div>
</div> <!-- .page-section -->

<!-- .banner-home -->
@endsection
