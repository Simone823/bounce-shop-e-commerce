@extends('layouts.app')

@section('header')
    @include('components.adminHeader')
@endsection

@section('content')

    {{-- section products index --}}
    <section id="products_index">

        <div class="container">
            <div class="row gy-5">

                {{-- Title --}}
                <div class="col-12 title text-center">
                    <h1>Lista Prodotti</h1>
                </div>

                {{-- foreach products --}}
                @foreach ($products as $product)

                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="card h-100">
                            <img src="https://picsum.photos/400/400" class="card-img-top" alt="...">

                            <div class="card-body d-flex flex-column justify-content-between gap-3">
                                
                                {{-- Description --}}
                                <div class="description">
                                    <h5 class="card-title">{{$product->product_name}}</h5>
                                    <p class="card-text">{{$product->description}}</p>
                                    <p class="card-text">{{$product->price}}€</p>
                                    <p class="card-text">Visibile: {{$product->visibility == 1 ? 'Si' : 'No'}}</p>
                                    @foreach ($product->categories as $category)
                                        <p class="card-text">Categoria: {{$category->category_name}}</p>
                                    @endforeach
                                </div>

                                {{-- Btn --}}
                                <div class="buttons d-flex flex-wrap justify-content-center gap-3">
                                    <a href="{{route('admin.products.show', $product->id)}}" class="btn btn-primary text-white">Visualizza</a>
                                    <a href="{{route('admin.products.edit', $product->id)}}" class="btn btn-primary text-white">Modifica</a>
                                    <form action="{{route('admin.products.destroy', $product->id)}}" method="POST">

                                        @csrf
                                        @method('DELETE')


                                        <button type="button" class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Elimina
                                        </button>

                                        <!-- Modal confirm delete product-->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Conferma elimina prodotto</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Sei sicuro di voler ELIMINARE questo prodotto? <br>
                                                        Una volta confermata questa azione non si potrà tornare indietro!
                                                    </div>
                                                    <div class="modal-footer justify-content-center">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
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

                {{-- Link paginate --}}
                <div class="link_paginate col-12 d-flex justify-content-center">
                    {{$products->links()}}
                </div>

            </div>
        </div>

    </section>

@endsection