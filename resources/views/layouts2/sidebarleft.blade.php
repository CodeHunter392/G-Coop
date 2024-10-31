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

            <ul class="list-group  mb-3" >
                <li class="list-group-item bg-light-primary" >
                    <a href="{{ route('profile.edit') }}" class="d-flex align-items-center"><i class="fa fa-user pr-2"></i><b>Mon
                            profile</b> </a>
                </li>
                <li class="list-group-item  bg-primary-light" >
                    <a href="{{ route('profile.edit') }}" class="d-flex align-items-center "><i class="fa fa-lock pr-2"></i><b>Mot de
                            passe</b> </a>
                </li>


            </ul>

            <a class=" btn bg-danger text-light btn-block" href="{{ route('logout') }}" onclick="event.preventDefault();
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
