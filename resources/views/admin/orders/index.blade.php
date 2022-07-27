@extends('layouts.app')

@section('header')
    @include('components.adminHeader')
@endsection

@section('content')

    {{-- section orders index --}}
    <section id="orders_index">

        <div class="container">
            <div class="row">


                {{-- If orders lenght 0 --}}
                @if(count($orders) < 1)
                    <div class="no_orders text-center">
                        <h1>Al momento non ci sono ordini</h1>
                    </div>
                @endif

            </div>
        </div>

    </section>
    
@endsection