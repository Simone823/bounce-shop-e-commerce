@extends('layouts.app')

@section('metaTitle', '| Pagamento Effettuato')

@section('header')
    @include('components.guestHeader')
@endsection

@section('content')

    <!-- section payment success -->
    <section id="payment-success" class="text-white">
        <div class="container h-100">
            <div class="row h-100 align-items-center">

                <div class="col-mb-4">
                    <!-- wrapper -->
                    <div class="wrapper bg-dark p-5 text-center">
                        <figure class="icon mb-4">
                            <img src="{{asset('images/success_icon.svg')}}" alt="">
                        </figure>
                        <h2 class="text-uppercase mb-3">Pagamento effettuato con successo!</h2>
                        <p class="mb-4 fs-5">
                            Grazie per aver acquistato i nostri prodotti<br>
                            Il tuo ordine verrà spedito entro 24h, <br>
                            Per informazioni o assistenza su ordini vai alla pagina
                            <a href="/contact" class="">Contatti</a>
                        </p>
                        <a href="/" class="btn btn-primary text-white">Torna alla Homepage</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <style>
        .icon {
            max-width: 250px;
            aspect-ratio: 1/1;
            margin: 0 auto;
        }

        .icon > img {
            max-width: 100%;
            height: 100%;
            display: block;
        }
    </style>

@endsection