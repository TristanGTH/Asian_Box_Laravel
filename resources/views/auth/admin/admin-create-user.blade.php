<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Asian Box - Admin : Création Utilisateur</title>

    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @livewireStyles
</head>
<body class="antialiased">

<livewire:header/>

<div class="backgroundContent pb-3">


    <div class="grid grid-cols-6 gap-4 mb-4">
        <div class="col-start-2 col-span-4">
            <h1 class="titleCustomClass mt-4 text-center"> NOUVEL UTILISATEUR </h1>
        </div>
    </div>


    @if($message)

        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mx-5 mb-3" role="alert">
            <ul>
                <li> {{ $message }} </li>
            </ul>
        </div>

    @endif

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mx-5 mb-5" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="mb-5 sm:mt-0">
        <div class="md:grid md:grid-cols-4 md:gap-6">
            <div class="mt-5 md:mt-0 md:col-start-2 md:col-end-4">
                <form method="POST">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 sm:p-6" style="background-color: #EDD3A7">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="family_name"
                                           class="block text-sm font-medium text-gray-700">Nom</label>
                                    <input type="text" name="family_name" id="family_name" placeholder="Kapper"
                                           autocomplete="family_name" value="{{ old('family_name') }}"
                                           class="mt-1 border-blue-300 focus:border-blue-700 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="given_name"
                                           class="block text-sm font-medium text-gray-700">Prénom</label>
                                    <input type="text" name="given_name" id="given_name" placeholder="Andy"
                                           autocomplete="given_name" value="{{ old('given_name') }}"
                                           class="mt-1 border-blue-300 focus:border-blue-700 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                    <label for="email_address"
                                           class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="text" name="email_address" id="email_address"
                                           value="{{ old('email_address') }}"
                                           placeholder="andy.kapper@gmail.com" autocomplete="email"
                                           class="mt-1 border-blue-300 focus:border-blue-700 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6 sm:col-span-6">
                                    <label for="password"
                                           class="block text-sm font-medium text-gray-700">Password</label>
                                    <input type="password" name="password" id="password"
                                           placeholder="************" autocomplete="password"
                                           class="mt-1 border-blue-300 focus:border-blue-700 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6">
                                    <label for="address" class="block text-sm font-medium text-gray-700">Adresse</label>
                                    <input type="text" name="address" id="address" autocomplete="street-address"
                                           placeholder="3 rue Los Santos" value="{{ old('address') }}"
                                           class="mt-1 border-blue-300 focus:border-blue-700 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="town"
                                           class="block text-sm font-medium text-gray-700">Ville</label>
                                    <input type="text" name="town" id="town" placeholder="Paris"
                                           value="{{ old('town') }}"
                                           autocomplete="town"
                                           class="mt-1 border-blue-300 focus:border-blue-700 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="postal_code"
                                           class="block text-sm font-medium text-gray-700">Code postal</label>
                                    <input type="text" name="postal_code" id="postal_code" placeholder="75010"
                                           autocomplete="postal_code" value="{{ old('postal_code') }}"
                                           class="mt-1 border-blue-300 focus:border-blue-700 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <label class="inline-flex items-center mt-3" for="is_admin">
                                    <input type="checkbox" id="is_admin" name="is_admin" class="form-checkbox h-5 w-5 text-gray-600"><span
                                        class="ml-2 text-gray-700">isAdmin</span>
                                </label>

                            </div>
                        </div>
                        <div class="px-4 py-3 text-right sm:px-6" style="background-color: #EDD3A7">
                            <button type="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Ajouter
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<livewire:footer/>

@livewireScripts
</body>
</html>
