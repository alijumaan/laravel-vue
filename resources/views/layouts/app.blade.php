<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Laravel</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-50 text-gray-700">
<div id="app">
    @include('layouts.header')

    @stack('content')

    @include('layouts.footer')
</div>
</body>
<script src="{{ mix('js/app.js') }}"></script>
</html>
