@extends('adminlte::page')

@section('title', 'Pago empleados')

@section('content_header')
<h1>Pago empleados</h1>
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
                            <h3 class="card-title">Tabla Pago empleados</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group row">
                                @can('admin.planillas.create')
                                <div class="col-sm-12">
                                    <a type="button" class="btn btn-warning" href="{{route('admin.planillas.create')}}"><i class="fa fa-pen"></i> Agregar</a>
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
                                            <div class="card-tools">
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <a href="{{route('print.planilla')}}" class="btn btn-danger">
                                                            PDF <i class="far fa-file-pdf"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <table id="example1" class="table table-bordered table-striped" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 15px">#</th>
                                                        <th style="width: 50px">Nombre</th>
                                                        <th style="width: 50px">Apellido</th>
                                                        <th style="width: 50px">DNI</th>
                                                        <th style="width: 50px">Horas Trabajadas</th>
                                                        <th style="width: 50px">Monto Pago</th>
                                                        <th style="width: 50px">Deducciones</th>
                                                        <th style="width: 50px">Pago Total</th>
                                                        <th style="width: 50px">Fecha de Pago Empleado</th>
                                                        <th style="width: 50px">Tipo Empleado</th>
                                                        <th style="width: 50px">Acción</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($planillas as $planilla)
                                                    <tr>
                                                        <td>{{$planilla->cod_planilla}}</td>
                                                        <td>{{$planilla->primer_nom}}</td>
                                                        <td>{{$planilla->primer_apel}}</td>
                                                        <td>{{$planilla->rtn_persona}}</td>
                                                        <td>{{$planilla->hrstrab_emp}}.hrs</td>
                                                        <td class="fila"> L. {{ number_format($planilla->mon_pago, 2) }}</td>
                                                        <td class="fila"> L. {{ number_format($planilla->deducciones, 2) }}</td>
                                                        <td class="fila"> L. {{ number_format($planilla->pago_total, 2) }}</td>
                                                        <td>{{\Carbon\Carbon::parse($planilla->fec_pago_planilla)->formatLocalized('%d de %B del %Y')}}</td>
                                                        <td>{{$planilla->tipo_empleado}}</td>
                                                        <td>
                                                            @can('admin.planillas.edit')
                                                            <a href="{{route('admin.planillas.edit', $planilla->cod_planilla)}}" class="btn btn-warning btnEditarPlanilla"><i class="fas fa-pencil-alt"></i>Editar</a>
                                                            @endcan
                                                            @can('admin.planillas.show')
                                                            <a href="{{route('admin.planillas.show', $planilla->cod_planilla)}}" class="btn btn-primary btnVerPlanilla"><i class="fas fa-eye"></i>Ver</a>
                                                            @endcan
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th style="width: 15px">#</th>
                                                        <th style="width: 50px">Nombre</th>
                                                        <th style="width: 50px">Apellido</th>
                                                        <th style="width: 50px">DNI</th>
                                                        <th style="width: 50px">Horas Trabajadas</th>
                                                        <th style="width: 50px">Monto Pago</th>
                                                        <th style="width: 50px">Deducciones</th>
                                                        <th style="width: 50px">Pago Total</th>
                                                        <th style="width: 50px">Fecha de Pago Empleado</th>
                                                        <th style="width: 50px">Tipo Empleado</th>
                                                        <th style="width: 50px">Acción</th>
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

                                    <div id="collapseTwo" class="collapse show  scroll  " aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="card-body ">
                                            <table id="example2" class="table table-bordered table-striped  ">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" width="10px">#</th>
                                                        <th scope="col">Primer Nombre</th>
                                                        <th scope="col">Primer Apellido</th>
                                                        <th scope="col">Monto Pago</th>
                                                        <th scope="col">IHSS</th>
                                                        <th scope="col">RAP</th>
                                                        <th scope="col">Vales</th>
                                                        <th scope="col">Deducciones</th>
                                                        <th scope="col">Pago Total</th>
                                                        <th scope="col">Fecha de Pago Planilla</th>
                                                        <th scope="col">DNI</th>
                                                        <th scope="col">Tipo Empleado</th>
                                                        <th scope="col">Horas Trabajadas</th>
                                                        <th scope="col">Usuario Registró</th>
                                                        <th scope="col">Fecha Registró</th>
                                                        <th scope="col">Acción</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($planillas as $planilla)
                                                    <tr>
                                                        <td class="fila">{{$planilla->cod_planilla}}</td>
                                                        <td class="fila">{{$planilla->primer_nom}}</td>
                                                        <td class="fila">{{$planilla->primer_apel}}</td>
                                                        <td class="fila"> L. {{ number_format($planilla->mon_pago, 2) }}</td>
                                                        
                                                        <td class="fila"> L. {{ number_format($planilla->ihss, 2) }}</td>
                                                        <td class="fila"> L. {{ number_format($planilla->rap, 2) }}</td>
                                                        <td class="fila"> L. {{ number_format($planilla->vales, 2) }}</td>
                                                        <td class="fila"> L. {{ number_format($planilla->deducciones, 2) }}</td>
                                                        <td class="fila"> L. {{ number_format($planilla->pago_total, 2) }}</td>
                                                        <td class="fila">{{\Carbon\Carbon::parse($planilla->fec_pago_planilla)->formatLocalized('%d de %B del %Y')}}</td>
                                                        <td class="fila">{{$planilla->rtn_persona}}</td>
                                                        <td class="fila">{{$planilla->tipo_empleado}}</td>
                                                        <td class="fila">{{$planilla->hrstrab_emp}}.hrs</td>
                                                        <td class="fila">{{$planilla->usr_registro}}</td>
                                                        <td class="fila">{{\Carbon\Carbon::parse($planilla->fec_registro)->formatLocalized('%d de %B del %Y')}}</td>
                                                        <td class="fila">
                                                            @can('admin.planillas.edit')
                                                            <a href="{{route('admin.planillas.edit', $planilla->cod_planilla)}}" class="btn btn-warning btnEditarPlanilla"><i class="fas fa-pencil-alt"></i>Editar</a>
                                                            @endcan
                                                            @can('admin.planillas.show')
                                                            <a href="{{route('admin.planillas.show', $planilla->cod_planilla)}}" class="btn btn-primary btnVerPlanilla"><i class="fas fa-eye"></i>Ver</a>
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
                                                        <th scope="col">Monto Pago</th>
                                                        <th scope="col">IHSS</th>
                                                        <th scope="col">RAP</th>
                                                        <th scope="col">Vales</th>
                                                        <th scope="col">Deducciones</th>
                                                        <th scope="col">Pago Total</th>
                                                        <th scope="col">Fecha de Pago Planilla</th>
                                                        <th scope="col">DNI</th>
                                                        <th scope="col">Tipo Empleado</th>
                                                        <th scope="col">Horas Trabajadas</th>
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
        <!-- DateTime -->
        <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.1/css/dataTables.dateTime.min.css">

        <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.dataTables.min.css">
        <style>
            /*estilos para la tabla*/
            table th {
                background-color: #bdbbbb;
                color: rgb(0, 0, 0);
            }
        </style>

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


        <script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>

        <script>
            $(document).ready(function() {
                var table = $('#example1').DataTable({

                    responsive: true,
                    lengthChange: true,
                    autoWidth: false,
                    orderCellsTop: true,
                    fixedHeader: true
                });

                //Creamos una fila en el head de la tabla y lo clonamos para cada columna
                $('#example1 thead tr').clone(true).appendTo('#example1 thead');

                $('#example1 thead tr:eq(1) th').each(function(i) {
                    var title = $(this).text(); //es el nombre de la columna
                    $(this).html('<input class="col-12" type="text" placeholder="' + title + '" />');

                    $('input', this).on('keyup change', function() {
                        if (table.column(i).search() !== this.value) {
                            table
                                .column(i)
                                .search(this.value)
                                .draw();
                        }
                    });
                });
            });
        </script>
        <!-- Page specific script -->
        <script>
            $(function() {
                $("#example2").DataTable({
                    "responsive": true,
                    "lengthChange": true,
                    "autoWidth": true,
                    "buttons": ["copy", "csv", "excel", "print", "colvis"]
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