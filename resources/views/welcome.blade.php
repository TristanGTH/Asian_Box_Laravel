<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Asian Box - Accueil</title>

        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        @livewireStyles
    </head>
    <body class="antialiased leading-normal tracking-normal">

        <livewire:header />


        <div class="backgroundContent">

            <div class="carousel">
                <div class="carousel-inner">
                    <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden="" checked="checked">
                    <div class="carousel-item">
                        <img src="images/asian_banner.jpg" class="imgCarousel">
                    </div>
                    <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
                    <div class="carousel-item">
                        <img src="images/asian_banner2.jpg" class="imgCarousel">
                    </div>
                    <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
                    <div class="carousel-item">
                        <img src="images/asian_banner3.jpg" class="imgCarousel">
                    </div>
                    <label for="carousel-3" class="carousel-control prev control-1">‹</label>
                    <label for="carousel-2" class="carousel-control next control-1">›</label>
                    <label for="carousel-1" class="carousel-control prev control-2">‹</label>
                    <label for="carousel-3" class="carousel-control next control-2">›</label>
                    <label for="carousel-2" class="carousel-control prev control-3">‹</label>
                    <label for="carousel-1" class="carousel-control next control-3">›</label>
                    <ol class="carousel-indicators">
                        <li>
                            <label for="carousel-1" class="carousel-bullet">•</label>
                        </li>
                        <li>
                            <label for="carousel-2" class="carousel-bullet">•</label>
                        </li>
                        <li>
                            <label for="carousel-3" class="carousel-bullet">•</label>
                        </li>
                    </ol>
                </div>
            </div>


            <div class="grid md:grid-cols-1" style="background-color: #EDD3A7;">

                <div class="text-center mb-4">

                    <h3 class="h3WelcomePage"> L'Asian Box </h3>
                    <p class="pWelcomePage px-6 py-3">Recevez chaque mois chez vous une Asian Box comprenant une multitude de nourriture, snacks et friandises ainsi qu'un cadeau venant tout droit du L'Asie.<br/>
                        Abonnez-vous aujourd'hui pour recevoir la Box du mois prochain !</p>

                </div>


            </div>

            <div>

                <img style="width: 100vw;" src="images/asian_banner3.jpg">

            </div>

        </div>


        <livewire:footer />

        @livewireScripts
    </body>
</html>
