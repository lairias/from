<div>
    <div class="card card-warning card-outline">
        <div class="card-header">
            @can('admin.users.create')
            <a class="btn btn-warning " href="{{route('admin.users.create')}}">Agregar Usuario</a>
            @endcan
        </div>

        @if ($users->count())
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Usuarios Activos
                        </button>
                    </h2>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <table id="example2" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Fecha</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                @if($user->est_user)
                                <tr class="table-success">
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->Time_pass}}</td>
                                    <td>
                                        @can('admin.users.edit')
                                            <a class="btn btn-warning" href="{{route('admin.users.edit', $user)}}">Editar</a>
                                        @endcan
                                        @can('admin.users.edit.password')
                                            <a class="btn btn-primary" href="{{route('admin.password.edit', $user)}}">Cambiar Contraseña</a>
                                        @endcan
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Fecha</th>
                                    <th>Accion</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Usuarios Inactivo
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <table id="example1" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Fecha</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                @if(!$user->est_user)
                                <tr class="table-danger">
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->Time_pass}}</td>
                                    <td>
                                        @can('admin.users.edit')
                                        <a class="btn btn-warning" href="{{route('admin.users.edit', $user)}}">Editar</a>

                                        @endcan
                                        @can('admin.users.edit.password')
                                        <a class="btn btn-primary" href="{{route('admin.password.edit', $user)}}">Cambiar Contraseña</a>
                                        @endcan

                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Fecha</th>
                                    <th>Accion</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="card-footer">
        {{$users->links()}}
    </div>
    @else

    <div class="card-body">
        <strong>No hay registros</strong>
    </div>

    @endif
</div>
