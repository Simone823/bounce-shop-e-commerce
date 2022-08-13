@extends('layouts.app')

@section('metaTitle', '| Carta di Credito')

@section('header')
    @include('components.guestHeader')
@endsection

@section('content')
    @php
        $stripe_key = env('STRIPE_PUBLIC_KEY');
    @endphp

    {{-- section credit card --}}
    <section id="credit-card">
        <div class="container">
            <div class="row justify-content-center pt-3">

                <div class="col-md-6">
                    
                    {{-- icons stripe payment --}}
                    <div class="payment-powered">
                        {{-- figure stripe --}}
                        <figure class="icon_stripe mb-3">
                            <img src="{{asset('img/stripe_icon.svg')}}" alt="">
                        </figure>

                        {{-- list card --}}
                        <ul class="list_methods text-white list-unstyled d-flex flex-wrap gap-3 justify-content-center">
                            <li>
                                <i class="fab fa-cc-visa fs-1"></i>
                            </li>
                            <li>
                                <i class="fab fa-cc-mastercard fs-1"></i>
                            </li>
                            <li>
                                <i class="fab fa-cc-amex fs-1"></i>
                            </li>
                            <li>
                                <i class="fab fa-cc-discover fs-1"></i>
                            </li>
                            <li>
                                <i class="fab fa-cc-diners-club fs-1"></i>
                            </li>
                            <li>
                                <i class="fab fa-cc-jcb fs-1"></i>
                            </li>
                        </ul>
                    </div>

                    {{-- Total cart shop --}}
                    <div class="total">
                        <p class="text-primary fw-bold fs-4 text-uppercase">Totale ordine da pagare: {{$order->total_price}} &euro;</p>
                    </div>

                    {{-- form credit card --}}
                    <div class="card bg-dark text-white py-3">
                        <form action="{{route('make.payment')}}" method="post" id="payment-form">
                            @csrf
                            <div class="form-group">
                                <div class="card-header text-center">
                                    <label for="card-element fs-5">
                                        Estremi carta di credito
                                    </label>
                                </div>
                                <div class="card-body border-0">
                                    <div id="card-element">
                                        <!-- A Stripe Element will be inserted here. -->
                                    </div>
                                    <!-- Used to display form errors. -->
                                    <div id="card-errors" role="alert"></div>
                                    <input type="hidden" name="plan" value="" />
                                </div>
                            </div>
                            <div class="card-footer border-0">
                                <button id="card-button" class="btn btn-primary text-white w-100" type="submit" data-secret="{{$intent}}">Paga {{$order->total_price}} &euro;</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>

    <script>
        var style = {
            base: {
                color: 'white'
                , lineHeight: '18px'
                , fontSmoothing: 'antialiased'
                , fontSize: '18px'
                , '::placeholder': {
                    color: 'white'

                }
            }
            , invalid: {
                color: '#f80000'
                , iconColor: '#f80000'

            }
        };

        const stripe = Stripe('{{ $stripe_key }}', {
            locale: 'it'
        }); // Create a Stripe client.
        const elements = stripe.elements(); // Create an instance of Elements.
        const cardElement = elements.create('card', {
            style: style
        }); // Create an instance of the card Element.
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;

        cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.

        // Handle real-time validation errors from the card Element.
        cardElement.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.handleCardPayment(clientSecret, cardElement, {
                payment_method_data: {
                    //billing_details: { name: cardHolderName.value }
                }
            })
            .then(function(result) {
                // console.log(result);
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // console.log(result);
                    form.submit();
                }
            });
        });

    </script>

    <style>
        label {
            font-size: 20px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 1rem 3rem rgba(255, 255, 255, 0.175) inset;
        }

        .payment-powered {
            margin-bottom: 75px;
        }

        .icon_stripe {
            width: 200px;
            margin: 0 auto;
        }

        .icon_stripe > img {
            width: 100%;
            height: 100%;
            display: block;
        }
    </style>

@endsection