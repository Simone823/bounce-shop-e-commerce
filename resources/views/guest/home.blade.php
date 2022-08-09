<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- if auth user meta name user id  --}}
    @if(Auth::user())
        <meta name="user-id" content="{{ Auth::user()->id }}">

        @else
            <meta name="user-id" content="null">
    @endif

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- Font awesome 6.1.2--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link href="{{ asset('css/front.css') }}" rel="stylesheet">

    {{-- Meta Title --}}
    <title>{{config('app.name')}} @yield('metaTitle')</title>
</head>
<body>

    {{-- Header guest --}}
    @include('components.guestHeader')


    {{-- Root --}}
    <div id="root">

    </div>


    {{-- Script js front --}}
    <script src="{{asset('js/front.js')}}"></script>

</body>
</html>

