<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class='bg-skin-background-secondary md:flex' >
        <div class="md:w-96">
            <nav class="w-full bg-skin-primary grid grid-cols-2 fixed top-0 shadow-md
                                md:min-h-screen md:flex md:flex-col md:sticky md:rounded-e-2xl ">
                <div class="flex items-center gap-2 p-5 text-skin-primary
                                md:pb-7">
                    UserIcon
                    <h2 class="font-bold px-5 py-2 text-3xl my-auto">Username</h2>
                </div>
                <ul class="bg-skin-background-secondary col-span-2 flex items-center overflow-x-scroll order-last gap-4 p-5 border border-gray-300
                md:flex-col md:items-start md:order-none md:overflow-visible md:border-none md:bg-skin-primary">
                    <h2 class="hidden md:block font-bold text-sm text-skin-primary-muted px-5 py-2 my-auto">MENU</h2>
                    <li class="sidebar-items">
                        <CiHome class="sidebar-icons"/>
                        <a class="text-nowrap" href={{ url('/profile') }}>Accueil</a>
                    </li>
                    <li class="sidebar-items">
                        <AiOutlineFolderAdd class="sidebar-icons"/>
                        <a class="text-nowrap" href={{ url('/profile/at/projects/add') }}>Ajouter un project</a>
                    </li>
                    <li class="sidebar-items">
                        <SiReaddotcv class="sidebar-icons"/>
                        <a class="text-nowrap" href={{ url('/profile/at/projects') }}>Liste de projets </a>
                    </li>
                    <li class="sidebar-items">
                        <FaRegEdit class="sidebar-icons"/>
                        <a class="text-nowrap" href={{ url('/profile/at/batches') }}>Demande de correction </a>
                    </li>
                    <li class="sidebar-items ">
                        <FaUsers class="sidebar-icons"/>
                        <a class="text-nowrap" href={{ url('/profile/admin/users') }}>Liste des utilisateurs</a>
                    </li>
                    <li class="sidebar-items">
                        <CiSettings class="sidebar-icons"/>
                        <a class="text-nowrap" href={{ url('/profile/setting') }}>Paramètre</a>
                    </li>
                    <li class="sidebar-items">
                        <MdOutlineContactSupport class="sidebar-icons"/>
                        <a class="text-nowrap" href={{ url('/profile/help') }}>Support & Aide</a>
                    </li>
                </ul>
                <<a href="{{ route('logout') }}" class="flex items-center gap-2 py-2 text-skin-primary my-2 text-lg ml-auto px-5
                md:mx-auto md:mt-auto md:mb-5">
                    LogoutIcon
                    <p>Déconnexion</p>
                </a>
            </nav>
        </div>
        <section class="min-h-screen w-full px-5 pt-60 text-skin-secondary
        md:pt-5 md:px-20">
            @yield('contents')
        </section>
    </div>
</body>
</html>