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
            <div class="row justify-content-center">
                {{-- user chart bar --}}
                <div class="col-12">
                    <canvas id="userChart" class="rounded"></canvas>
                </div>
            </div>

            {{-- row 2 order chart --}}
            <div class="row justify-content-center">
                {{-- user chart bar --}}
                <div class="col-12">
                    <canvas id="orderChart" class="rounded"></canvas>
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
                title: {
                    display: true,
                    text: 'Utenti registrati al mese',
                    fontSize: 20,
                    padding: 15
                },
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
                title: {
                    display: true,
                    text: 'Ordini effettuati al mese',
                    fontSize: 20,
                    padding: 15
                },
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
