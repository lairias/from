@extends('adminlte::page')

@section('title', 'Editar')

@section('content_header')
    <h1>Cambiar Contraseña Usuario</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    @if (session('danger'))
        <div class="alert alert-danger">
            <strong>{{session('danger')}}</strong>
        </div>
    @endif
    <div class="card card-warning card-outline">
        <div class="card-body">
            <p class="h5">Nombre:</p>
            @foreach ($users[0] as $user)
                <p class="form-control">{{$user->name}}</p>


            <div class="row">
                <div class="col-md-6">

                    <form action="{{route('admin.password.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        @foreach ($seguridad3 as $seguri)
                            <input type="hidden" name="fecha" value={{$seguri->dato}}>
                        @endforeach
                        <input type="hidden" name="reset" value="1">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="input-group">
                                    <label for="inputName" class="col-sm-4 col-form-label">Contraseña</label>
                                    <input type="password" name="current_password" value="{{old('current_password')}}" class="form-control input-lg" placeholder="Ingresar Nueva Contraseña" minlength="2" maxlength="10">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <label for="inputName" class="col-sm-4 col-form-label">Confirmar Contraseña</label>
                                    <input type="password" name="password" value="{{old('password')}}" class="form-control input-lg" placeholder="Confirmar Contraseña" minlength="2" maxlength="10">
                                </div>
                            </div>
                        </div>
                        <a href="{{route('admin.users.index')}}" class="btn btn-danger">Salir</a>
                        <button type="submit" class="btn btn-warning toastrDefaultSuccess">Guardar</button>
                    </form>
                    @endforeach
                </div>
                <div class="col-md-6">
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
            </div>

        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>console.log('Hi!');</script>
@stop
