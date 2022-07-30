@extends('layouts.app')

@section('metaTitle', '| Lista Ordini')

@section('header')
    @include('components.adminHeader')
@endsection

@section('content')

    {{-- section orders index --}}
    <section id="orders_index">

        <div class="container h-100">
            <div class="row h-100 align-items-center">


                {{-- If orders lenght 0 --}}
                @if(count($orders) < 1)
                    <div class="no_orders text-center text-white">
                        <h1>Al momento non ci sono ordini</h1>
                    </div>
                @endif

            </div>
        </div>

    </section>
    
@endsection