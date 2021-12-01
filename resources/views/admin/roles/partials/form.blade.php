<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingresar nombre del rol']) !!}
    <br>
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger alert-dismissible fade show  " role="alert">
        <strong>{{$error}}</strong>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endforeach
    @endif

</div>

<h2 class="h3">Lista de Permisos</h2>


<div class="row">
    <div class="col-4">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title"> Permisos Administrador </h3>
            </div>
            <div class="card-body">
                <label>
                    @foreach ($permissions as $permission)

                    @if($permission->id >= 1 && $permission->id <= 5 ) <br>
                        {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-2']) !!}
                        {{$permission->description}}
                        @endif
                        @endforeach </label>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title"> Usuarios </h3>
            </div>
            <div class="card-body">
                <label>
                    @foreach ($permissions as $permission)

                    @if($permission->id >= 6 && $permission->id <= 9 ) <br>
                        {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-2']) !!}
                        {{$permission->description}}
                        @endif
                        @endforeach </label>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title"> Roles </h3>
            </div>
            <div class="card-body">
                <label>
                    @foreach ($permissions as $permission)

                    @if($permission->id >= 10 && $permission->id <= 14 ) <br>
                        {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-2']) !!}
                        {{$permission->description}}
                        @endif
                        @endforeach </label>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title"> Personas </h3>
            </div>
            <div class="card-body">
                <label>
                    @foreach ($permissions as $permission)

                    @if($permission->id >= 15 && $permission->id <= 19 ) <br>
                        {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-2']) !!}
                        {{$permission->description}}
                        @endif
                        @endforeach </label>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title"> Empleados </h3>
            </div>
            <div class="card-body">
                <label>
                    @foreach ($permissions as $permission)

                    @if($permission->id >= 20 && $permission->id <= 24 ) <br>
                        {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-2']) !!}
                        {{$permission->description}}
                        @endif
                        @endforeach </label>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title"> Clientes </h3>
            </div>
            <div class="card-body">
                <label>
                    @foreach ($permissions as $permission)

                    @if($permission->id >= 25 && $permission->id <= 29 ) <br>
                        {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-2']) !!}
                        {{$permission->description}}
                        @endif
                        @endforeach </label>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title"> Registros </h3>
            </div>
            <div class="card-body">
                <label>
                    @foreach ($permissions as $permission)

                    @if($permission->id >= 30 && $permission->id <= 34 ) <br>
                        {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-2']) !!}
                        {{$permission->description}}
                        @endif
                        @endforeach </label>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title"> Recursos </h3>
            </div>
            <div class="card-body">
                <label>
                    @foreach ($permissions as $permission)

                    @if($permission->id >= 35 && $permission->id <= 39 ) <br>
                        {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-2']) !!}
                        {{$permission->description}}
                        @endif
                        @endforeach </label>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title"> Pago empleados </h3>
            </div>
            <div class="card-body">
                <label>
                    @foreach ($permissions as $permission)

                    @if($permission->id >= 40 && $permission->id <= 44 ) <br>
                        {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-2']) !!}
                        {{$permission->description}}
                        @endif
                        @endforeach </label>
            </div>
        </div>
    </div>
</div>
