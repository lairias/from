@extends('adminlte::page')

@section('title', 'Vales')

@section('content_header')
<h1>Vales</h1>
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
        </style>
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <!-- general form elements -->
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Tabla Vales</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group row">
                                <!-- can('admin.vales.create') -->
                                <div class="col-sm-12">
                                    <a type="button" class="btn btn-warning" href="{{route('admin.vales.create')}}"><i class="fa fa-pen"></i> Agregar</a>
                                </div>
                                <!-- endcan -->
                            </div>
                            <div class="card">
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
                                                <th scope="col" width="10px">#</th>
                                                <th scope="col">Primer Nombre</th>
                                                <th scope="col">Primer Apellido</th>
                                                <th scope="col">DNI</th>
                                                <th scope="col">Tipo Empleado</th>
                                                <th scope="col">Monto Vale</th>
                                                <th scope="col">Fecha Vale</th>
                                                <th scope="col">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($vales as $vale)
                                            <tr>
                                                <th> {{$vale->cod_vales}}</th>
                                                <td> {{$vale->primer_nom}}</td>
                                                <td> {{$vale->primer_apel}}</td>
                                                <td> {{$vale->rtn_persona}}</td>
                                                <td> {{$vale->tipo_empleado}}</td>
                                                <td> L. {{ number_format($vale->vales, 2) }}</td>
                                                <td>{{\Carbon\Carbon::parse($vale->fecha_vale)->formatLocalized('%d de %B del %Y')}}</td>
                                                <td>
                                                    <!--can('admin.vales.edit')-->
                                                    <a href="{{route('admin.vales.edit', $vale->cod_vales)}}" class="btn btn-warning"><i class="fas fa-pencil-alt"></i>Editar</a>
                                                    <!--endcan-->
                                                    <!--can('admin.vales.show')-->
                                                    <a href="{{route('admin.vales.show', $vale->cod_vales)}}" class="btn btn-primary"><i class="fas fa-eye"></i>Ver</a>
                                                    <!--endcan-->
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
                                                <th scope="col">Monto Vale</th>
                                                <th scope="col">Fecha Vale</th>
                                                <th scope="col">Acción</th>
                                            </tr>
                                        </tfoot>
                                    </table>
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