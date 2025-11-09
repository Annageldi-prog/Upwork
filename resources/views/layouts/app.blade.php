<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('img/favicon.ico') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-icons.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</head>
<body class="bg-light">
@include('app.nav')
<div class="container-fluid py-3">
    @include('app.alert')
    @yield('content')
</div>
</body>
</html>
