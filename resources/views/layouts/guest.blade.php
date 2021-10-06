<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Asian Box') }}</title>

        <script src="{{ asset('js/app.js') }}" defer></script>

        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        @livewireStyles
    </head>
    <body>

        <livewire:header />

        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>


        <livewire:footer />

        @livewireScripts
    </body>
</html>
