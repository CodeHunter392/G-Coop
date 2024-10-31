<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">

        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ setMenuActive('dashboard') }}">
                <i class="nav-item fas fa-home"></i>
                <p>
                    Accueil

                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route("offre.index") }}" class="nav-link {{ setMenuActive('offre.index') }}">
                <i class="nav-item fas fa-window-restore"></i>
                <p>Gestion offres-stages
                </p>

            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('stage.index') }}" class="nav-link {{ setMenuActive('stage.index') }}">
                <i class="nav-item fas fa-file"></i>
                <p>Gestion des stages
                </p>

            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('soutenance.index') }}" class="nav-link {{ setMenuActive('soutenance.index') }}">
                <i class="nav-item fa fa-graduation-cap"></i>
                <p>Gestion des soutenances
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
            <a href="{{ route('users.index') }}" class="nav-link {{ setMenuClass('users.index','menu-open') }}">
                <i class="nav-icon fas fa-user-shield "></i>
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