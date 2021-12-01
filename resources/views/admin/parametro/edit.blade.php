@extends('adminlte::page')

@section('title', 'Editar')

@section('content_header')
<h1>Editar Parámetro</h1>
@stop

@section('content')

@if (session('info'))
<div class="alert alert-success">
    <strong>{{session('info')}}</strong>
</div>
@endif
<div class="row">
    <div class="col-md-6">
        <div class="card card-warning card-outline">
            <div class="card-body">
                <p class="h5">Nombre Parámetro:</p>
                @foreach($seguridad as $parametro)
                <form action="{{route('admin.parametros.update',$parametro->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="input-group">
                                <label for="inputName" class="col-sm-4 col-form-label">Nombre Parámetro</label>
                                <input type="text" name="Nombre_parametro" class="col-sm-8 form-control input-lg " value="{{$parametro->nombre}}">
                            </div>
                        </div>
                        @if($parametro->id == 13 || $parametro->id == 17 || $parametro->id ==18)

                        @if ($parametro->dato == 'si')
                        <div class="form-check">
                            <input value="{{$parametro->dato}}" class="form-check-input" type="radio" name="Parametro" id="flexRadioDefault".{{$parametro->id}} checked>
                            <label class="form-check-label" for="flexRadioDefault".{{$parametro->id}}> Activo</label>
                        </div>
                        <div class="form-check">
                            <input value="no" class="form-check-input" type="radio" name="Parametro" id="flexRadioDefault".{{$parametro->id}}>
                            <label class="form-check-label" for="flexRadioDefault".{{$parametro->id}}> Inactivo</label>
                        </div>

                        @else
                        <div class="form-check">
                            <input value="si" class="form-check-input" type="radio" name="Parametro" id="flexRadioDefault" .{{$parametro->id}}>
                            <label class="form-check-label" for="flexRadioDefault".{{$parametro->id}}> Activo</label>
                        </div>
                        <div class="form-check">
                            <input value="no" class="form-check-input" type="radio" name="Parametro" id="flexRadioDefault" .{{$parametro->id}} checked>
                                <label class="form-check-label" for="flexRadioDefault".{{$parametro->id}}> Inactivo</label>
                        </div>
                        @endif

                        @else
                        <div class="form-group">
                            <div class="input-group">
                                <label for="inputName" class="col-sm-4 col-form-label">Dato Parámetro</label>
                                <input type="text" name="Parametro" class="col-sm-8 form-control input-lg " value="{{$parametro->dato}}">
                        </div>
                    </div>
                    @endif
                    <a href="{{route('admin.parametros.index')}}" class="btn btn-danger ">Salir</a>

                    <button type="submit" class="btn btn-warning toastrDefaultSuccess">Guardar</button>
            </div>
            </form>
        </div>
    </div>
    @endforeach
</div>
</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop