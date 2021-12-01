@extends('adminlte::page')

@section('title', 'Crear')

@section('content_header')
    <h1>Crear nuevo rol</h1>
@stop

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="card card-warning card-outline">

                <div class="card-body">
                    {!! Form::open(['route' => 'admin.roles.store']) !!}

                        @include('admin.roles.partials.form')

                        {!! Form::submit('Crear Rol', ['class' => 'btn btn-warning']) !!}

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



