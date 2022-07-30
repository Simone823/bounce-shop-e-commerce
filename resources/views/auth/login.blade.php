@extends('layouts.app')

@section('metaTitle', '| Accedi')

@section('header')
    @include('components.guestHeader')
@endsection

@section('content')

    {{-- Section login page --}}
    <section id="login_page">

        <div class="container pt-5">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-8 col-md-5">

                    {{-- Link pagina homepage --}}
                    <div class="mb-4 d-flex align-items-center justify-content-between flex-wrap gap-4">
                        <a href="/" class="text-decoration-none link-light">
                            <span>&#x21fd; Torna alla Homepage</span>
                        </a>
                        <a href="{{route('register')}}" class="text-decoration-none link-light">
                            <span>Vai alla pagina di registrazione &#x21fe;</span>
                        </a>
                    </div>

                    <div class="card shadow-lg">

                        <div class="card-header text-center border-0 shadow mb-3">
                            <h3 class="mb-0">Accedi</h3>
                        </div>
        
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                {{-- Email --}}
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}" placeholder="name@example.com" required autocomplete="email">
                                    <label for="floatingInput">Indirizzo E-mail</label>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
        
                                {{-- Password --}}
                                <div class="form-floating mb-4">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required autocomplete="current-password">
                                    <label for="floatingPassword">Password</label>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
        
                                {{-- Remember me --}}
                                <div class="form-group mb-4 text-center">
                                    <input type="checkbox" class="btn-check" name="remember" id="remember" {{old('remember') ? 'checked' : ''}}>
                                    <label class="btn btn-outline-dark" for="remember">Ricorda al prossimo accesso</label><br>
                                </div>
        
                                <div class="form-group mb-0">
                                    <div class="col-md-8 text-center mx-auto d-flex flex-wrap gap-2 justify-content-center">
                                        <button type="submit" class="btn btn-primary text-white">
                                            Accedi
                                        </button>
        
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-primary text-white" href="{{ route('password.request') }}">
                                                Hai dimenticato la Password?
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
