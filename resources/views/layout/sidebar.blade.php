<div class="sidebar">
                
    @auth
        <a class="profile-link" href="">
            <span class="user-icon">
                <x-iconsax-bol-profile-circle />
                <x-iconsax-bol-user />
                <x-iconsax-out-profile-circle />
            </span>
            <h1>{{ Auth::user()->name }}</h1>
        </a>
        
        <h3 class="main-text menu-title">Menu</h3>
        <ul class="menu-list">
            @if (Auth::user()->role === 0)
                <li class="menu-list-item">
                    <a class="menu-list-link" href="{{ route('users.home') }}">
                        <x-iconsax-lin-house />
                        <p>Accueil</p>
                    </a>
                </li>
                <li class="menu-list-item">
                    <a class="menu-list-link" href="{{ route('batches.create') }}">
                        <x-iconsax-lin-card-add />
                        <p>Ajouter un  lot</p>
                    </a>
                </li>
                <li class="menu-list-item">
                    <a class="menu-list-link" href="{{ route('batches.index') }}">
                        <x-iconsax-lin-document-text-1 />
                        <p>List des lots</p>
                    </a>
                </li>
                <li class="menu-list-item">
                    <a class="menu-list-link" href="{{ route('users.warranty') }}">
                        <x-iconsax-lin-like-1 />
                        <p>Garantie</p>
                    </a>
                </li>
                <li class="menu-list-item">
                    <a class="menu-list-link" href="{{ route('users.fidelity') }}">
                        <x-iconsax-two-medal-star />
                        <p>Fidélité</p>
                    </a>
                </li>
                <li class="menu-list-item">
                    <a class="menu-list-link" href="{{ route('users.show', Auth::id()) }}">
                        <x-iconsax-lin-house />
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
                        <x-iconsax-bul-folder-add />
                        <p>Ajouter un project</p>
                    </a>
                </li>
                <li class="menu-list-item">
                    <a class="menu-list-link" href="{{ route('projects.index') }}">
                        <x-iconsax-lin-briefcase />
                        <p>List des projects</p>
                    </a>
                </li>
                <li class="menu-list-item">
                    <a class="menu-list-link" href="{{ route('batches.index') }}">
                        <x-iconsax-lin-receipt-edit />
                        <p>Demandes de correction</p>
                    </a>
                </li>
                    @if (Auth::user()->role > 0)
                        <li class="menu-list-item">
                            <a class="menu-list-link" href="{{ route('users.index') }}">
                                <x-iconsax-bol-profile-2user />
                                <p>Liste des utilisateurs</p>
                            </a>
                        </li>
                    @endif
                <li class="menu-list-item">
                    <a class="menu-list-link" href="{{ route('users.show', Auth::id()) }}">
                        <x-iconsax-out-user-edit />
                        <p>Profile</p>
                    </a>
                </li>
            @endif
        </ul>

        <form class="logout-form" action="{{ route('logout') }}" method="post">
            @csrf
            <button class="logout-btn" type="submit">
                <x-iconsax-two-logout />
                <p>Déconnexion</p>
            </button>
        </form>
    @endauth

</div>