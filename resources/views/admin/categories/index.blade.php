@extends('layouts.app')

@section('header')
    @include('components.adminHeader')
@endsection

@section('content')

    {{-- section categories index --}}
    <section class="categories_index">

        <div class="container">
            <div class="row gy-5">

                {{-- Title --}}
                <div class="col-12 title text-center">
                    <h1>Lista Categorie</h1>
                </div>

                {{-- foreach categories --}}
                @foreach($categories as $key => $category)
                    
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{$category->category_name}}</h5>
                                <p class="card-text"> Creato il {{$category->created_at}}</p>

                                {{-- Btn --}}
                                <div class="buttons d-flex flex-wrap justify-content-center gap-3">
                                    <a href="{{route('admin.categories.edit', $category)}}" class="btn btn-primary text-white">Modifica</a>
                                    <form action="{{route('admin.categories.destroy', $category)}}" method="POST">

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
                                                        <h5 class="modal-title" id="exampleModalLabel">Conferma elimina categoria</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Sei sicuro di voler ELIMINARE questa categoria? <br>
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

            </div>
        </div>

    </section>
    
@endsection