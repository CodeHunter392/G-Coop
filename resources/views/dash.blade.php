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
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-item fas fa-home"></i>
                                <p>
                                    Accueil

                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

        </aside>

        <div class="content-wrapper" style="min-height: 125px;">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Tableau de bord</h1>
                        </div>

                    </div>
                </div>
            </div>

           @yield('content')

        </div>
        <aside class="control-sidebar control-sidebar-light ">
            <!-- Control sidebar content goes here -->
            <div class="bg-light" >
                <div class="card-body bg-light box-profile" >
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset('images/user.png') }}"
                            alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center ellipsis">  </h3>

                    <p class="text-muted text-center">Admin</p>

                    <ul class="list-group bg-dark mb-3" >
                        <li class="list-group-item bg-primary" >
                            <a href="{{ route('profile.edit') }}" class="d-flex align-items-center"><i class="fa fa-user pr-2"></i><b>Mon
                                    profile</b> </a>
                        </li>
                        <li class="list-group-item bg-primary" >
                            <a href="{{ route('profile.edit') }}" class="d-flex align-items-center "><i class="fa fa-lock pr-2"></i><b>Mot de
                                    passe</b> </a>
                        </li>

                    </ul>

                    <a class="btn btn-danger btn-block" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        Déconnexion
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </aside>

        <footer class="main-footer">

            <div class="float-right d-none d-sm-inline">

            </div>

            <strong>Copyright &copy; 2024 <a href="https://sin-one.com/">SINONE</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




    @vite('resources/js/app.js')
</body>

</html>

