@extends('layouts.app')

@section('metaTitle')
    | Prodotto {{$product->id}}
@endsection

@section('header')
    @include('components.adminHeader')
@endsection

@section('content')
    

    {{-- Section product show --}}
    <section id="product_show">

        <div class="container h-100">
            <div class="row justify-content-center align-items-center h-100">

                <div class="col-12 col-sm-6 col-lg-5">
                    {{-- Link pagina lista utenti --}}
                    <div class="mb-4">
                        <a href="{{route('admin.products.index')}}" class="text-decoration-none link-light">
                            <span>&#x21fd; Torna alla lista prodotti</span>
                        </a>
                    </div>


                    {{-- Card --}}
                    <div class="card text-center">

                        <figure class="wrapper_image shadow">
                            <img src="{{asset('storage/'.$product->image)}}" alt="...">
                        </figure>

                        <div class="card-body d-flex flex-column justify-content-between gap-3">

                            {{-- product description --}}
                            <div class="description">
                                <h4 class="card-title mb-3 fw-bolder">{{$product->product_name}}</h4>
                                <p class="card-text mb-3">{{$product->description}}</p>
                                <p class="card-text mb-3 fs-5">{{$product->price}} &#x20AC;</p>
                                
                                @foreach ($product->categories as $category)
                                    <p class="badge bg-dark fs-6 fw-light">{{$category->category_name}}</p>
                                @endforeach

                                <div class="card-text d-flex flex-wrap gap-2 justify-content-center">
                                    <p class="badge bg-success fs-6 fw-light text-uppercase {{$product->visibility == 1 ? 'opacity-100' : 'opacity-25'}}">Visibile</p>
                                    <p class="badge bg-danger fs-6 fw-light text-uppercase {{$product->visibility == 0 ? 'opacity-100' : 'opacity-25'}}">Non Visibile</p>
                                </div>
                            </div>

                            {{-- Btn --}}
                            <div class="buttons">
                                
                                {{-- buttons --}}
                                <div class="buttons d-flex justify-content-center gap-3 flex-wrap">

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
                                                    <div class="modal-content shadow-lg">
                                                        <div class="modal-header bg-danger border-0 text-white">
                                                            <h5 class="modal-title" id="exampleModalLabel">Conferma elimina prodotto</h5>
                                                            <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body bg-dark border-0 text-white">
                                                            Sei sicuro di voler ELIMINARE questo prodotto? <br>
                                                            Una volta confermata questa azione non si potrà tornare indietro!
                                                        </div>
                                                        <div class="modal-footer justify-content-center bg-dark border-0 text-white">
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
                    </div>


                </div>

            </div>
        </div>
    </section>

@endsection