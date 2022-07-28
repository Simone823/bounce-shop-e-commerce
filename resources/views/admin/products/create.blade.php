@extends('layouts.app')

@section('metaTitle', '| Crea Prodotto')

@section('header')
    @include('components.adminHeader')
@endsection

@section('content')

    {{-- section product create --}}
    <section id="product_create">

        <div class="container">
            <div class="row justify-content-center gy-5">

                {{-- Title --}}
                <div class="col-12 title text-center text-white">
                    <h1 class="mb-0">Aggiungi Prodotto</h1>
                </div>

                <div class="col-12 col-sm-6 col-lg-5">    

                    {{-- Card input --}}
                    <div class="card text-center">

                        {{-- Box image preview file--}}
                        <div id="image_preview" class="wrapper_image mb-2 shadow">
                            <img id="file_preview" src="{{asset('img/upload_image.png')}}" alt="">
                        </div>

                        <div class="card-body">

                            {{-- Btn --}}
                            <div class="buttons">
                                <form action="{{route('admin.products.store')}}" method="POST" enctype="multipart/form-data">

                                    @csrf

                                    {{-- Inputs --}}
                                    <div class="inputs mb-4">

                                        {{-- Image --}}
                                        <div class="form-group mb-4">
                                            <input accept="image/*" onchange="filePreview(event);" id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{old('image')}}">

                                            @error('image')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Product name --}}
                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control fw-bolder" id="product_name" name="product_name" placeholder="Nome Prodotto" value="{{old('product_name')}}">
                                            <label for="product_name">Nome Prodotto</label>

                                            @error('product_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Description --}}
                                        <div class="form-floating mb-4">
                                            <textarea class="form-control" placeholder="Descrizione" id="description" name="description" style="height: 100px">{{old('description')}}</textarea>
                                            <label for="description">Descrizione</label>


                                            @error('description')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        {{-- Price --}}
                                        <div class="form-floating mb-4">
                                            <input type="number" class="form-control" id="price" name="price" placeholder="Prezzo" value="{{old('price')}}">
                                            <label for="price">Prezzo (XX.XX)</label>

                                            @error('price')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- categories --}}
                                        <div class="form-floating mb-4">
                                            <select class="form-select" id="categories" name="categories" aria-label="Floating label select example">
                                                <option selected disabled>Seleziona una categoria</option>
                                                @foreach ($categories as $category)
                                                <option {{old('categories') ? 'selected' : ''}} value="{{$category->id}}">{{$category->category_name}}</option>
                                                @endforeach
                                            </select>
                                            <label for="floatingSelect">Categoria</label>

                                            @error('categories')
                                                <div class="alert alert-danger">{{$message}}</div>
                                            @enderror
                                        </div>

                                        {{-- visibile --}}
                                        <div class="form-group d-flex flex-wrap justify-content-center gap-2 mb-4">
                                            <input type="radio" name="visibility" id="visibility-1" value="1" {{old('visibility') ? 'checked' : ''}}>
                                            <input type="radio" name="visibility" id="visibility-2" value="0" {{old('visibility') ? 'checked' : ''}}>
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

    {{-- Script javascript --}}
    <script type="text/javascript">

        // function show file preview input image
        function filePreview(event) {

            if(event.target.files.length > 0) {

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