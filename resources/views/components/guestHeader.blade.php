<div class="container-fluid bg-dark">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark w-100">
        <div class="container-fluid">
            
            {{-- nav brand icon --}}
            <figure class="logo_nav mb-0">
                <a class="navbar-brand fs-3" href="{{ url('/') }}">
                    <img src="{{asset('img/bounce_shop_logo.png')}}" alt="">
                </a>
            </figure>

            {{-- Btn hamburger menu --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link fs-5" aria-current="page" href="/">Homepage</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fs-5" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="d-flex">
                    {{-- If route login --}}
                    @if (Route::has('login'))
    
                        <div class="top-right links">
                            @auth
                                {{-- Dropdown tbn --}}
                                <div class="dropdown">
                                    <button class="btn btn-primary text-white dropdown-toggle d-flex align-items-center gap-3" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img class="user_logo" src="{{asset('storage/'.Auth::user()->image)}}" alt="">
                                        {{Auth::user()->name}}
                                    </button>
                                    <ul class="dropdown-menu bg-primary dropdown-menu-dark text-white" aria-labelledby="dropdownMenuButton1">
                                        <li>
                                            @if (Auth::user()->hasRole('superadministrator'))
                                                <a class="dropdown-item" href="{{route('admin.home')}}">
                                                    Pannello Admin
                                                </a>

                                                @elseif (Auth::user()->hasRole('user'))
                                                    <a class="dropdown-item" href="{{ route('user.home') }}">
                                                        Pannello Utente
                                                    </a>
                                            @endif
                                        </li>
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
                            
                                @else

                                    {{-- Links login register --}}
                                    <div class="links d-flex gap-3">
                                        <a class="link-light btn btn-primary" href="{{ route('login') }}">Accedi</a>
            
                                        @if (Route::has('register'))
                                            <a class="link-light btn btn-primary" href="{{ route('register') }}">Registrati</a>
                                        @endif
                                    </div>
                            @endauth
                        </div>
    
                    @endif
    
                </div>
            </div>
        </div>
    </nav>
</div>
