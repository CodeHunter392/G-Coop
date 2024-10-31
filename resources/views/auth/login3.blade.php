@extends('layoutsWelcome.master')
@section('titre', 'Connectez vous !')
@section('content')
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
@endsection
