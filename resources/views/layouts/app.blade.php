<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laravel</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-700">
    <div id="app">

        @include('layouts.header')

        <div class="mx-auto py-12 px-4 xl:px-64">

            <app></app>

{{--            <section>--}}
{{--                <div class="container w-full p-20 m-4 mx-auto my-8 text-center bg-white border-2 border-dashed h-60 border-blueGray-300 rounded-xl">--}}
{{--                    <p class="mt-20 italic tracking-tighter text-md text-blueGray-500 title-font">--}}
{{--                        -- Content goes here ----}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </section>--}}

        </div>

        @include('layouts.footer')

    </div>
</body>
<script src="{{ mix('js/app.js') }}"></script>
</html>
