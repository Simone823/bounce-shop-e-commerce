@extends('layouts.app')

@section('metaTitle', '| Dashboard')

@section('header')
    @include('components.userHeader');
@endsection

@section('content')

    {{-- section user home --}}
    <section id="user_home">
        <div class="container">
            <div class="row">

                {{-- Title --}}
                <div class="col-12 title text-center text-white mb-4">
                    <h1 class="text-white text-uppercase mb-0 fw-bold">Il tuo profilo</h1>
                </div>

                {{-- card user input--}}
                <div class="col-12 card bg-dark text-white">
                    <h2>{{$user->name}} {{$user->surname}}</h2>
                </div>

            </div>
        </div>
    </section>

@endsection
