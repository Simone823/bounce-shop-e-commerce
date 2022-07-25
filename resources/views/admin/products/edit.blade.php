@extends('layouts.app')

@section('header')
    @include('components.adminHeader')
@endsection

@section('content')
    
    {{-- section product edit --}}
    <section id="product_edit">

        <div class="container">
            <div class="row justify-content-center">

                <div class="col-12 col-sm-8">
                    {{-- Link pagina lista utenti --}}
                    <div class="mb-4">
                        <a href="{{route('admin.products.index')}}" class="text-decoration-none">
                            <span>&#x21fd; Torna alla lista prodotti</span>
                        </a>
                    </div>

                    {{-- Card input --}}
                    <div class="card text-center">
                        <figure class="figure">
                            <img src="https://picsum.photos/400/400" class="figure-img img-fluid rounded" alt="...">
                        </figure>

                        <div class="card-body">

                            {{-- Btn --}}
                            <div class="buttons">
                                <form action="{{route('admin.products.update', $product)}}" method="POST">

                                    @csrf
                                    @method('PUT')

                                    {{-- Inputs --}}
                                    <div class="inputs mb-4">

                                        {{-- Product name --}}
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Nome Prodotto" value="{{old('product_name', $product->product_name)}}">
                                            <label for="product_name">Nome Prodotto</label>

                                            @error('product_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Description --}}
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" placeholder="Descrizione" id="description" name="description" style="height: 100px">{{old('description', $product->description)}}</textarea>
                                            <label for="description">Descrizione</label>


                                            @error('description')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        {{-- Price --}}
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="price" name="price" placeholder="Prezzo" value="{{old('price', $product->price)}}">
                                            <label for="price">Prezzo</label>

                                            @error('price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- visibile --}}
                                        <div class="form-group mb-3">
                                            <label for="visibility" class="mb-2 form-label">Visibile</label>
                                            <select class="form-select" id="visibility" name="visibility" aria-label="Default select example">
                                               <option {{$product->visibility == 0 ? 'selected' : old('visibility')}} value="0">No</option>
                                               <option {{$product->visibility == 1 ? 'selected' : old('visibility')}} value="1">Si</option>
                                            </select>

                                            @error('visibility')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Image --}}
                                        <div class="form-group mb-3">
                                            <label for="image" class="col-md-4 col-form-label text-md-right">Immagine</label>
                                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}">

                                            @error('image')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>


                                    {{-- update btn --}}
                                    <div class="update_btn">
                                        <button type="button" class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Salva modifica
                                        </button>

                                        <!-- Modal confirm update user role-->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Conferma modifica prodotto</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Sei sicuro di voler MODIFICARE questo prodotto?<br>
                                                        Il prodotto potrà essere sempre modificabile
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