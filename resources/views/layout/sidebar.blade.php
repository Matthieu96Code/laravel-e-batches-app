<div class="sidebar">
                
    @auth
        <a class="profile-link" href="">
            <span class="main-icon user-icon">
                <x-iconsax-out-profile-circle />
            </span>
            <h1>{{ Auth::user()->name }}</h1>
        </a>
        
        <h3 class="main-text menu-title">Menu</h3>
        <ul class="menu-list">
            @if (Auth::user()->role === 0)
                <li class="menu-list-item">
                    <a class="menu-list-link" href="{{ route('users.home') }}">
                        <span class="main-icon menu-icon">
                            <x-iconsax-lin-house />
                        </span>
                        <p>Accueil</p>
                    </a>
                </li>
                <li class="menu-list-item">
                    <a class="menu-list-link" href="{{ route('batches.create') }}">
                        <span class="main-icon menu-icon">
                            <x-iconsax-lin-card-add />
                        </span>
                        <p>Ajouter un  lot</p>
                    </a>
                </li>
                <li class="menu-list-item">
                    <a class="menu-list-link" href="{{ route('batches.index') }}">
                        <span class="main-icon menu-icon">
                            <x-iconsax-lin-document-text-1 />
                        </span>
                        <p>List des lots</p>
                    </a>
                </li>
                <li class="menu-list-item">
                    <a class="menu-list-link" href="{{ route('users.warranty') }}">
                        <span class="main-icon menu-icon">
                            <x-iconsax-lin-like-1 />
                        </span>
                        <p>Garantie</p>
                    </a>
                </li>
                <li class="menu-list-item">
                    <a class="menu-list-link" href="{{ route('users.fidelity') }}">
                        <span class="main-icon menu-icon">
                            <x-iconsax-two-medal-star />
                        </span>
                        <p>Fidélité</p>
                    </a>
                </li>
                <li class="menu-list-item">
                    <a class="menu-list-link" href="{{ route('users.show', Auth::id()) }}">
                        <span class="main-icon menu-icon">
                            <x-iconsax-lin-house />
                        </span>
                        <p>Profile</p>
                    </a>
                </li>
            @endif
        
            @if (Auth::user()->role > 0) 
                <li class="menu-list-item">
                    <a class="menu-list-link" href="{{ route('admin.dashboard') }}">
                        <span class="main-icon menu-icon">
                            <x-iconsax-lin-house />
                        </span>
                        <p>Accueil</p>
                    </a>
                </li>
                <li class="menu-list-item">
                    <a class="menu-list-link" href="{{ route('projects.create') }}">
                        <span class="main-icon menu-icon">
                            <x-iconsax-bul-folder-add />
                        </span>
                        <p>Ajouter un project</p>
                    </a>
                </li>
                <li class="menu-list-item">
                    <a class="menu-list-link" href="{{ route('projects.index') }}">
                        <span class="main-icon menu-icon">
                            <x-iconsax-lin-briefcase />
                        </span>
                        <p>List des projects</p>
                    </a>
                </li>
                <li class="menu-list-item">
                    <a class="menu-list-link" href="{{ route('batches.index') }}">
                        <span class="main-icon menu-icon">
                            <x-iconsax-lin-receipt-edit />
                        </span>
                        <p>Demandes de correction</p>
                    </a>
                </li>
                    @if (Auth::user()->role > 0)
                        <li class="menu-list-item">
                            <a class="menu-list-link" href="{{ route('users.index') }}">
                                <span class="main-icon menu-icon">
                                    <x-iconsax-bol-profile-2user />
                                </span>
                                <p>Liste des utilisateurs</p>
                            </a>
                        </li>
                    @endif
                <li class="menu-list-item">
                    <a class="menu-list-link" href="{{ route('users.show', Auth::id()) }}">
                        <span class="main-icon menu-icon">
                            <x-iconsax-out-user-edit />
                        </span>
                        <p>Profile</p>
                    </a>
                </li>
            @endif
        </ul>

        <form class="logout-form" action="{{ route('logout') }}" method="post">
            @csrf
            <button class="logout-btn" type="submit">
                <span class="main-icon menu-icon">
                    <x-iconsax-two-logout />
                </span>
                <p>Déconnexion</p>
            </button>
        </form>
    @endauth

</div>