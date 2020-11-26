<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title id="titulo_profile">@yield('titulo')</title>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="{{ asset('css/locastyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('img/icons/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('img/icons/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('img/icons/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/icons/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('img/icons/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('img/icons/apple-icon-120x120.png')}}g">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('img/icons/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('img/icons/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('img/icons/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('img/icons/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/icons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('img/icons/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/icons/favicon-16x16.png')}}">
    <link href="http://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="manifest" href="{{asset('img/icons/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
<div id="content">
    <nav class="navbar navbar-light navbar-expand bg-white mb-4 topbar static-top">
        @hasSection('barraLateral')
            @yield('barraLateral')
        @endif
    </nav>

    @hasSection('body')

        @yield('body')

    @endif

    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>Asa Branca {{ date('Y') }}</span></div>
        </div>
    </footer>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js')  }}"></script>
<script src="{{ asset('js/theme.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/locastyle.js') }}"></script>
<script type="text/javascript" src="{{asset('js/scriptsD.js')}}"></script>
<script type="text/javascript" src="{{asset('js/addons/datatables.min.js')}}"></script>
</body>
</html>
