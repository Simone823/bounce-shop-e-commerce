@extends('layouts.app')

@section('header')
    @include('components.adminHeader')
@endsection

@section('content')

    {{-- section product create --}}
    <section id="product_create">

        <div class="container">
            <div class="row justify-content-center">

                <div class="col-12 col-sm-8">
                    {{-- Title --}}
                    <div class="col-12 title text-center mb-4">
                        <h1>Aggiungi Prodotto</h1>
                    </div>

                    {{-- Card input --}}
                    <div class="card text-center">

                        <div class="card-body">

                            {{-- Btn --}}
                            <div class="buttons">
                                <form action="{{route('admin.products.store', $product)}}" method="POST">

                                    @csrf

                                    {{-- Inputs --}}
                                    <div class="inputs mb-4">

                                        {{-- Product name --}}
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Nome Prodotto" value="{{old('product_name')}}">
                                            <label for="product_name">Nome Prodotto</label>

                                            @error('product_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Description --}}
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" placeholder="Descrizione" id="description" name="description" style="height: 100px">{{old('description')}}</textarea>
                                            <label for="description">Descrizione</label>


                                            @error('description')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        {{-- Price --}}
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="price" name="price" placeholder="Prezzo" value="{{old('price')}}">
                                            <label for="price">Prezzo</label>

                                            @error('price')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- visibile --}}
                                        <div class="form-group mb-3">
                                            <label for="visibility" class="mb-2 form-label">Visibile</label>
                                            <select class="form-select" id="visibility" name="visibility" aria-label="Default select example">
                                                <option {{old('visibility') ? 'selected' : ''}} value="0">No</option>
                                                <option {{old('visibility') ? 'selected' : 'selected'}} value="1">Si</option>
                                            </select>

                                            @error('visibility')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Image --}}
                                        <div class="form-group mb-3">
                                            <label for="image" class="col-md-4 col-form-label text-md-right">Immagine</label>
                                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{old('image')}}">

                                            @error('image')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>


                                    {{-- create btn --}}
                                    <div class="create_btn">
                                        <button type="submit" class="btn btn-primary text-white">
                                            Aggiungi
                                        </button>
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