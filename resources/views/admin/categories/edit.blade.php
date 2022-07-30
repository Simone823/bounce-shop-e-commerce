@extends('layouts.app')

@section('metaTitle')
    | Modifica Categoria {{$category->id}}
@endsection

@section('header')
    @include('components.adminHeader')
@endsection

@section('content')

    {{-- section category edit --}}
    <section id="category_edit">
        
        <div class="container h-100">
            <div class="row justify-content-center align-items-center h-100">

                <div class="col-12 col-sm-8">

                    {{-- Link pagina lista categorie --}}
                    <div class="mb-4">
                        <a href="{{route('admin.categories.index')}}" class="text-decoration-none link-light">
                            <span>&#x21fd; Torna alla lista categorie</span>
                        </a>
                    </div>

                    {{-- Card input --}}
                    <div class="card text-center">
                        <div class="card-body">

                            {{-- Btn --}}
                            <div class="buttons">
                                <form action="{{route('admin.categories.update', $category->id)}}" method="POST">

                                    @csrf
                                    @method('PUT')

                                    {{-- Inputs --}}
                                    <div class="inputs mb-4">

                                        {{-- Category name --}}
                                        <div class="form-floating mb-3 w-75 mx-auto">
                                            <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Nome Categoria" value="{{old('category_name', $category->category_name)}}">
                                            <label for="category_name">Nome Categoria</label>

                                            @error('category_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <p class="card-text"> Creato {{\Carbon\Carbon::create($category->created_at)->diffForHumans()}}</p>
                                    </div>

                                    {{-- update btn --}}
                                    <div class="update_btn">
                                        <button type="button" class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Salva modifica
                                        </button>

                                        <!-- Modal confirm update category-->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content shadow-lg">
                                                    <div class="modal-header bg-warning border-0">
                                                        <h5 class="modal-title" id="exampleModalLabel">Conferma modifica categoria</h5>
                                                        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body bg-dark border-0 text-white">
                                                        Sei sicuro di voler MODIFICARE questa categoria?<br>
                                                        La categoria potrà essere sempre modificabile
                                                    </div>
                                                    <div class="modal-footer justify-content-center bg-dark border-0 text-white">
                                                        <button type="button" class="btn btn-primary text-white" data-bs-dismiss="modal">Chiudi</button>
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