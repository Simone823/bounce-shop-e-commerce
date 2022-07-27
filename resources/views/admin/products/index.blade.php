@extends('layouts.app')

@section('metaTitle', '| Lista Prodotti')

@section('header')
    @include('components.adminHeader')
@endsection

@section('content')

    {{-- section products index --}}
    <section id="products_index">

        <div class="container">
            <div class="row gy-5">

                {{-- Title --}}
                <div class="col-12 title text-center text-white">
                    <h1 class="mb-0">Lista Prodotti</h1>
                </div>

                {{-- foreach products --}}
                @foreach ($products as $product)

                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="card h-100">

                            <figure class="wrapper_image shadow">
                                <img src="{{asset('storage/'.$product->image)}}" alt="">
                            </figure>

                            <div class="card-body d-flex flex-column justify-content-between gap-3">
                                
                                {{-- Description --}}
                                <div class="description">
                                    <h5 class="card-title fw-bolder">{{$product->product_name}}</h5>
                                    <p class="card-text">{{$product->description}}</p>
                                    <p class="card-text fs-5">{{$product->price}} &#x20AC;</p>

                                    @foreach ($product->categories as $category)
                                        <p class="badge bg-dark fs-6 fw-light">{{$category->category_name}}</p>
                                    @endforeach

                                    <div class="card-text d-flex flex-wrap gap-2">
                                        <p class="badge bg-success fs-6 fw-light text-uppercase {{$product->visibility == 1 ? 'opacity-100' : 'opacity-25'}}">Visibile</p>
                                        <p class="badge bg-danger fs-6 fw-light text-uppercase {{$product->visibility == 0 ? 'opacity-100' : 'opacity-25'}}">Non Visibile</p>
                                    </div>
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
                                                <div class="modal-content shadow-lg">
                                                    <div class="modal-header bg-danger text-white border-0">
                                                        <h5 class="modal-title" id="exampleModalLabel">Conferma elimina prodotto</h5>
                                                        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body bg-dark border-0 text-white">
                                                        Sei sicuro di voler ELIMINARE questo prodotto? <br>
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

                {{-- Link paginate --}}
                <div class="link_paginate col-12 d-flex justify-content-center">
                    {{$products->links()}}
                </div>

            </div>
        </div>

    </section>

@endsection