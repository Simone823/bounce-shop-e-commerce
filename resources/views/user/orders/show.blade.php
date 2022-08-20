@extends('layouts.app')

@if ($order->user_id == Auth::user()->id)

    @section('metaTitle')
        | Ordine n° {{$order->id}}
    @endsection

    @else

        @section('metaTitle')
            | 403
        @endsection
@endif

@section('header')
    @include('components.userHeader')
@endsection

@section('content')
    
    @if ($order->user_id == Auth::user()->id)

        {{-- section user order show --}}
        <section id="user_order_show">
            <div class="container">
                <div class="row">



                </div>
            </div>
        </section>

        @else
        
            {{-- section page 403 access denied --}}
            <section id="page_403">
                <div class="container h-100">
                    <div class="row h-100 align-items-center justify-content-center">

                        <div class="col-12 text-center text-white">
                            {{-- danger icon --}}
                            <figure class="danger_icon mx-auto">
                                <img src="{{asset('img/danger_icon.svg')}}" alt="">
                            </figure>
                            <h2 class="mb-1 fw-bold">403</h2>
                            <h4 class="mb-0 fw-bolder">Accesso Negato!</h4>
                        </div>

                    </div>
                </div>
            </section>
    @endif

@endsection