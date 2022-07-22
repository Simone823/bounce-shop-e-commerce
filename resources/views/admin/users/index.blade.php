@extends('layouts.app')

@section('header')
    @include('components.adminHeader')
@endsection

@section('content')

    {{-- section users_index --}}
    <section id="#section_users_index">

        <div class="container">
            <div class="row gy-5">

                {{-- Title --}}
                <div class="col-12 title text-center">
                    <h1>Lista Utenti</h1>
                </div>
    
                {{-- foreach users --}}
                @foreach ($users as $user )
                    <div class="col-12 col-sm-6 col-md-4">

                        {{-- Card --}}
                        <div class="card h-100">
                            <div class="card-body d-flex flex-column gap-4 justify-content-between">
    
                                {{-- User description --}}
                                <div class="user_description">
                                    <h6 class="card-title mb-3">{{$user->id}}</h6>
                                    <h4 class="card-title mb-3">{{$user->name}} {{$user->surname}}</h4>
                                    <p class="card-text mb-3">Creato il: <span>{{$user->created_at}}</span></p>

                                    {{-- Foreach user role --}}
                                    @foreach ($user->roles as $role)
                                        <p class="card-text mb-0">Ruolo: <span>{{$role->display_name}}</span></p>
                                    @endforeach
                                </div>
    
                                {{-- Btn --}}
                                <div class="buttons d-flex gap-3 flex-wrap">
                                    <a href="{{route('admin.users.show', $user)}}" class="btn btn-primary text-white">Visualizza Utente</a>
                                    <a href="{{route('admin.users.edit', $user)}}" class="btn btn-primary text-white">Modifica ruolo utente</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </section>
    
@endsection