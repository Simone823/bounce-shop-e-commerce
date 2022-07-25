@extends('layouts.app')

@section('header')
    @include('components.adminHeader')
@endsection

@section('content')

    {{-- section category create --}}
    <section id="category_create">

        <div class="container">
            <div class="row justify-content-center">

                <div class="col-12 col-sm-8">

                    {{-- Title --}}
                    <div class="col-12 title text-center mb-4">
                        <h1>Aggiungi Categoria</h1>
                    </div>

                    {{-- Card input --}}
                    <div class="card text-center">

                        <div class="card-body">

                            {{-- Btn --}}
                            <div class="buttons">
                                <form action="{{route('admin.categories.store', $category)}}" method="POST">

                                    @csrf

                                    {{-- Inputs --}}
                                    <div class="inputs mb-4">

                                        {{-- Category name --}}
                                        <div class="form-floating mb-3">
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