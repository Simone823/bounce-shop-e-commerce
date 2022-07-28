@extends('layouts.app')

@section('metaTitle')
    | Modifica Prodotto {{$product->id}}
@endsection

@section('header')
    @include('components.adminHeader')
@endsection

@section('content')
    
    {{-- section product edit --}}
    <section id="product_edit">

        <div class="container">
            <div class="row justify-content-center">

                <div class="col-12 col-sm-6 col-lg-5">
                    {{-- Link pagina lista utenti --}}
                    <div class="mb-4">
                        <a href="{{route('admin.products.index')}}" class="text-decoration-none link-light">
                            <span>&#x21fd; Torna alla lista prodotti</span>
                        </a>
                    </div>

                    {{-- Card input --}}
                    <div class="card text-center">

                        {{-- Box image preview --}}
                        <div class="image_preview wrapper_image mb-2 shadow">
                            <img id="file_preview" src="{{asset('storage/'.$product->image)}}" alt="">
                        </div>

                        <div class="card-body">

                            {{-- Btn --}}
                            <div class="buttons">
                                <form action="{{route('admin.products.update', $product->id)}}" method="POST" enctype="multipart/form-data">

                                    @csrf
                                    @method('PUT')

                                    {{-- Inputs --}}
                                    <div class="inputs mb-4">

                                        {{-- Image --}}
                                        <div class="form-group mb-4">
                                            <input onchange="filePreview(event)" id="image" type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}">

                                            @error('image')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Product name --}}
                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control fw-bolder" id="product_name" name="product_name" placeholder="Nome Prodotto" value="{{old('product_name', $product->product_name)}}">
                                            <label for="product_name">Nome Prodotto</label>

                                            @error('product_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Description --}}
                                        <div class="form-floating mb-4">
                                            <textarea class="form-control" placeholder="Descrizione" id="description" name="description" style="height: 100px">{{old('description', $product->description)}}</textarea>
                                            <label for="description">Descrizione</label>


                                            @error('description')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        {{-- Price --}}
                                        <div class="form-floating mb-4">
                                            <input type="number" class="form-control" id="price" name="price" placeholder="Prezzo" value="{{old('price', $product->price)}}">
                                            <label for="price">Prezzo (XX.XX)</label>

                                            @error('price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- categories --}}
                                        <div class="form-floating mb-4">
                                            <select class="form-select" id="categories" name="categories" aria-label="Floating label select example">
                                                <option disabled>Seleziona una categoria</option>
                                                @foreach ($categories as $category)
                                                    <option {{old('categories', $product->categories->contains($category)) ? 'selected' : ''}} value="{{$category->id}}">{{$category->category_name}}</option>
                                                @endforeach
                                            </select>
                                            <label for="floatingSelect">Categoria</label>

                                            @error('categories')
                                                <div class="alert alert-danger">{{$message}}</div>
                                            @enderror
                                        </div>

                                        {{-- visibile --}}
                                        <div class="form-group d-flex flex-wrap justify-content-center gap-2">
                                            <input type="radio" name="visibility" id="visibility-1" value="1" {{old('visibility', $product->visibility == 1) ? 'checked' : ''}}>
                                            <input type="radio" name="visibility" id="visibility-2" value="0" {{old('visibility', $product->visibility == 0) ? 'checked' : ''}}>
                                            <label for="visibility-1" class="option bg-success visibility-1">
                                                <span class="text-uppercase text-white">Visibile</span>
                                            </label>
                                            <label for="visibility-2" class="option bg-danger visibility-2">
                                                <span class="text-uppercase text-white">Non Visibile</span>
                                            </label>

                                            @error('visibility')
                                                <div class="col-12 alert alert-danger">{{ $message }}</div>
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
                                                <div class="modal-content shadow-lg">
                                                    <div class="modal-header bg-warning border-0">
                                                        <h5 class="modal-title" id="exampleModalLabel">Conferma modifica prodotto</h5>
                                                        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body bg-dark border-0 text-white">
                                                        Sei sicuro di voler MODIFICARE questo prodotto?<br>
                                                        Il prodotto è sempre modificabile
                                                    </div>
                                                    <div class="modal-footer justify-content-center bg-dark border-0">
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

    {{-- Script javascript --}}
    <script type="text/javascript">
        // function show file preview input image
        function filePreview(event) {

            if (event.target.files.length > 0) {

                // src create file preview
                let src = URL.createObjectURL(event.target.files[0]);

                // Preview tag img
                const preview = document.getElementById("file_preview");

                // tag img src
                preview.src = src;
            }
        }
    </script>


@endsection