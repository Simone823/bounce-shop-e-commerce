@extends('layouts.app')

@section('metaTitle', '| Lista Categorie')

@section('header')
    @include('components.adminHeader')
@endsection

@section('content')

    {{-- section categories index --}}
    <section id="categories_index">
        <div class="container">

            {{-- row 1 --}}
            <div class="row mb-5">
                {{-- Title --}}
                <div class="col-12 title text-center text-white">
                    <h1 class="mb-0">Lista Categorie</h1>
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
                                    <th>@sortablelink('category_name', 'Nome')</th>
                                    <th>@sortablelink('created_at', 'Creato il')</th>
                                    <th>@sortablelink('updated_at', 'Modificato il')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($categories->count())
                                @foreach($categories as $key => $category)
                                <tr>
                                    <td>
                                        <div class="wrapper">
                                            <a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-warning mb-2" data-bs-toggle="tooltip" data-bs-placement="right" title="Modifica">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{route('admin.categories.destroy', $category->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                {{-- delete btn --}}
                                                <button type="button" class="btn btn-danger text-white mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->created_at->format('d-m-Y') }}</td>
                                    <td>{{ $category->updated_at->format('d-m-Y') }}</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                    {{-- Links paginate --}}
                    <div class="link_paginate col-12 d-flex justify-content-center mt-4">
                        {!! $categories->appends(\Request::except('page'))->render() !!}
                    </div>
                </div>

                <!-- Modal confirm delete category-->
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
    </section>
    
@endsection