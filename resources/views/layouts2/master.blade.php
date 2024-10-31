<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('images/Sin-One-Origine.png') }}" type="image/png">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <livewire:styles />
<livewire:scripts />
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
                <span class="h4"> Ministère de ......... </span>
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

            {{-- <div class="text-center">
                <a href="{{ route('dashboard') }}" class="brand-link">
                <img src="{{ asset('images/g-coop.png') }}" height="50" width="90" alt="Logo">

               </a>
            </div> --}}
            <a href="{{ route('dashboard') }}" class="brand-link pt-4 ml-auto ">
                <img src="{{ asset('images/g-coop-no-bg.png') }}" width="200" height="200" alt=" Logo" >
                {{-- <span class="brand-text font-weight-light">G-COOP</span> --}}
            </a>


            <div class="sidebar">
                @include('layouts2.navbar')
            </div>

        </aside>

        <div class="content-wrapper" style="min-height: 125px;">

            <div class="content-header">

                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12 text-left">
                            @yield('h1')
                        </div>
                        <div class="col-sm-6">
                            @yield('detail')
                        </div>

                    </div>
                </div>
            </div>

            @yield('content')

        </div>
        @include('layouts2.sidebarleft')

        @include('layouts2.footer')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite('resources/js/app.js')
</body>

</html>
