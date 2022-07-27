<div class="container-fluid bg-dark">
    <nav class="navbar navbar-expand-xxl navbar-dark">
        <div class="container-fluid">

            {{-- nav brand icon --}}
            <a class="navbar-brand fs-3" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>

            {{-- Icon hamburger menu --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                {{-- Links --}}
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link @if(Route::is('admin.home'))active @endif fs-5" aria-current="page" href="{{route('admin.home')}}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5 @if(Route::is('admin.users.index'))active @endif" href="{{route('admin.users.index')}}">Utenti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5 @if(Route::is('admin.categories.index'))active @endif" href="{{route('admin.categories.index')}}">Categorie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5 @if(Route::is('admin.products.index'))active @endif" href="{{route('admin.products.index')}}">Prodotti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5 @if(Route::is('admin.orders.index'))active @endif" href="{{route('admin.orders.index')}}">Ordini</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5 @if(Route::is('admin.categories.create'))active @endif" href="{{route('admin.categories.create')}}">Aggiungi Categoria</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5 @if(Route::is('admin.products.create'))active @endif" href="{{route('admin.products.create')}}">Aggiungi Prodotto</a>
                    </li>
                </ul>

                {{-- Dropdown user profile --}}
                <div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle d-flex align-items-center gap-3" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="user_logo" src="{{asset('storage/'.$user_auth->image)}}" alt="">
                        {{$user_auth->name}}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
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
