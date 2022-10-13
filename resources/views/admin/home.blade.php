@extends('layouts.app')

@section('metaTitle', '| Admin Dashboard')

@section('header')
    @include('components.adminHeader')
@endsection

@section('content')

    {{-- section  admin home dashboard --}}
    <section id="admin_home">
        <div class="container">

            {{-- row 1 user chart --}}
            <div class="row">
                {{-- user chart bar --}}
                <div class="col-12">
                    <div class="wrapper bg-white rounded">
                        {{-- title --}}
                        <div class="title text-center py-3">
                            <h2 class="fw-bold fs-4">
                                <i class="fa-solid fa-user"></i>
                                Utenti registrati
                            </h2>
                        </div>

                        {{-- canva user chart --}}
                        <canvas id="userChart" class="rounded"></canvas>
                    </div>
                </div>
            </div>

            {{-- row 2 order chart --}}
            <div class="row">
                {{-- order chart bar --}}
                <div class="col-12">
                    <div class="wrapper bg-white rounded">
                        {{-- title --}}
                        <div class="title text-center py-3">
                            <h2 class="fw-bold fs-4">
                                <i class="fa-solid fa-box-open"></i>
                                Ordini effettuati e pagati
                            </h2>
                        </div>

                        {{-- Canva order chart --}}
                        <canvas id="orderChart" class="rounded"></canvas>
                    </div>
                </div>
            </div>

            {{-- row 3 total price orders month --}}
            <div class="row">
                {{-- total price order chart bar --}}
                <div class="col-12">
                    <div class="wrapper bg-white rounded">
                        {{-- title --}}
                        <div class="title text-center py-3">
                            <h2 class="fw-bold fs-4">
                                <i class="fa-solid fa-hand-holding-dollar"></i>
                                Totale incasso
                            </h2>
                        </div>

                        {{-- Canva total price orders chart --}}
                        <canvas id="totalPriceOrders" class="rounded"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    <script>
        var canva_user = document.getElementById('userChart').getContext('2d');
        var user_chart = new Chart(canva_user, {
            // The type of chart we want to create
            type: 'bar',
            // The data for our dataset
            data: {
                labels: {!!json_encode($user_chart->labels)!!},
                datasets: [{
                    label: 'Utenti registrati', 
                    backgroundColor: {!!json_encode($user_chart->colours)!!},
                    data: {!!json_encode($user_chart->dataset)!!},
                }]
            },
            // Configuration options go here
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true, 
                            callback: function(value) {
                                if (value % 1 === 0) {
                                    return value;
                                }
                            }
                        }, 
                        scaleLabel: {
                            display: false
                        }
                    }]
                }, 
                legend: {
                   display: false
                }, 
                layout: {
                    padding: {
                        left: 10,
                        right: 10,
                        top: 0,
                        bottom: 10
                    }
                }
            }
        });

        var canva_order = document.getElementById('orderChart').getContext('2d');
        var order_chart = new Chart(canva_order, {
            // The type of chart we want to create
            type: 'bar',
            // The data for our dataset
            data: {
                labels: {!!json_encode($order_chart->labels)!!},
                datasets: [{
                    label: 'Ordini effettuati',
                    backgroundColor: {!!json_encode($order_chart->colours)!!},
                    data: {!!json_encode($order_chart->dataset)!!},
                }]
            },
            // Configuration options go here
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            callback: function(value) {
                                if (value % 1 === 0) {
                                    return value;
                                }
                            }
                        },
                        scaleLabel: {
                            display: false
                        }
                    }]
                },
                legend: {
                    display: false
                },
                layout: {
                    padding: {
                        left: 10,
                        right: 10,
                        top: 0,
                        bottom: 10
                    }
                }
            }
        });

        var canva_total_price_orders = document.getElementById('totalPriceOrders').getContext('2d');
        var total_price_orders_chart = new Chart(canva_total_price_orders, {
            // The type of chart we want to create
            type: 'bar',
            // The data for our dataset
            data: {
                labels: {!!json_encode($total_price_order_chart->labels)!!},
                datasets: [{
                    label: 'Totale incasso €',
                    backgroundColor: {!!json_encode($total_price_order_chart->colours)!!},
                    data: {!!json_encode($total_price_order_chart->dataset)!!},
                }]
            },
            // Configuration options go here
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            callback: function(value) {
                                if (value % 1 === 0) {
                                    return value;
                                }
                            }
                        },
                        scaleLabel: {
                            display: false
                        }
                    }]
                },
                legend: {
                    display: false
                },
                layout: {
                    padding: {
                        left: 10,
                        right: 10,
                        top: 0,
                        bottom: 10
                    }
                }
            }
        });


    </script>

@endsection
