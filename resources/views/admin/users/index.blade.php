@extends('layouts.app')

@section('metaTitle', '| Lista Utenti')

@section('header')
    @include('components.adminHeader')
@endsection

@section('content')

    {{-- section users_index --}}
    <section id="users_index">
        <div class="container">

            {{-- row 1 --}}
            <div class="row mb-5">
                {{-- Title --}}
                <div class="col-12 title text-center text-white">
                    <h1 class="mb-0">Lista Utenti</h1>
                </div>
            </div>

            {{-- row 2 --}}
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-dark table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Azioni</th>
                                    <th>@sortablelink('id', 'id')</th>
                                    <th>@sortablelink('name', 'Nome')</th>
                                    <th>@sortablelink('surname', 'Cognome')</th>
                                    <th>@sortablelink('email', 'E-Mail')</th>
                                    <th>@sortablelink('city', 'Città')</th>
                                    <th>@sortablelink('address', 'Indirizzo')</th>
                                    <th>@sortablelink('roles', 'Ruolo')</th>
                                    <th>@sortablelink('created_at', 'Creato il')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($users->count())
                                    @foreach($users as $key => $user)
                                    <tr>
                                        <td data-label="Azioni">
                                            <a href="{{route('admin.users.show', $user->id)}}" class="btn btn-secondary mb-2" data-bs-toggle="tooltip" data-bs-placement="right" title="Visualizza">
                                                <i class="fas fa-search"></i>
                                            </a>
                                            <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-warning mb-2" data-bs-toggle="tooltip" data-bs-placement="right" title="Modifica Ruolo">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{route('admin.users.destroy', $user->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                {{-- delete btn --}}
                                                <button type="button" class="btn btn-danger text-white mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <i class="far fa-trash-alt"></i>
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
                                            </form>
                                        </td>
                                        <td data-label="id">{{ $user->id }}</td>
                                        <td data-label="name">{{ $user->name }}</td>
                                        <td data-label="surname">{{ $user->surname }}</td>
                                        <td data-label="email">{{ $user->email }}</td>
                                        <td data-label="city">{{ $user->city }}</td>
                                        <td data-label="address">{{ $user->address }}</td>
                                        {{-- Foreach user role --}}
                                        @foreach ($user->roles as $role)
                                            <td data-label="role">{{ $role->display_name }}</td>
                                        @endforeach
                                        <td data-label="created_at">{{ $user->created_at->format('d-m-Y') }}</td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                    {{-- Links paginate --}}
                    <div class="link_paginate col-12 d-flex justify-content-center mt-4">
                        {!! $users->appends(\Request::except('page'))->render() !!}
                    </div>
                </div>
            </div>

        </div>
    </section>
    
@endsection