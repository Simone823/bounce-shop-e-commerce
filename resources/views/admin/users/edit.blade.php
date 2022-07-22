@extends('layouts.app')

@section('header')
    @include('components.adminHeader')
@endsection

@section('content')
    
    {{-- Section user_edit --}}
    <section id="user_edit">

        <div class="container">
            <div class="row justify-content-center">

                <div class="col-12 col-sm-8">

                    {{-- Link pagina lista utenti --}}
                    <div class="mb-4">
                        <a href="{{route('admin.users.index')}}" class="text-decoration-none">
                            <span>&#x21fd; Torna alla lista utenti</span>
                        </a>
                    </div>

                    {{-- Card input --}}
                    <div class="card text-center">
                        <div class="card-body">

                            {{-- User description --}}
                            <div class="user_description mb-4">
                                <h4 class="card-title mb-3">{{$user->name}} {{$user->surname}}</h4>
                                <p class="card-text mb-3">Email: <span>{{$user->email}}</span></p>
                                <p class="card-text mb-3">Città: <span>{{$user->city}}</span></p>
                                <p class="card-text mb-3">Indirizzo: <span>{{$user->address}}</span></p>
                                <p class="card-text mb-3">Creato il: <span>{{$user->created_at}}</span></p>
                            </div>

                            {{-- Btn --}}
                            <div class="buttons">
                                <form action="{{route('admin.users.update', $user)}}" method="POST">

                                    @csrf
                                    @method('PUT')

                                    {{-- Select role user --}}
                                    <div class="role_select mb-4">
                                        <label class="mb-2" for="roles">Ruolo</label>
                                        <select name="roles" id="roles" class="form-select w-25 mx-auto" aria-label="Default select example">
                                            @foreach ($roles as $role)
                                                <option {{$user->roles->contains($role) ? 'selected' : ''}} value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- update btn --}}
                                    <div class="delete_btn">
                                        <button type="button" class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Salva modifica
                                        </button>

                                        <!-- Modal confirm update user role-->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Conferma modifica ruolo utente</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Sei sicuro di voler MODIFICARE il ruolo a questo utente? <br>
                                                        Il ruolo potrà essere sempre modificabile
                                                    </div>
                                                    <div class="modal-footer justify-content-center">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                                                        <button type="submit" class="btn btn-primary text-white">Conferma</button>
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