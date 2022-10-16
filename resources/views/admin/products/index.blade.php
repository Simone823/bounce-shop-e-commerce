@extends('layouts.app')

@section('metaTitle', '| Lista Prodotti')

@section('header')
    @include('components.adminHeader')
@endsection

@section('content')

    {{-- section products index --}}
    <section id="products_index">

        <div class="container">

            {{-- row 1 --}}
            <div class="row mb-5">
                {{-- Title --}}
                <div class="col-12 title text-center text-white">
                    <h1 class="mb-0">Lista Prodotti</h1>
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
                                    <th>@sortablelink('product_name', 'Nome')</th>
                                    <th>Foto Prodotto</th>
                                    <th>@sortablelink('description', 'Descrizione')</th>
                                    <th>@sortablelink('price', 'Prezzo')</th>
                                    <th>@sortablelink('categories', 'Categorie')</th>
                                    <th>@sortablelink('visibility', 'Visibilità')</th>
                                    <th>@sortablelink('user_id', 'SuperAdmin ID')</th>
                                    <th>@sortablelink('created_at', 'Creato il')</th>
                                    <th>@sortablelink('update_at', 'Modificato il')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($products->count())
                                @foreach($products as $key => $product)
                                <tr>
                                    <td data-label="Azioni">
                                        <div class="wrapper">
                                            <a href="{{route('admin.products.show', $product->id)}}" class="btn btn-secondary mb-2" data-bs-toggle="tooltip" data-bs-placement="right" title="Visualizza">
                                                <i class="fas fa-search"></i>
                                            </a>
                                            <a href="{{route('admin.products.edit', $product->id)}}" class="btn btn-warning mb-2" data-bs-toggle="tooltip" data-bs-placement="right" title="Modifica Ruolo">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{route('admin.products.destroy', $product->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                {{-- delete btn --}}
                                                <button type="button" class="btn btn-danger text-white mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>

                                                <!-- Modal confirm delete product-->
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

                                        </div>
                                    </td>
                                    <td data-label="id">{{ $product->id }}</td>
                                    <td data-label="product_name">{{ $product->product_name }}</td>
                                    <td data-label="image">
                                        <div class="wrapper">
                                            <a class="btn btn-secondary mb-2" href="{{asset('storage/'.$product->image)}}"><i class="fas fa-search"></i></a>
                                            <a download="{{$product->product_name}}" class="btn btn-secondary mb-2" href="{{asset('storage/'.$product->image)}}"><i class="fas fa-download"></i></a>
                                        </div>
                                    </td>
                                    <td data-label="description">
                                        <div class="wrapper">{{ $product->description}}</div>
                                    </td>
                                    <td data-label="price" style="text-align: right;">{{ $product->price }} &euro;</td>
                                    @foreach ($product->categories as $key => $category)
                                        <td data-label="categories">{{ $category->category_name }}</td>
                                    @endforeach
                                    <td data-label="visibility">
                                        @if ($product->visibility == 1)
                                            <p class="badge bg-success fs-6 fw-light text-uppercase {{$product->visibility == 1 ? 'opacity-100' : 'opacity-25'}}">Visibile</p>
                                            @else
                                                <p class="badge bg-danger fs-6 fw-light text-uppercase {{$product->visibility == 0 ? 'opacity-100' : 'opacity-25'}}">Non Visibile</p>
                                        @endif
                                    </td>
                                    <td data-label="user_id">{{ $product->user_id }}</td>
                                    <td data-label="created_at">{{ $product->created_at->format('d-m-Y') }}</td>
                                    <td data-label="created_at">{{ $product->updated_at->format('d-m-Y') }}</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                    {{-- Links paginate --}}
                    <div class="link_paginate col-12 d-flex justify-content-center mt-4">
                        {!! $products->appends(\Request::except('page'))->render() !!}
                    </div>
                </div>
            </div>

        </div>

    </section>

@endsection