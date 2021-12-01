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
                    <th>Primer Nombre</th>
                    <th>Primer Apellido</th>
                    <th>DNI</th>
                    <th>Monto Pago</th>
                    <th>Deducciones</th>
                    <th>Pago Total</th>
                    <th>Fecha de Pago Empleado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($planillas as $planilla)
                <tr>
                    <td>{{$planilla->cod_planilla}}</td>
                    <td>{{$planilla->primer_nom}}</td>
                    <td>{{$planilla->primer_apel}}</td>
                    <td>{{$planilla->rtn_persona}}</td>
                    <td>{{$planilla->mon_pago}}</td>
                    <td>{{$planilla->deducciones}}</td>
                    <td>{{$planilla->pago_total}}</td>
                    <td>{{\Carbon\Carbon::parse($planilla->fec_pago_planilla)->formatLocalized('%d de %B del %Y')}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
</body>

</html>