<div class="container-fluid bg-dark">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">

            {{-- nav brand icon --}}
            <figure class="logo_nav mb-0">
                <a class="navbar-brand fs-3" href="{{ url('/') }}">
                    <img src="{{asset('img/bounce_shop_logo.png')}}" alt="">
                </a>
            </figure>

            {{-- Icon hamburger menu --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                {{-- Links --}}
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    {{-- dashboard --}}
                    <li class="nav-item">
                        <a class="nav-link @if(Route::is('admin.home'))active @endif fs-5" aria-current="page" href="{{route('admin.home')}}">Dashboard</a>
                    </li>

                    {{-- dropdown utenti --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fs-5" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Utenti
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li>
                                <a class="dropdown-item @if(Route::is('admin.users.index'))active @endif" href="{{route('admin.users.index')}}">Lista Utenti</a>
                            </li>
                        </ul>
                    </li>

                    {{-- dropdown categorie --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fs-5" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categorie
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li>
                                <a class="dropdown-item @if(Route::is('admin.categories.index'))active @endif" href="{{route('admin.categories.index')}}">Lista Categorie</a>
                            </li>
                            <li>
                                <a class="dropdown-item @if(Route::is('admin.categories.create'))active @endif" href="{{route('admin.categories.create')}}">Aggiungi Categoria</a>
                            </li>
                        </ul>
                    </li>

                    {{-- dropdown prodotti --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fs-5" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Prodotti
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li>
                                <a class="dropdown-item @if(Route::is('admin.products.index'))active @endif" href="{{route('admin.products.index')}}">Lista Prodotti</a>
                            </li>
                            <li>
                                <a class="dropdown-item @if(Route::is('admin.products.create'))active @endif" href="{{route('admin.products.create')}}">Aggiungi Prodotto</a>
                            </li>
                        </ul>
                    </li>

                    {{-- dropdown ordini --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fs-5" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Ordini
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li>
                                <a class="dropdown-item @if(Route::is('admin.orders.index'))active @endif" href="{{route('admin.orders.index')}}">Lista Ordini</a>
                            </li>
                        </ul>
                    </li>

                    {{-- dropdown messaggi --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fs-5" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Messaggi
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li>
                                {{-- <a class="dropdown-item @if(Route::is('admin.messages.index'))active @endif" href="{{route('admin.messages.index')}}">Lista Messaggi</a> --}}
                            </li>
                        </ul>
                    </li>
                </ul>

                {{-- Dropdown user profile --}}
                <div class="dropdown">
                    <button class="btn btn-primary text-white dropdown-toggle d-flex align-items-center gap-3" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="user_logo" src="{{asset('storage/'.$user_auth->image)}}" alt="">
                        {{$user_auth->name}}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark bg-primary" aria-labelledby="dropdownMenuButton1">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                {{ __('Disconnetti') }}
                            </a>
                        </li>
                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </nav>
</div>
