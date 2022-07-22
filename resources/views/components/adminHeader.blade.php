<div class="container-fluid bg-primary">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
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
                        <a class="nav-link fs-5" href="#">Prodotti</a>
                    </li>
                </ul>

                {{-- Dropdown user profile --}}
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        {{$user->name}} {{$user->surname}}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
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
