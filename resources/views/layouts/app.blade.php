<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('images/Sin-One-Origine.png') }}" type="image/png">
    <title>@yield('title')</title>

    @vite('resources/css/app.css')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">



                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-user"></i>
                    </a>
                </li>

            </ul>
        </nav>


        <aside class="main-sidebar sidebar-light-primary elevation-4">

            <a href="#" class="brand-link">
                <img src="{{ asset('images/Sin-One-Origine.png') }}" height="100" width="180" alt="Logo SUPMTI">
                {{-- <span class="brand-text font-weight-light" style="font-size: 1.3em;"><b>SUPMTI</b> </span> --}}
            </a>

            <div class="sidebar">
              @include('layouts2.navbar')
            </div>

        </aside>

        <div class="content-wrapper" style="min-height: 125px;">
            <div class="content-header">
                <div class="container-fluid">
                    <h1>Mon profile</h1>
                </div>
            </div>
            <div class="content-body">
                <div class="container-fluid">
                    <main>
                        {{ $slot }}
                    </main>
                </div>
            </div>


        </div>
        @include('layouts2.sidebarleft')

        @include('layouts2.footer')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




    @vite('resources/js/app.js')
</body>

</html>

