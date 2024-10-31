{{-- @extends('layouts.authsup')

@section('content')
<div class="login-wrapper">
    <div class="login-left-side">
        <img src="{{ asset('images/Sin-One-Origine.png') }}" class="login-left-logo" alt="">

        <img src="{{ asset('loginsup/images/wave.svg') }}" class="login-wave-illustration" alt="">

        <!-- <h2>Bienvenue sur:<br /><span>Espace de Gestion</span></h2> -->
    </div>
    <div class="login-right-side">
        <div class="login-right-side-content">

            <h3>Espace Gestion de Stages</h3>
            <h4>Connectez vous pour accéder à votre Espace</h4>

            <form class="form-signin" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="login-wrap">
                    @error('email')
                    <div class="alert alert-danger">
                        <center>L`Email ou le Mot de Passe est Incorrect</center>
                    </div>

                    @enderror
                    @error('password')
                    <div class="alert alert-danger">
                        <center>L`Email ou le Mot de Passe est Incorrect</center>
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="login-user-input">Nom d'utilisateur</label>
                        <input type="text" class="form-control @error('email') 'is-invalid' @enderror" name="email"
                            value="{{ old('email') }} " placeholder="Email" id="login-user-input" autofocus required>


                    </div>
                    <div class="form-group">
                        <label for="login-user-password">Mot de passe</label>
                        <input type="password" class="form-control @error('password') 'is-invalid' @enderror"
                            name="password" placeholder="Mot de Passe" required>

                    </div>
                    <div class="form-group checkbox-group">
                        <input type="checkbox" name="login-remember-checkbox" id="login-remember-checkbox" value="">
                        <label for="login-remember-checkbox">Rester connecté.</label>
                    </div>

                    <br />

                    <div class="form-group text-center mt-4">
                        <button class="btn btn-lg btn-login btn-block" type="submit">
                            <i class="fa fa-sign-in"></i> se connecter
                        </button>
                    </div>
                    <div class="form-group text-center">
                        <label><a data-toggle="modal" href="{{ route('password.request') }}"> Mot de Passe Oublié
                                ?</a></label>
                    </div>

                    <!-- <div class="form-group text-center">
                        <label class="subs-link">Etudiant, Nouvel inscrit? <a href="javascript:;">Inscrivez-vous</a></label>
                    </div> -->

                </div>



            </form>
        </div>
    </div>
</div>
@endsection --}}
{{--
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Authentification</title>
</head>

<body>
    <section class="vh-100" style="background-color: #d1e1e6;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="{{ asset('images/image_login.jpg') }}" alt="login form" class="img-fluid"
                                    style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form class="form-signin" method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="d-flex align-items-center mb-3 pb-1">

                                            <span class="h1 fw-bold mb-0"><img
                                                    src="{{ asset('images/Sin-One-Origine.png') }}" width="300px"
                                                    height="119" alt="sinone-logo"></span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Connectez vous pour
                                            accéder à votre espace</h5>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <label class="form-label" for="form2Example17">Nom d'utilisateur</label>
                                            <input type="text"
                                                class="form-control @error('email') 'is-invalid' @enderror" name="email"
                                                value="{{ old('email') }} " placeholder="Email" id="login-user-input"
                                                autofocus required />
                                            @error('email')
                                            <div class="alert alert-danger">
                                                <center>L`Email ou le Mot de Passe est Incorrect</center>
                                            </div>

                                            @enderror
                                            @error('password')
                                            <div class="alert alert-danger">
                                                <center>L`Email ou le Mot de Passe est Incorrect</center>
                                            </div>
                                            @enderror
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <label class="form-label" for="form2Example27">Mot de passe </label>
                                            <input type="password"
                                                class="form-control @error('password') 'is-invalid' @enderror"
                                                name="password" placeholder="Mot de Passe" required />
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-success btn-lg btn-block" type="submit"> <i
                                                    class="fa fa-sign-in"></i> se connecter</button>
                                        </div>

                                        <a class="small text-muted" href="{{ route('password.request') }}">Mot de passe
                                            oublié ?</a>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
--}}

@extends('layoutsWelcome.master')
@section('titre', 'Connectez vous !')
@section('content')
<div class="page-section" style="background-image: url('{{ asset('images/register-img2.jpg') }}'); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10" style="width: 50%">
                <div class="card " style="border-radius: 1rem;">

                    <div class="card-body p-4 p-lg-5 text-black">

                        <form class="form-signin" method="POST" action="{{ route('login') }}">
                            @csrf

                             {{-- <div class="text-center mb-2 pb-0">

                                <span class="h1 fw-bold mb-0"><img src="{{ asset('images/g-coop3.png') }}"
                                        alt="G-COOP" width="100px" height="50px;"></span>
                             </div> --}}

                            {{-- <h5 class="fw-normal text-center mb-0 pb-0 " style="letter-spacing: 1px;" >Se Connecter <br> Vous êtes nouveau ? Inscrivez-Vous
                              </h5> --}}
                              <h3 class="text-center pt-0 mt-0 pb-1 fw-bold">Connexion</h3>
                            <div data-mdb-input-init class="form-outline mb-2">
                                <label class="form-label" for="form2Example17">Nom d'utilisateur</label>
                                <input type="text" class="form-control @error('email') 'is-invalid' @enderror"
                                    name="email" value="{{ old('email') }} " placeholder="Email"
                                    id="login-user-input" autofocus required />
                                @error('email')
                                    <div class="alert alert-danger">
                                        <center>L`Email ou le Mot de Passe est Incorrect</center>
                                    </div>
                                @enderror
                                @error('password')
                                    <div class="alert alert-danger">
                                        <center>L`Email ou le Mot de Passe est Incorrect</center>
                                    </div>
                                @enderror
                            </div>

                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="form2Example27">Mot de passe </label>
                                <input type="password"
                                    class="form-control @error('password') 'is-invalid' @enderror" name="password"
                                    placeholder="Mot de Passe" required />
                            </div>

                            <div class="pt-1 mb-4">
                                <button data-mdb-button-init data-mdb-ripple-init
                                    class="btn btn-lg btn-block text-white" type="submit" style="background-color: #284a71"> <i
                                        class="fa fa-sign-in"></i> se connecter</button>
                            </div>
                            <div class="text-center"><a class="small text-muted "
                                    href="{{ route('password.request') }}">Mot de passe
                                    oublié ?</a></div>


                        </form>


                    </div>

                </div>

            </div>


        </div>
    </div>
</div>


@endsection
