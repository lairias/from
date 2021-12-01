@extends('adminlte::page')

@section('title', 'Editar')

@section('content_header')
    <h1>Editar rol</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
                <div class="card card-warning card-outline">
                    <div class="card-header">

                    </div>
                    <div class="card-body">

                        {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'put']) !!}

                            @include('admin.roles.partials.form')

                            {!! Form::submit('Actualizar Rol', ['class' => 'btn btn-warning']) !!}

                        {!! Form::close() !!}

                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>console.log('Hi!');</script>
@stop



