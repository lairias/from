@extends('adminlte::page')

@section('title', 'Empleados')

@section('content_header')
<h1>Empleados</h1>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-success">
    <strong>{{session('info')}}</strong>
</div>
@endif
<!CONTENIDO************>
    <!-- Main content -->
    <section class="content">

        <style>
            .fila {
                margin: auto !important;
                padding: auto !important;
            }

            td {
                font-size: 0.8em;
                text-align: right;
            }

            td>a {
                font-size: 0.5em;
                width: auto !important;
                margin-bottom: 2px;

            }
        </style>
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <!-- general form elements -->
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Tabla Empleados</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group row">
                                @can('admin.empleados.create')
                                <div class="col-sm-12">
                                    <a type="button" class="btn btn-warning" href="{{route('admin.empleados.create')}}"><i class="fa fa-pen"></i> Agregar</a>
                                </div>
                                @endcan
                            </div>
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Datos Importantes
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <div class="card-tools">
                                                    <a href="{{route('print.empleados')}}" class="btn btn-danger">
                                                        PDF <i class="far fa-file-pdf"></i>
                                                    </a>
                                                </div>
                                                <br>
                                                <thead>
                                                    <tr>
                                                        <th scope="col" width="50px">#</th>
                                                        <th scope="col">Primer Nombre</th>
                                                        <th scope="col">Primer Apellido</th>
                                                        <th scope="col">DNI</th>
                                                        <th scope="col">Tipo Empleado</th>
                                                        <th scope="col">Horas Trabajadas</th>
                                                        <th scope="col">Descripción Contrato</th>
                                                        <th scope="col">Fecha Inicio Contrato</th>
                                                        <th scope="col">Fecha Final Contrato</th>
                                                        <th scope="col">Acción</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($empleados as $empleado)
                                                    <tr>
                                                        <th>
                                                            @if($empleado->estado_empleado = "Activo")
                                                            {{$empleado->cod_empleado}} - <span class="badge bg-success">Activo</span>
                                                            @else
                                                            {{$empleado->cod_empleado}} - <span class="badge bg-danger">Inactivo</span>
                                                            @endif

                                                        </th>
                                                        <td> {{$empleado->primer_nom}}</td>
                                                        <td> {{$empleado->primer_apel}}</td>
                                                        <td> {{$empleado->rtn_persona}}</td>
                                                        <td> {{$empleado->tipo_empleado}}</td>
                                                        <td> {{$empleado->hrstrab_emp}}</td>
                                                        <td> {{$empleado->des_contrato}}</td>
                                                        <td>{{\Carbon\Carbon::parse($empleado->fec_ini_contrato)->formatLocalized('%d de %B del %Y')}}</td>
                                                        <td>{{\Carbon\Carbon::parse($empleado->fec_fin_contrato)->formatLocalized('%d de %B del %Y')}}</td>
                                                        <td>
                                                            @can('admin.empleados.edit')
                                                            <a href="{{route('admin.empleados.edit', $empleado->cod_empleado)}}" class="btn btn-warning btnEditarEmpleado"><i class="fas fa-pencil-alt"></i>Editar</a>
                                                            @endcan
                                                            @can('admin.empleados.show')
                                                            <a href="{{route('admin.empleados.show', $empleado->cod_empleado)}}" class="btn btn-primary btnVerEmpleado"><i class="fas fa-eye"></i>Ver</a>
                                                            @endcan
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th scope="col" width="10px">#</th>
                                                        <th scope="col">Primer Nombre</th>
                                                        <th scope="col">Primer Apellido</th>
                                                        <th scope="col">DNI</th>
                                                        <th scope="col">Tipo Empleado</th>
                                                        <th scope="col">Horas Trabajadas</th>
                                                        <th scope="col">Descripción Contrato</th>
                                                        <th scope="col">Fecha Inicio Contrato</th>
                                                        <th scope="col">Fecha Final Contrato</th>
                                                        <th scope="col">Acción</th>
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
                                                Todos los Datos
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <table id="example2" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" width="10px">#</th>
                                                        <th scope="col">Primer Nombre</th>
                                                        <th scope="col">Primer Apellido</th>
                                                        <th scope="col">DNI</th>
                                                        <th scope="col">Tipo Empleado</th>
                                                        <th scope="col">Estado Empleado</th>
                                                        <th scope="col">Horas Trabajadas</th>
                                                        <th scope="col">Descripción Contrato</th>
                                                        <th scope="col">Fecha Inicio Contrato</th>
                                                        <th scope="col">Fecha Final Contrato</th>
                                                        <th scope="col">Usuario Registró</th>
                                                        <th scope="col">Fecha Registró</th>
                                                        <th scope="col">Acción</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($empleados as $empleado)
                                                    <tr>
                                                        <th> {{$empleado->cod_empleado}}</th>
                                                        <td> {{$empleado->primer_nom}}</td>
                                                        <td> {{$empleado->primer_apel}}</td>
                                                        <td> {{$empleado->rtn_persona}}</td>
                                                        <td> {{$empleado->tipo_empleado}}</td>
                                                        <td> {{$empleado->estado_empleado}}</td>
                                                        <td> {{$empleado->hrstrab_emp}}</td>
                                                        <td> {{$empleado->des_contrato}}</td>
                                                        <td>{{\Carbon\Carbon::parse($empleado->fec_ini_contrato)->formatLocalized('%d de %B del %Y')}}</td>
                                                        <td>{{\Carbon\Carbon::parse($empleado->fec_fin_contrato)->formatLocalized('%d de %B del %Y')}}</td>
                                                        <td> {{$empleado->usr_registro}}</td>
                                                        <td> {{$empleado->fec_registro}}</td>
                                                        <td>
                                                            @can('admin.empleados.edit')
                                                            <a href="{{route('admin.empleados.edit', $empleado->cod_empleado)}}" class="btn btn-warning btnEditarEmpleado"><i class="fas fa-pencil-alt"></i>Editar</a>
                                                            @endcan
                                                            @can('admin.empleados.show')
                                                            <a href="{{route('admin.empleados.show', $empleado->cod_empleado)}}" class="btn btn-primary btnVerEmpleado"><i class="fas fa-eye"></i>Ver</a>
                                                            @endcan
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th scope="col" width="10px">#</th>
                                                        <th scope="col">Primer Nombre</th>
                                                        <th scope="col">Primer Apellido</th>
                                                        <th scope="col">DNI</th>
                                                        <th scope="col">Tipo Empleado</th>
                                                        <th scope="col">Estado Empleado</th>
                                                        <th scope="col">Horas Trabajadas</th>
                                                        <th scope="col">Descripción Contrato</th>
                                                        <th scope="col">Fecha Inicio Contrato</th>
                                                        <th scope="col">Fecha Final Contrato</th>
                                                        <th scope="col">Usuario Registró</th>
                                                        <th scope="col">Fecha Registró</th>
                                                        <th scope="col">Acción</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!TERMINA CONTENIDO************>

        @stop

        @section('css')

        <!-- DataTables -->
        <link rel="stylesheet" href="{{  asset('vendor/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{  asset('vendor/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{  asset('vendor/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
        <!-- daterange picker -->
        <link rel="stylesheet" href="{{  asset('vendor/daterangepicker/daterangepicker.css')}}">
        <!-- Select2 -->
        <link rel="stylesheet" href="{{  asset('vendor/select2/css/select2.min.css')}}">
        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="{{  asset('vendor/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
        <!-- Toastr -->
        <link rel="stylesheet" href="{{  asset('vendor/toastr/toastr.min.css')}}">
        @stop
        @section('js')
        <script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- DataTables  & Plugins -->
        <script src="{{  asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{  asset('vendor/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{  asset('vendor/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{  asset('vendor/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{  asset('vendor/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{  asset('vendor/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{  asset('vendor/jszip/jszip.min.js')}}"></script>
        <script src="{{  asset('vendor/pdfmake/pdfmake.min.js')}}"></script>
        <script src="{{  asset('vendor/pdfmake/vfs_fonts.js')}}"></script>
        <script src="{{  asset('vendor/datatables-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{  asset('vendor/datatables-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{  asset('vendor/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
        <!-- Select2 -->
        <script src="{{  asset('vendor/select2/js/select2.full.min.js')}}"></script>
        <!-- InputMask -->
        <script src="{{  asset('vendor/moment/moment.min.js')}}"></script>
        <script src="{{  asset('vendor/inputmask/jquery.inputmask.min.js')}}"></script>
        <!-- date-range-picker -->
        <script src="{{  asset('vendor/daterangepicker/daterangepicker.js')}}"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{  asset('vendor/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
        <!-- Bootstrap Switch -->
        <script src="{{  asset('vendor/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
        <!-- dropzonejs -->
        <script src="{{  asset('vendor/dropzone/min/dropzone.min.js')}}"></script>
        <!-- SweetAlert2 -->
        <script src="{{  asset('vendor/sweetalert2/sweetalert2.min.js')}}"></script>
        <!-- Toastr -->
        <script src="{{  asset('vendor/toastr/toastr.min.js')}}"></script>

        <!-- Page specific script -->
        <script>
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": true,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $("#example2").DataTable({
                    "responsive": true,
                    "lengthChange": true,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
            });
        </script>

        <script>
            $(function() {
                //Initialize Select2 Elements
                $('.select2').select2()

                //Initialize Select2 Elements
                $('.select2bs4').select2({
                    theme: 'bootstrap4'
                })

                //Datemask dd/mm/yyyy
                $('#datemask').inputmask('yyyy/mm/dd', {
                    'placeholder': 'yyyy/mm/dd'
                })
                //Datemask2 mm/dd/yyyy
                $('#datemask2').inputmask('mm/dd/yyyy', {
                    'placeholder': 'mm/dd/yyyy'
                })
                //Money Euro
                $('[data-mask]').inputmask()

                //Date picker
                $('#reservationdate').datetimepicker({
                    format: 'L'
                });

            })
        </script>
        @stop