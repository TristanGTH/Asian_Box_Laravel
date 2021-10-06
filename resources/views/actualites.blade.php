<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Asian Box - Actualités</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>

    @livewireStyles

</head>
<body class="antialiased">

<livewire:header/>

<div class="backgroundContent">

    <div class="grid pb-5 sm:grid-cols-3 sm:grid-cols-4 sm:gap-4">

    @if($actualites->count() !== 0)

            <div class="col-start-1 col-span-4 mb-3">
                <div>
                    <h1 class="titleCustomClass mt-4 text-center"> ACTUALITÉS </h1>
                    <h3 class="sousTitleCustomClass text-center"> Retrouvez toutes nos actualités par date de
                        sortie. </h3>
                </div>
            </div>

        <?php $check = false; ?>

        @foreach($actualites as $actualite)

                <div class="pb-5 <?= ($check = !$check) ? 'col-start-1 sm:col-start-1 col-end-5 sm:col-end-3' : 'col-start-1 sm:col-start-3 col-end-5' ?>">
                    <livewire:actualite :actualite="$actualite"/>
                </div>

        @endforeach

        <div style="padding-bottom: 15vh;"></div>

    @else

            <div class="col-start-1 col-span-4">
                <div style="padding: 30vh;">
                    <h1 class="titleCustomClass mt-4 text-center"> AUCUNE ACTUALITÉ </h1>
                    <h3 class="sousTitleCustomClass text-center"> Surveillez nos réseaux sociaux pour plus d'infos!</h3>
                </div>
            </div>

    @endif


    </div>
</div>

<livewire:footer/>

@livewireScripts
</body>
</html>

