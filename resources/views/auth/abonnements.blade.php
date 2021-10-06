<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Asian Box - Abonnement</title>

    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @livewireStyles
</head>
<body class="antialiased">

<!-- HEADER -->
<livewire:header/>

<div class="backgroundContent pb-3">

    <div class="grid grid-cols-6 gap-4 mb-4">
        <div class="col-start-2 col-span-4">
            <h1 class="titleCustomClass mt-4 text-center"> ABONNEMENT </h1>
        </div>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mx-5 mb-5" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (\Session::has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mx-5 mb-3"
             role="alert">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif

    @if($subscription)

        <h3 class="sousTitleCustomClass text-center mx-auto"> Abonnement {{ $plan->name }} - {{ $plan->price/100 }}€ </h3>
        <h3 class="sousTitleCustomClass text-center mx-auto"> XXXX-XXXX-XXXX-{{ Auth::user()->pm_last_four }} </h3>

    @else

        <h3 class="sousTitleCustomClass text-center mx-auto"> Vous n'avez aucun abonnement pour le moment. </h3>

    @endif



</div>

<livewire:footer/>


@livewireScripts
</body>
</html>
