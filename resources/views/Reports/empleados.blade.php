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
                    <th>Código</th>
                    <th>Primer Nombre</th>
                    <th>Apellido</th>
                    <th>DNI</th>
                    <th>Tipo Empleado</th>
                    <th>Horas trabajadas</th>
                    <th>Descripcion Contrato</th>
                    <th>Fecha Inicio Contrato</th>
                    <th>Fecha Fin Contrato</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empleados as $empleado)
                <tr>
                <th> {{$empleado->cod_empleado}}</th>
                <td> {{$empleado->primer_nom}}</td>
                <td> {{$empleado->primer_apel}}</td>
                <td> {{$empleado->rtn_persona}}</td>
                <td> {{$empleado->tipo_empleado}}</td>
                <td> {{$empleado->hrstrab_emp}}</td>
                <td> {{$empleado->des_contrato}}</td>
                <td>{{\Carbon\Carbon::parse($empleado->fec_ini_contrato)->formatLocalized('%d de %B del %Y')}}</td>
                <td>{{\Carbon\Carbon::parse($empleado->fec_fin_contrato)->formatLocalized('%d de %B del %Y')}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
</body>

</html>
