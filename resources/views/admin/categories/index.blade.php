@extends('layouts.app')

@section('metaTitle', '| Lista Categorie')

@section('header')
    @include('components.adminHeader')
@endsection

@section('content')

    {{-- section categories index --}}
    <section id="categories_index">

        <div class="container">
            <div class="row gy-5 gx-5">

                {{-- Title --}}
                <div class="col-12 title text-center text-white">
                    <h1 class="mb-0">Lista Categorie</h1>
                </div>

                {{-- foreach categories --}}
                @foreach($categories as $key => $category)
                    
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bolder">{{$category->category_name}}</h5>
                                <p class="card-text"> Creato {{\Carbon\Carbon::create($category->created_at)->diffForHumans()}}</p>

                                {{-- Btn --}}
                                <div class="buttons d-flex flex-wrap justify-content-center gap-3">
                                    <a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-primary text-white">Modifica</a>
                                    <form action="{{route('admin.categories.destroy', $category->id)}}" method="POST">

                                        @csrf
                                        @method('DELETE')


                                        <button type="button" class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Elimina
                                        </button>

                                        <!-- Modal confirm delete product-->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content shadow-lg">
                                                    <div class="modal-header bg-danger border-0">
                                                        <h5 class="modal-title text-white" id="exampleModalLabel">Conferma elimina categoria</h5>
                                                        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body bg-dark border-0 text-white">
                                                        Sei sicuro di voler ELIMINARE questa categoria? <br>
                                                        Una volta confermata questa azione non si potrà tornare indietro!
                                                    </div>
                                                    <div class="modal-footer bg-dark border-0 justify-content-center">
                                                        <button type="button" class="btn btn-primary text-white" data-bs-dismiss="modal">Chiudi</button>
                                                        <button type="submit" class="btn btn-primary text-white">Conferma</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- Links paginate --}}
                <div class="link_paginate col-12 d-flex justify-content-center">
                    {{$categories->links()}}
                </div>

            </div>
        </div>

    </section>
    
@endsection