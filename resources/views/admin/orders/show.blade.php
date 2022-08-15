@extends('layouts.app')

@section('metaTitle')
    | Ordine n° {{$order->id}}
@endsection

@section('header')
    @include('components.adminHeader')
@endsection

@section('content')

    {{-- Section order show --}}
    <section id="order_show">
        <div class="container h-100">
            <div class="row justify-content-center align-items-center h-100">

                <div class="col-12 col-sm-6 col-lg-5">
                    {{-- Link pagina lista orders index --}}
                    <div class="mb-4">
                        <a href="{{route('admin.orders.index')}}" class="text-decoration-none link-light">
                            <span>&#x21fd; Torna alla lista ordini</span>
                        </a>
                    </div>

                    {{-- Card --}}
                    <div class="card text-center">
                        <div class="card-body d-flex flex-column justify-content-between gap-3">

                            {{-- order description --}}
                            <div class="description">
                                <h4 class="card-title mb-3 fw-bolder">Ordine n° {{$order->id}}</h4>
                                <p class="card-text fs-5">Creato <span>{{\Carbon\Carbon::create($order->created_at)->diffForHumans()}}</span></p>
                                
                                {{-- user detail --}}
                                <div class="user_wrapper mb-3">
                                    <h4 class="fw-bolder">Utente</h4>
                                    <ul class="detail_user list-unstyled">
                                        <li>
                                            <p class="card-text fs-5 mb-0">
                                                <i class="fa-solid fa-user fs-5"></i>
                                                <span>{{$order->user_name}}</span>
                                            </p>
                                        </li>
                                        <li>
                                            <p class="card-text fs-5 mb-0">
                                                <i class="fa-solid fa-user fs-5"></i>
                                                <span>{{$order->user_surname}}</span>
                                            </p>
                                        </li>
                                        <li>
                                            <p class="card-text fs-5 mb-0">
                                                <i class="fa-solid fa-city fs-6"></i>
                                                <span>{{$order->user_city}}</span>
                                            </p>
                                        </li>
                                        <li>
                                            <p class="card-text fs-5">
                                                <i class="fa-solid fa-map-location-dot fs-6"></i>
                                                <span>{{$order->user_address}}</span>
                                            </p>
                                        </li>
                                    </ul>
                                </div>

                                {{-- list products --}}
                                <div class="products_wrapper mb-3">
                                    <h4 class="fw-bolder">Prodotti</h4>
                                    <ul class="list_products list-unstyled">
                                        @foreach ($order->products as $product)
                                        <li class="mb-1">
                                            <figure class="product_icon">
                                                <img src="{{asset('storage/'.$product->image)}}" alt="">
                                            </figure>
                                            <p class="fs-5 mb-0">{{$product->product_name}} <span>x{{$product->pivot->quantity}}</span></p>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>

                                {{-- status payment badge --}}
                                <div class="card-text d-flex flex-wrap gap-2 justify-content-center">
                                    <p class="card-text fs-5 w-100 mb-0 fw-bolder">Totale: {{$order->total_price}} &euro;</p>
                                    <p class="badge bg-success fs-6 fw-light text-uppercase mb-0 {{$order->status == 1 ? 'opacity-100' : 'opacity-25'}}">Pagato</p>
                                    <p class="badge bg-danger fs-6 fw-light text-uppercase mb-0 {{$order->status == 0 ? 'opacity-100' : 'opacity-25'}}">Non Pagato</p>
                                </div>
                            </div>


                            {{-- edit btn 
                            <div class="edit_btn">
                                <a href="" class="btn btn-primary text-white">Modifica</a>
                            </div> --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    
@endsection