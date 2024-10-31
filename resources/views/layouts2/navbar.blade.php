<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('welcome') }}" class="nav-link  {{ setMenuActive('welcome') }}">
                <i class="nav-item fas fa-home"></i>
                <p>
                    Accueil

                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link  {{ setMenuActive('dashboard') }}">
                <i class="fas fa-tachometer-alt"></i>
                <p>
                    Dashboard

                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('coop.index') }}" class="nav-link {{ setMenuActive('coop.index') }}">
                <i class="nav-item fas fa-users"></i>
                <p>
                    Coopératives

                </p>
            </a>
        </li> <li class="nav-item">
            <a href="{{ route('organisme.index') }}" class="nav-link {{ setMenuActive('organisme.index') }}">
                <i class="nav-item fas fa-landmark"></i>
                <p>
                    Organismes

                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('programme.index') }}" class="nav-link {{ setMenuActive('programme.index') }}">
                <i class="nav-item fas fa-project-diagram"></i>
                <p>
                    Programmes

                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('ligneprogramme.index') }}" class="nav-link {{ setMenuActive('ligneprogramme.index') }}">

                <i class="nav-item fas fa-grip-lines"></i>
                <p>
                    Lignes de programmes

                </p>
            </a>
        </li>
    </ul>
</nav>
