@extends('adminlte::page')

@section('title', 'Editar')

@section('content_header')
    <h1>Editar Usuario</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card card-warning card-outline">
        <div class="card-body">
            <p class="h5">Nombre:</p>
            <p class="form-control">{{$user->name}}</p>

            <div class="row">
                <div class="col-md-6">
                    <h2 class="h5">Estado Usuario</h2>
                    {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}

                    @if ($user->est_user)
                        <div class="form-check">
                            <input value="{{$user->est_user}}" class="form-check-input" type="radio" name="est" id="flexRadioDefault".{{$user->id}} checked>
                            <label class="form-check-label" for="flexRadioDefault".{{$user->id}}> Activo</label>
                        </div>
                        <div class="form-check">
                            <input value="0" class="form-check-input" type="radio" name="est" id="flexRadioDefault".{{$user->id}}>
                            <label class="form-check-label" for="flexRadioDefault".{{$user->id}}> Inactivo</label>
                        </div>

                    @else
                        <div class="form-check">
                            <input value="1" class="form-check-input" type="radio" name="est" id="flexRadioDefault".{{$user->id}}>
                            <label class="form-check-label" for="flexRadioDefault".{{$user->id}}> Activo</label>
                        </div>
                        <div class="form-check">
                            <input value="{{$user->est_user}}" class="form-check-input" type="radio" name="est" id="flexRadioDefault".{{$user->id}} checked>
                            <label class="form-check-label" for="flexRadioDefault".{{$user->id}}> Inactivo</label>
                        </div>
                    @endif
                </div>
                <div class="col-md-6">
                    <h2 class="h5">Rol Asignado</h2>
                    @foreach ($roles as $role)

                        @foreach ($rol[0] as $rol1)
                            @if ($rol1->id==$role->id)
                                <div class="form-check">
                                    <input value="{{$role->id}}" class="form-check-input" type="radio" name="roles[]" id="flexRadioDefault".{{$role->id}} checked>
                                    <label class="form-check-label" for="flexRadioDefault".{{$role->id}}> {{$role->name}}</label>
                                </div>
                            @else
                                <div class="form-check">
                                    <input value="{{$role->id}}" class="form-check-input" type="radio" name="roles[]" id="flexRadioDefault".{{$role->id}}>
                                    <label class="form-check-label" for="flexRadioDefault".{{$role->id}}> {{$role->name}}</label>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
                <a href="{{route('admin.users.index')}}" class="btn btn-danger mt-3">Salir</a>
                {!! Form::submit('Actualizar Usuario', ['class' => 'btn btn-warning mt-3']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>console.log('Hi!');</script>
@stop
