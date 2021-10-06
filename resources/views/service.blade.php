<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Asian Box - Services</title>

    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @livewireStyles
</head>
<body class="antialiased">

<livewire:header/>

<div class="backgroundContent pb-5">


    <div class="grid md:grid-cols-6 md:gap-4 mb-4">
        <div class="md:col-start-2 md:col-span-4">
            <h1 class="titleCustomClass mt-4 text-center"> NOTRE SERVICE </h1>
            <h3 class="sousTitleCustomClass text-center"> Notre service vous permet de commander votre Asian Box mensuelle avec plein de produits différents venant d'Asie </h3>
        </div>
    </div>

    <div class="grid md:grid-cols-5 md:gap-4 mx-4 mt-8">

        <div class="md:col-start-1 md:col-end-3">

            <img class="mb-5" src="images/asianbox.jpg"/>

        </div>

        <div class="md:col-start-3 md:col-end-6">
            <div class="w-full bg-blue pt-8">
                <div class="flex flex-col sm:flex-row justify-center mb-6 sm:mb-0">
                    <div class="shadow-lg sm:flex-1 lg:flex-initial lg:w-1/3 rounded-t-lg rounded-tr-none mt-4 flex flex-col" style="background-color: #EDD3A7">
                        <div class="p-8 text-3xl font-bold text-center">Abonnement</div>
                        <div class="">
                            <div class="text-center py-4">
                                Une Box avec nourriture, snacks et friandise !
                            </div>
                            <div class="text-center py-4">
                                Une boîte personnalisé chaque mois de l'année !
                            </div>
                            <div class="w-full text-center px-8 pt-4 text-xl mt-auto mb-3">
                                24.99€/mois
                            </div>
                        </div>
                        <div class="text-center mt-8 mb-8 mt-auto">
                            <a href="@if(Route::has('login')) /abonnement/monthly @else /login @endif"
                               class="btnCustom inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 hover:text-white hover:no-underline"> S'abonner </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<livewire:footer />


@livewireScripts
</body>
</html>
