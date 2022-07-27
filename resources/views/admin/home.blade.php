@extends('layouts.app')

@section('header')

    @include('components.adminHeader')

@endsection

@section('content')

    {{-- section  admin home dashboard --}}
    <section id="admin_home">

        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-8">

                    <div class="card">
                        <div class="card-header">{{ __('Dashboard Admin') }}</div>
        
                        <div class="card-body">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif
        
                            {{ __('You are logged in! as Admin') }}
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection
