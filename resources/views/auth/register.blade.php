@extends('layouts.app')

@section('metaTitle', '| Registrazione')

@section('header')
    @include('components.guestHeader')
@endsection

@section('content')

    {{-- section register --}}
    <section id="register_page">
        <div class="container">
            <div class="row justify-content-center flex-column align-items-center">

                {{-- link page login --}}
                <div class="col-12 col-md-6 mb-4">
                    {{-- Link pagina registrazione --}}
                    <div class="text-start">
                        <a href="{{route('login')}}" class="text-decoration-none link-light">
                            <span><i class="fa-solid fa-arrow-left"></i> Accedi</span>
                        </a>
                    </div>
                </div>


                {{-- register form --}}
                <div class="col-12 col-md-6">
                    {{-- Card --}}
                    <div class="card bg-dark text-white shadow-inset-1">
                        <div class="card-header text-center border-0 shadow mb-3">
                            <h3 class="mb-0">Registrati</h3>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                {{-- Name --}}
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control text-black bg-dark text-white border-0 @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}" placeholder="Nome" required>

                                    <label for="floatingInput">
                                        <i class="fa-solid fa-user"></i>
                                        Nome
                                    </label>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                {{-- Surname --}}
                                <div class="form-floating mb-4">
                                    <input type="surname" class="form-control text-black bg-dark text-white border-0 @error('surname') is-invalid @enderror" id="surname" name="surname" value="{{old('surname')}}" placeholder="Cognome" required>

                                    <label for="floatingInput">
                                        <i class="fa-solid fa-user"></i>
                                        Cognome
                                    </label>

                                    @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                {{-- City --}}
                                <div class="form-floating mb-4">
                                    <input type="city" class="form-control text-black bg-dark text-white border-0 @error('city') is-invalid @enderror" id="city" name="city" value="{{old('city')}}" placeholder="Città" required>

                                    <label for="floatingInput">
                                        <i class="fa-solid fa-city"></i>
                                        Città
                                    </label>

                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                {{-- Address --}}
                                <div class="form-floating mb-4">
                                    <input type="address" class="form-control text-black bg-dark text-white border-0 @error('address') is-invalid @enderror" id="address" name="address" value="{{old('address')}}" placeholder="Indirizzo" required>

                                    <label for="floatingInput">
                                        <i class="fa-sharp fa-solid fa-location-dot"></i>
                                        Indirizzo
                                    </label>

                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                {{-- Email Address --}}
                                <div class="form-floating mb-4">
                                    <input type="email" class="form-control text-black bg-dark text-white border-0 @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}" placeholder="Indirizzo e-mail" required>

                                    <label for="floatingInput">
                                        <i class="fa-solid fa-envelope"></i>
                                        E-Mail
                                    </label>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                {{-- Password --}}
                                <div class="form-floating mb-4">
                                    <input id="password" type="password" class="form-control text-black bg-dark text-white border-0 @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">


                                    <label for="floatingInput">
                                        <i class="fa-solid fa-lock"></i>
                                        Password
                                    </label>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                {{-- Password confirm --}}
                                <div class="form-floating mb-4">
                                    <input id="password-confirm" type="password" class="form-control text-black bg-dark text-white border-0 @error('password-confirm') is-invalid @enderror" name="password_confirmation" placeholder="Ripeti Password" required autocomplete="new-password">

                                    <label for="floatingInput">
                                        <i class="fa-solid fa-lock"></i>
                                        Ripeti Password
                                    </label>

                                    @error('password-confirm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-0">
                                    <div class="col-md-8 text-center mx-auto d-flex flex-wrap gap-2 justify-content-center">
                                        <button type="submit" class="btn btn-primary text-white">
                                            Registrati
                                        </button>
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
