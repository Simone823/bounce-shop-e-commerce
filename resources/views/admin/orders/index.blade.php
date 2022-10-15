@extends('layouts.app')

@section('metaTitle', '| Lista Ordini')

@section('header')
    @include('components.adminHeader')
@endsection

@section('content')

    {{-- section orders index --}}
    <section id="orders_index">
        <div class="container">

            {{-- row 1 --}}
            <div class="row mb-5">
                {{-- Title --}}
                <div class="col-12 title text-center text-white">
                    <h1 class="mb-0">Lista Ordini</h1>
                </div>
            </div>

            {{-- row 2 --}}
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-dark table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Azioni</th>
                                    <th>@sortablelink('id', 'id')</th>
                                    <th>@sortablelink('user_name', 'Nome')</th>
                                    <th>@sortablelink('user_surname', 'Cognome')</th>
                                    <th>@sortablelink('user_city', 'Città')</th>
                                    <th>@sortablelink('user_address', 'Indirizzo')</th>
                                    <th>@sortablelink('user_id', 'ID Utente')</th>
                                    <th>@sortablelink('total_price', 'Totale prezzo')</th>
                                    <th>@sortablelink('status', 'Stato pagamento')</th>
                                    <th>@sortablelink('created_at', 'Creato il')</th>
                                    <th>@sortablelink('updated_at', 'Modificato il')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($orders->count())
                                @foreach($orders as $key => $order)
                                <tr>
                                    <td>
                                        <a href="{{route('admin.orders.show', $order->id)}}" class="btn btn-secondary mb-2" data-bs-toggle="tooltip" data-bs-placement="right" title="Visualizza">
                                            <i class="fas fa-search"></i>
                                        </a>
                                    </td>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->user_name }}</td>
                                    <td>{{ $order->user_surname }}</td>
                                    <td>{{ $order->user_city }}</td>
                                    <td>{{ $order->user_address }}</td>
                                    <td>{{ $order->user_id }}</td>
                                    <td style="text-align: right;">{{ $order->total_price }} &euro;</td>
                                    <td style="text-align: center;">
                                        @if ($order->status == 1)
                                            <p class="badge bg-success fs-6 fw-light text-uppercase {{$order->status == 1 ? 'opacity-100' : 'opacity-25'}}">Pagato</p>
                                            @else
                                                <p class="badge bg-danger fs-6 fw-light text-uppercase {{$order->status == 0 ? 'opacity-100' : 'opacity-25'}}">Non Pagato</p>
                                        @endif
                                    </td>

                                    <td>{{ $order->created_at->format('d-m-Y') }}</td>
                                    <td>{{ $order->updated_at->format('d-m-Y') }}</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                    {{-- Links paginate --}}
                    <div class="link_paginate col-12 d-flex justify-content-center mt-4">
                        {!! $orders->appends(\Request::except('page'))->render() !!}
                    </div>
                </div>
            </div>

        </div>
    </section>
    
@endsection