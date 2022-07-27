@extends('layouts.app')

@section('metaTitle', '| Lista Utenti')

@section('header')
    @include('components.adminHeader')
@endsection

@section('content')

    {{-- section users_index --}}
    <section id="users_index">

        <div class="container">
            <div class="row gy-5 gx-5">

                {{-- Title --}}
                <div class="col-12 title text-center text-white">
                    <h1 class="mb-0">Lista Utenti</h1>
                </div>
    
                {{-- foreach users --}}
                @foreach ($users as $user )
                    <div class="col-12 col-sm-6 col-md-4">

                        {{-- Card --}}
                        <div class="card h-100">
                            <div class="card-body">
    
                                {{-- User description --}}
                                <div class="user_description mb-3">
                                    <h6 class="card-title mb-3">{{$user->id}}</h6>
                                    <h4 class="card-title mb-3">{{$user->name}} {{$user->surname}}</h4>
                                    <p class="card-text mb-3">Registrato <span>{{\Carbon\Carbon::create($user->created_at)->diffForHumans()}}</span></p>

                                    {{-- Foreach user role --}}
                                    @foreach ($user->roles as $role)
                                        <p class="badge bg-dark fs-6 fw-light">{{$role->display_name}}</p>
                                    @endforeach
                                </div>
    
                                {{-- Btn --}}
                                <div class="buttons d-flex gap-3 flex-wrap justify-content-center">
                                    <a href="{{route('admin.users.show', $user)}}" class="btn btn-primary text-white">Visualizza</a>
                                    <a href="{{route('admin.users.edit', $user)}}" class="btn btn-primary text-white">Modifica ruolo</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- Links paginate --}}
                <div class="link_paginate col-12 d-flex justify-content-center">
                    {{$users->links()}}
                </div>

            </div>
        </div>

    </section>
    
@endsection