{{-- Guest header --}}
<header id="guest_header">

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

                    {{-- Link menu --}}
                    <ul class="navbar-nav mb-lg-0 d-flex flex-grow-1 justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link fs-5" aria-current="page" href="{{route('user.home')}}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5" aria-current="page" href="{{route('user.orders.index')}}">Ordini</a>
                        </li>
                    </ul>

                    <div class="d-flex align-items-center gap-4">

                        {{-- Shopping cart --}}
                        <a href="/cart-shop" class="cart_shop">
                            <figure class="icon">
                                <img src="{{asset('img/cart_shop_icon.svg')}}" alt="">
                            </figure>

                            <div class="cart_length bg-danger">
                                <h2 class="mb-0 text-white fs-6">0</h2>
                            </div>
                        </a>

                        {{-- menu nav right --}}
                        <div class="top-right links">
                            {{-- Dropdown tbn --}}
                            <div class="dropdown">
                                <button class="btn btn-primary text-white dropdown-toggle d-flex align-items-center flex-wrap gap-3" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img class="user_logo" src="{{asset('storage/'.Auth::user()->image)}}" alt="">
                                    {{Auth::user()->name}}
                                </button>
                                <ul class="dropdown-menu bg-primary dropdown-menu-dark text-white" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user.home') }}">
                                            Pannello Utente
                                        </a>
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
                        </div>

                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>

<script>

    // const cart shop
    const cart_shop = JSON.parse(localStorage.getItem("cart_shop"));

    // const cart lenght div h2
    const cart_length_h2 = document.querySelector('.cart_length > h2');

    // cart_length_h2 inner html cart shop lenght
    cart_length_h2.innerHTML = cart_shop.length;
</script>

<style>
    header {
        width: 100%;
        height: 75px;
        position: sticky;
        top: 0;
        left: 0;
        z-index: 999999;
    }

    .dropdown-menu {
        max-height: 200px
    }

    .cart_shop {
        width: 40px;
        height: 40px;
        position: relative;
        cursor: pointer;
    }

    .cart_shop>.icon {
        width: 40px;
        height: 40px;
    }

    .cart_shop>.icon>img {
        width: 100%;
        height: 100%;
        display: block;
    }

    .cart_shop>.cart_length {
        position: absolute;
        top: -10px;
        right: 0;
        padding: 5px 5px;
        border-radius: 999999px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

</style>
