@extends('layouts.app')

@section('metaTitle', '| Lista Ordini')

@section('header')
    @include('components.userHeader')
@endsection

@section('content')

    {{-- section orders index --}}
    <section id="user_orders_index">
        <div class="container">
            <div class="row justify-content-center gy-5 gx-sm-5 gx-lg-5">

                {{-- If orders lenght 0 --}}
                @if(count($orders) < 1) 
                    <div class="no_orders text-center text-white">
                        <h1>Al momento non ci sono ordini</h1>
                    </div>

                    @else
                    {{-- Title --}}
                    <div class="col-12 title text-center text-white">
                        <h1 class="text-white text-uppercase mb-0 fw-bold">I miei Ordini</h1>
                    </div>

                    @foreach ($orders as $order)
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="card h-100 bg-dark text-white">
                                <div class="card-body d-flex flex-column justify-content-between gap-3">

                                    {{-- Description --}}
                                    <div class="description">
                                        <h5 class="card-title fw-bolder">Ordine n° {{$order->id}}</h5>
                                        <p class="card-text fs-5">Creato <span>{{\Carbon\Carbon::create($order->created_at)->diffForHumans()}}</span></p>
                                        <p class="card-text fs-5">{{$order->user_name}} {{$order->user_surname}}</p>
                                        <p class="card-text fs-5">{{$order->total_price}} &euro;</p>

                                        <div class="card-text d-flex flex-wrap gap-2">
                                            <p class="badge bg-success fs-6 fw-light text-uppercase {{$order->status == 1 ? 'opacity-100' : 'opacity-25'}}">Pagato</p>
                                            <p class="badge bg-danger fs-6 fw-light text-uppercase {{$order->status == 0 ? 'opacity-100' : 'opacity-25'}}">Non Pagato</p>
                                        </div>
                                    </div>

                                    {{-- Btn --}}
                                    <div class="buttons d-flex flex-wrap justify-content-center gap-3">
                                        <a href="{{route('user.orders.show', $order->id)}}" class="btn btn-primary text-white w-100">Visualizza</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach

                    {{-- Link paginate --}}
                    <div class="link_paginate col-12 d-flex justify-content-center">
                        {{$orders->links()}}
                    </div>
                @endif

            </div>
        </div>

    </section>
    
@endsection