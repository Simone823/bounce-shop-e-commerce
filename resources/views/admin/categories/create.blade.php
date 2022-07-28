@extends('layouts.app')

@section('metaTitle', '| Crea Categoria')

@section('header')
    @include('components.adminHeader')
@endsection

@section('content')

    {{-- section category create --}}
    <section id="category_create">

        <div class="container">
            <div class="row justify-content-center gy-5">

                {{-- Title --}}
                <div class="col-12 title text-center text-white">
                    <h1 class="mb-0">Aggiungi Categoria</h1>
                </div>

                <div class="col-12 col-sm-8">

                    {{-- Card input --}}
                    <div class="card text-center">

                        <div class="card-body">

                            {{-- Btn --}}
                            <div class="buttons">
                                <form action="{{route('admin.categories.store')}}" method="POST">

                                    @csrf

                                    {{-- Inputs --}}
                                    <div class="inputs mb-4">

                                        {{-- Category name --}}
                                        <div class="form-floating mb-3 w-75 mx-auto">
                                            <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Nome Categoria" value="{{old('category_name')}}">
                                            <label for="category_name">Nome Categoria</label>

                                            @error('category_name')
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