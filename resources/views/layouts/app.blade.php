<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title',config('app.name'))</title>
    <link rel="icon" href="{{ asset('img_assets/favicon-96x96.png') }}">


    {{--include css--}}
    @include('assets.css')
</head>
<body class="fixed-left">
<div id="wrapper">
    {{--include header that will fix in the top of the page--}}
    @include('assets.header')


    @guest
    @yield('content')
    @else

        {{--include sidebar--}}
        @admin
        @include('assets.sidebar.admin')
        @endadmin

        @kitchen
        @include('assets.sidebar.kitchen')
        @endkitchen

        @waiter
        @include('assets.sidebar.waiter')
        @endwaiter

        @manager
        @include('assets.sidebar.manager')
        @endmanager

        <div class="content-page">
            <div class="content">
                <div class="container">
                    {{--render content--}}
                    @yield('content')
                </div>
            </div>
        </div>
        @endguest


        {{--include js--}}
        @include('assets.js')
        @yield('extra-js')
        @include('assets.show-session-message')

</div>

<footer class="footer">
    Copyright © <?php echo date("Y"); ?> <a href="https://www.hazukisushi.cl" target="_blank">Hazuki Sushi.</a> Todos los derechos reservados.
</footer>
</body>
</html>