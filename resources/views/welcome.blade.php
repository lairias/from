<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(App\Http\Controllers\Parametros::Nombre_empresa()) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> {{ __(App\Http\Controllers\Parametros::Nombre_empresa()) }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #ffffff;
            color: #0f0f0f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #0f0f0f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">

        <div class="top-right links">
            @auth
            <a href="{{ url('/dashboard') }}">Inicio</a>
            @else
            <a href="{{ route('login') }}">Iniciar Sesión</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Registrar</a>
            @endif
            @endauth
        </div>

        <div class="content">
            <div class="welcome-logo" align="center">
                <img class="circle" src="vendor/adminlte/dist/img/secsystemcircle.png" style="width:240px;">
            </div>
            <div class="title m-b-md">
                Servicios Empresariales Colon
            </div>

            <div class="links">
                <a href="">Registros</a>
                <a href="">Tablas</a>
                <a href="">Reportes</a>
                <a href="">Permisos</a>
                <a href="">Usuarios</a>
            </div>
        </div>
    </div>
</body>

</html> --}}