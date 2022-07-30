@extends('layouts.app')

@section('metaTitle')
    | Utente {{$user->id}}
@endsection

@section('header')
    @include('components.adminHeader')
@endsection

@section('content')
    
    {{-- Section user show --}}
    <section id="user_show">

        <div class="container h-100">
            <div class="row justify-content-center align-items-center h-100">

                <div class="col-12 col-sm-8">

                    {{-- Link pagina lista utenti --}}
                    <div class="mb-4">
                        <a href="{{route('admin.users.index')}}" class="text-decoration-none link-light">
                            <span>&#x21fd; Torna alla lista utenti</span>
                        </a>
                    </div>

                    {{-- Card --}}
                    <div class="card text-center">
                        <div class="card-body">

                            {{-- User description --}}
                            <div class="user_description mb-4">
                                <h6 class="card-title mb-3">{{$user->id}}</h6>
                                <h4 class="card-title mb-3 fw-bolder">{{$user->name}} {{$user->surname}}</h4>
                                <p class="card-text mb-3">
                                    <i class="fa-solid fa-envelope"></i>
                                    <span>{{$user->email}}</span>
                                </p>
                                <p class="card-text mb-3">
                                    <i class="fa-solid fa-city"></i>
                                    <span>{{$user->city}}</span>
                                </p>
                                <p class="card-text mb-3"> 
                                    <i class="fa-solid fa-location-dot"></i>
                                    <span>{{$user->address}}</span>
                                </p>
                                <p class="card-text mb-3">Registrato {{\Carbon\Carbon::create($user->created_at)->diffForHumans()}}</span></p>

                                {{-- Foreach user role --}}
                                @foreach ($user->roles as $role)
                                    <p class="badge bg-dark fs-6 fw-light">{{$role->display_name}}</p>
                                @endforeach
                            </div>

                            {{-- Btn --}}
                            <div class="buttons">
                                <form action="{{route('admin.users.destroy', $user)}}" method="POST">

                                    @csrf
                                    @method('DELETE')

                                    {{-- buttons --}}
                                    <div class="buttons d-flex justify-content-center gap-4 flex-wrap">

                                        {{-- Modfica ruolo btn --}}
                                        <div class="update_roles">
                                            <a href="{{route('admin.users.edit', $user)}}" class="btn btn-primary text-white">Modifica ruolo</a>
                                        </div>

                                        {{-- delete btn --}}
                                        <div class="delete_btn">
                                            <button type="button" class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                Elimina
                                            </button>

                                            <!-- Modal confirm delete user-->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content shadow-lg">
                                                        <div class="modal-header bg-danger border-0 text-white">
                                                            <h5 class="modal-title" id="exampleModalLabel">Conferma elimina utente</h5>
                                                            <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body bg-dark border-0 text-white">
                                                            Sei sicuro di voler ELIMINARE questo utente? <br>
                                                            Una volta confermata questa azione non si potrà tornare indietro!
                                                        </div>
                                                        <div class="modal-footer justify-content-center bg-dark border-0">
                                                            <button type="button" class="btn btn-primary text-white" data-bs-dismiss="modal">Chiudi</button>
                                                            <button type="submit" class="btn btn-primary text-white">Conferma</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </section>

@endsection