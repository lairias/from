<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>

    <style>
        .logo {
            width: 2.5cm;
        }

        .document-type {
            text-align: right;
            color: #444;
        }

        table {
            font-size: 0.6em;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col">
                <img src="{{ public_path("storage/SecSystemLogo.png") }}" style="width:100px;">
            </div>
            <div class="col">
                <h1 class="document-type display-4">{{$titulo}}</h1>
                <p class="text-right"><strong>{{\Carbon\Carbon::parse(\Carbon\Carbon::now())->formatLocalized('%d de %B del %Y')}}</strong></p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>
                    <strong>Generado por: </strong>
                    {{$nombre}}<br>
                    <strong>Perfil: </strong>
                    {{$rol}}
                </p>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Descripción</th>
                    <th>Serie</th>
                    <th>Almacén</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recursos as $recurso)
                <tr>
                    <th> {{$recurso->cod_recurso}}</th>
                    <td> {{$recurso->des_recurso}}</td>
                    <td> {{$recurso->serie_recurso}}</td>
                    <td> {{$recurso->almacen}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
</body>

</html>