<div class="sidebar">
                
    @auth
        <a class="profile-link" href="">
            <span class="user-icon">
                <x-tabler-arrow-big-left-filled />
            </span>
            <h1>{{ Auth::user()->name }}</h1>
        </a>
        
        <h3 class="main-text menu-title">Menu</h3>
        <ul class="menu-list">
            @if (Auth::user()->role === 0)
                <li class="menu-list-item">
                    <a class="menu-list-link" href="{{ route('users.home') }}">
                        <x-tabler-arrow-big-left-filled />
                        <p>Accueil</p>
                    </a>
                </li>
                <li class="menu-list-item">
                    <a class="menu-list-link" href="{{ route('batches.create') }}">
                        <x-tabler-arrow-big-left-filled />
                        <p>Ajouter un  lot</p>
                    </a>
                </li>
                <li class="menu-list-item">
                    <a class="menu-list-link" href="{{ route('batches.index') }}">
                        <x-tabler-arrow-big-left-filled />
                        <p>List des lots</p>
                    </a>
                </li>
                <li class="menu-list-item">
                    <a class="menu-list-link" href="{{ route('users.warranty') }}">
                        <x-tabler-arrow-big-left-filled />
                        <p>Garantie</p>
                    </a>
                </li>
                <li class="menu-list-item">
                    <a class="menu-list-link" href="{{ route('users.fidelity') }}">
                        <x-tabler-arrow-big-left-filled />
                        <p>Fidélité</p>
                    </a>
                </li>
                <li class="menu-list-item">
                    <a class="menu-list-link" href="{{ route('users.show', Auth::id()) }}">
                        <x-tabler-arrow-big-left-filled />
                        <p>Profile</p>
                    </a>
                </li>
            @endif
        
            @if (Auth::user()->role > 0) 
                <li class="menu-list-item">
                    <a class="menu-list-link" href="{{ route('admin.dashboard') }}">
                        <x-tabler-arrow-big-left-filled />
                        <p>Accueil</p>
                    </a>
                </li>
                <li class="menu-list-item">
                    <a class="menu-list-link" href="{{ route('projects.create') }}">
                        <x-tabler-arrow-big-left-filled />
                        <p>Ajouter un project</p>
                    </a>
                </li>
                <li class="menu-list-item">
                    <a class="menu-list-link" href="{{ route('projects.index') }}">
                        <x-tabler-arrow-big-left-filled />
                        <p>List des projects</p>
                    </a>
                </li>
                <li class="menu-list-item">
                    <a class="menu-list-link" href="{{ route('batches.index') }}">
                        <x-tabler-arrow-big-left-filled />
                        <p>Demandes de correction</p>
                    </a>
                </li>
                    @if (Auth::user()->role > 0)
                        <li class="menu-list-item">
                            <a class="menu-list-link" href="{{ route('users.index') }}">
                                <x-tabler-arrow-big-left-filled />
                                <p>Liste des utilisateurs</p>
                            </a>
                        </li>
                    @endif
                <li class="menu-list-item">
                    <a class="menu-list-link" href="{{ route('users.show', Auth::id()) }}">
                        <x-tabler-arrow-big-left-filled />
                        <p>Profile</p>
                    </a>
                </li>
            @endif
        </ul>

        <form class="logout-form" action="{{ route('logout') }}" method="post">
            @csrf
            <button class="logout-btn" type="submit">
                <x-tabler-arrow-big-left-filled />
                <p>Déconnexion</p>
            </button>
        </form>
    @endauth

</div>