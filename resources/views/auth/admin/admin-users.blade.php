<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Asian Box - Users : Admin</title>

    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @livewireStyles
</head>
<body class="antialiased">

<!-- HEADER -->
<livewire:header/>

<div class="backgroundContent pb-5">


    <div class="grid grid-cols-6 gap-4 mb-4">
        <div class="col-start-2 col-span-4">
            <h1 class="titleCustomClass mt-4 text-center"> ADMIN - USERS </h1>
            <h3 class="sousTitleCustomClass text-center"> Gérez vos utilisateurs, leurs emails, mot de passe, administrateurs
                ... </h3>
        </div>
    </div>

    <div class="text-center mb-3">
        <a href="/admin/users/create"
           class="btnCustom inline-block bg-indigo-500 text-black px-4 py-2 my-2 my-auto rounded hover:bg-indigo-700 hover:text-white hover:no-underline"> Créer </a>
    </div>

    @if (\Session::has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mx-5 mb-3"
             role="alert">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
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


    <table class="table-fixed mx-auto mt-3">
        <thead>
        <tr>
            <th class="w-1/5"> ID </th>
            <th class="w-1/5">Utilisateurs</th>
            <th class="w-1/5">Abonnements</th>
            <th class="w-1/5">isAdmin</th>
            <th class="w-1/5">Actions</th>
        </tr>
        </thead>
        <tbody>

        @foreach($users as $user)

            <tr style="border-bottom: 1px solid black;">
                <td>{{ $user->id }}</td>
                <td>{{ $user->family_name }} {{ $user->given_name }} - {{ $user->email_address }}</td>
                <td> @if($user->stripe_id) Abonné @else Aucun @endif </td>
                <td>{{ $user->is_admin }}</td>
                <td>

                    <div class="grid grid-cols-2">

                        <div class="text-center">
                            <a href="/admin/users/{{ $user->id }}"
                               class="btnCustom inline-block bg-yellow-500 text-black px-4 py-2 my-auto rounded hover:bg-yellow-700 hover:text-white hover:no-underline"> Modifier </a>
                        </div>

                        <div class="text-center">
                            <a href="/admin/users/{{ $user->id }}/delete"
                               class="btnCustom inline-block bg-red-500 text-black px-4 py-2 rounded hover:bg-red-700 hover:text-white hover:no-underline"> Supprimer </a>
                        </div>

                    </div>

                </td>
            </tr>

        @endforeach

        </tbody>
    </table>


</div>


<livewire:footer/>


@livewireScripts
</body>
</html>
