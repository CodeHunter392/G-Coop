{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


@extends('layoutsWelcome.master')
@section('titre', 'Réinitialiser votre mot de passe !')
@section('content')

    <div class="content-wrapper"
        style="min-height: 36px;background-image: url('{{ asset('images/register-img2.jpg') }}'); background-size: cover; background-position: center;"">

        <div class=" content ">
            <div class=" container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">
                        <div class="card" style="border-radius: 1rem;">

                            <div class="card-body p-4 p-lg-5 text-black">

                                <form class="form-signin" method="POST" action="{{ route('password.email') }}">
                                    @csrf

                                    <div class="text-center mb-3 pb-1">

                                        <span class="h1 fw-bold mb-0"><img src="{{ asset('images/g-coop3.png') }}"
                                                alt="G-COOP"></span>
                                    </div>

                                    <h5 class="fw-normal text-center mb-3 pb-3" style="letter-spacing: 1px;">Mot de passe oublié ? Pas de soucis. Veuillez nous indiquer votre adresse e-mail et nous vous enverrons un lien de réinitialisation du mot de passe.</h5>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="form2Example17"></label>
                                        <input type="email" class="form-control text-center @error('email') 'is-invalid' @enderror"
                                            name="email" value="{{ old('email') }} " placeholder="Email"
                                            id="login-user-input" autofocus required />
                                        @error('email')
                                            <div class="alert alert-danger">
                                                <center>{{ $message }}</center>
                                            </div>
                                        @enderror

                                    </div>



                                    <div class="pt-1 mb-4">
                                        <button data-mdb-button-init data-mdb-ripple-init
                                            class="btn btn-success btn-lg btn-block" type="submit"> <i
                                                class="fa fa-sign-in"></i> Envoyer le lien de réinitialisation du mot de passe</button>
                                    </div>
                                    <div class="text-center"><a class="small text-muted "
                                            href="{{ route('login') }}">Connectez vous </a></div>


                                </form>


                            </div>

                        </div>

                    </div>


                </div>

            </div>
        </div>

    </div>


@endsection
