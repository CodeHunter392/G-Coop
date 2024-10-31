<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">0 Notification0</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            0 message

                        </a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-user"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="" class="brand-link">

                <span class="brand-text font-weight-light" style="font-size: 1.3em;"><b>SUPMTI</b> </span>
            </a>

            <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('images/user1-128x128.jpg') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"></a>
                    </div>
                </div>





            </div>

        </aside>

        <aside class="main-sidebar sidebar-light-olive elevation-4">

            <a href="index3.html" class="brand-link">
                <img src="{{ asset('images/logo-white.png') }}" height="100" width="180" alt="Logo SUPMTI">
                {{-- <span class="brand-text font-weight-light" style="font-size: 1.3em;"><b>SUPMTI</b> </span> --}}
            </a>

            <div class="sidebar">

                {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="images/user1-128x128.jpg" height="60" width="60" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                    </div>
                </div> --}}

               @include('layouts.menu')



            </div>

        </aside>


        <div class="content-wrapper">

            <div class="content">

                <div class="container-fluid">



                    @yield('content')


                </div>
            </div>

        </div>

{{-- <style>
    .body{
        color:o
    }

</style> --}}
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
                        <li class="list-group-item" style="background:#3d9970">
                            <a href="#" class="d-flex align-items-center"><i class="fa fa-user pr-2"></i><b>Mon
                                    profile</b> </a>
                        </li>
                        <li class="list-group-item" style="background:#3d9970">
                            <a href="#" class="d-flex align-items-center "><i class="fa fa-lock pr-2"></i><b>Mot de
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
