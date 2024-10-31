<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    @vite('resources/css/app.css')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('admin.layouts.navbar')
        <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="" class="brand-link">
        
        <span class="brand-text font-weight-light" style="font-size: 1.3em;"><b>SUPMTI</b> </span>
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="images/user1-128x128.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

       

      

    </div>

</aside>

<aside class="main-sidebar sidebar-dark-olive elevation-4" style="background:#f1f1f1 ">

    <a href="index3.html" class="brand-link">
        <img src="{{ asset("images/logo-white.png") }}" height="70" width=""  alt="Logo SUPMTI">
        {{-- <span class="brand-text font-weight-light" style="font-size: 1.3em;"><b>SUPMTI</b> </span> --}}
    </a>

    <div class="sidebar" >

        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="images/user1-128x128.jpg" height="60" width="60" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div> --}}

        <nav class="mt-2" >
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="nav-item fas fa-home"></i>
                        <p>
                            Accueil
        
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route("stage.index") }}" class="nav-link">
                        <i class="nav-item fas fa-window-restore"></i>
                        <p>Gestion offres-stages
                        </p>
        
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-item fas fa-file"></i>
                        <p>Gestion des stages
                        </p>
        
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-tem fas fa-users"></i>
                        <p>Gestion des Candidatures
                        </p>
        
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-item fas fa-list"></i>
                        <p>Gestion des Encadrants
                        </p>
        
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-item fas fa-list"></i>
                        <p>Gestion des Évaluations
                        </p>
        
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>Habilitations
                        </p>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-users-cog"></i>
                                <p>Utilisateurs</p>
                            </a>
                        </li> 
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-fingerprint"></i>
                                <p>Roles et permissions</p>
                            </a>
                        </li>     
                    </ul>
                </li>
            </ul>
        </nav>

      

    </div>

</aside>
     

        <div class="content-wrapper">

            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                   

                </div>
            </div>

        </div>


        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="bg-dark">
                <div class="card-body bg-dark box-profile" style="background-color: #ffff">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="images/user1-128x128.jpg"
                            alt="User profile picture">
                    </div>
        
                    <h3 class="profile-username text-center ellipsis"> {{ auth()->user()->name }} </h3>
        
                    <p class="text-muted text-center">Admin</p>
        
                    <ul class="list-group bg-dark mb-3">
                        <li class="list-group-item">
                            <a href="#" class="d-flex align-items-center"><i class="fa fa-user pr-2"></i><b>Mon
                                    profile</b> </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="d-flex align-items-center "><i class="fa fa-lock pr-2"></i><b>Mot de
                                    passe</b> </a>
                        </li>
        
                    </ul>
        
                    <a class="btn btn-primary btn-block" href="{{ route('logout') }}" onclick="event.preventDefault();
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

    @vite('resources/js/app.js')
</body>

</html>