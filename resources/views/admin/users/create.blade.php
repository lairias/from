@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
<h1>Crear Usuarios</h1>
@stop

@section('content')
<!-- @livewire('admin.users-index') -->

@if (session('info'))
<div class="alert alert-success">
    <strong>{{session('info')}}</strong>
</div>
@endif
<!-- Main content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-6">
                <div class="card card-warning card-outline">
                    <form action="{{route('admin.users.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="fecha" value="2021-09-29">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label for="primer_nom" class="col-sm-4 col-form-label"> usuario</label>
                                        <input type="text" name="nombre" value="{{old('nombre')}}" class="col-sm-8 form-control input-lg " placeholder="Ingresar Nombre" minlength="2" maxlength="10">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <label for="inputName" class="col-sm-4 col-form-label">Correo Electrónico </label>
                                        <input type="text" name="correo" value="{{old('correo')}}" class="col-sm-8 form-control input-lg" placeholder="Ingresar Correo" minlength="16" maxlength="35">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <label for="inputName" class="col-sm-4 col-form-label">Contraseña</label>
                                        <input type="password" name="pass" value="{{old('pass')}}" class="form-control input-lg" placeholder="Ingresar Contraseña" minlength="2" maxlength="10">
                                    </div>
                                </div>


                                <hr>
                                <div class="form-group">
                                    <div class="input-group">
                                        <label for="inputName" class="col-sm-4 col-form-label">Tipo de rol</label>
                                        <select class=" col-sm-8 form-control input-lg" name="rol" value="{{old('rol')}}">
                                            <option value="">---Seleccionar tipo---</option>
                                            @foreach($roles as $rol)
                                            <option value="{{$rol->id}}">{{$rol->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <a href="{{route('admin.users.index')}}" class="btn btn-danger">Salir</a>
                                <button type="submit" class="btn btn-warning toastrDefaultSuccess">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.col-md-6 -->
        </div>
        <div class="col-lg-6">
            <!-- /.col-md-6 -->
            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div style="z-index: 1;" class="alert alert-danger alert-dismissible fade show  " role="alert">
                <strong>{{$error}}</strong>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endforeach
            @endif
        </div>
        <!-- /.col-md-6 -->
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
</script>
@stop
