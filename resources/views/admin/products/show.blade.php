@extends('layouts.app')

@section('header')
    @include('components.adminHeader')
@endsection

@section('content')
    

    {{-- Section product show --}}
    <section id="product_show">

        <div class="container">
            <div class="row justify-content-center">

                <div class="col-12 col-sm-8">

                    {{-- Link pagina lista utenti --}}
                    <div class="mb-4">
                        <a href="{{route('admin.products.index')}}" class="text-decoration-none">
                            <span>&#x21fd; Torna alla lista prodotti</span>
                        </a>
                    </div>

                    {{-- Card --}}
                    <div class="card text-center">
                        <figure class="figure">
                            <img src="https://picsum.photos/400/400" class="figure-img img-fluid rounded" alt="...">
                        </figure>


                        <div class="card-body">

                            {{-- product description --}}
                            <div class="user_description mb-4">
                                <h4 class="card-title mb-3">{{$product->product_name}}</h4>
                                <p class="card-text mb-3">{{$product->description}}</p>
                                <p class="card-text mb-3">{{$product->price}}€</p>
                                <p class="card-text mb-3">Visibile: <span>{{$product->visibility == 1 ? 'Si' : 'No'}}</span></p>
                                @foreach ($product->categories as $category)
                                    <p class="card-text">Categoria: {{$category->category_name}}</p>
                                @endforeach
                            </div>

                            {{-- Btn --}}
                            <div class="buttons">
                                
                                {{-- buttons --}}
                                <div class="buttons d-flex justify-content-center gap-4 flex-wrap">

                                    {{-- edit btn  --}}
                                    <div class="edit_btn">
                                        <a href="{{route('admin.products.edit', $product->id)}}" class="btn btn-primary text-white">Modifica</a>
                                    </div>


                                    {{-- delete btn --}}
                                    <div class="delete_btn">
                                        
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
                    </div>


                </div>

            </div>
        </div>
    </section>

@endsection