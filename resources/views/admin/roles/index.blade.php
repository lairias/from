@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1>Lista de roles</h1>
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
                    @can('admin.roles.create')
                        <a class="btn btn-warning " href="{{route('admin.roles.create')}}">Agregar Rol</a>
                    @endcan
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Role</th>
                                <th colspan="2"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{$role->id}}</td>
                                    <td>{{$role->name}}</td>
                                    <td>
                                        @can('admin.roles.edit')
                                            <a href="{{route('admin.roles.edit', $role)}}" class="btn btn-warning"><i class="fas fa-pencil-alt"></i>Editar</a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('admin.roles.destroy')
                                            <form action="{{route('admin.roles.destroy', $role)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Eliminar</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>
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



