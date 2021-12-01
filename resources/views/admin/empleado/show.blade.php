@extends('adminlte::page')

@section('title', 'Eliminar')

@section('content_header')
    <h1>Empleados</h1>
@stop

@section('content')
    <!CONTENIDO************>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <!-- general form elements -->
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Mostrar Empleado Por Codigo</h3>
                        </div>
                        @foreach ($empleados as $empleado)
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label for="inputName" class="col-sm-4 col-form-label">Codigo de Empleado</label>
                                        <input type="text" name="cod_empleado" class="col-sm-8 form-control input-lg" value="{{$empleado->cod_empleado}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <label for="inputName" class="col-sm-4 col-form-label">Nombre del Empleado</label>
                                        <input type="text" name="primer_nom" class="col-sm-8 form-control input-lg " disabled value="{{$empleado->primer_nom}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <label for="inputName" class="col-sm-4 col-form-label">Apellido del Empleado</label>
                                        <input type="text" name="primer_apel" class="col-sm-8 form-control input-lg " disabled value="{{$empleado->primer_apel}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <label for="inputName" class="col-sm-4 col-form-label">DNI del Empleado</label>
                                        <input type="number" name="rtn_persona" class="col-sm-8 form-control input-lg " disabled value="{{$empleado->rtn_persona}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                    <label for="inputName" class="col-sm-4 col-form-label">Estado del Empleado</label>
                                    <select class=" col-sm-8 form-control input-lg" name="estado_empleado" disabled>
                                        <option  value="{{$empleado->estado_empleado}}">{{$empleado->estado_empleado}}</option>
                                        <option  value="">Seleccionar tipo</option>
                                        <option  value="Activo">Activo</option>
                                        <option  value="Inactivo">Inactivo</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                    <label for="inputName" class="col-sm-4 col-form-label">Tipo del Empleado</label>
                                    <select class=" col-sm-8 form-control input-lg" name="tipo_empleado" disabled>
                                        <option  value="{{$empleado->tipo_empleado}}">{{$empleado->tipo_empleado}}</option>
                                        <option  value="">Seleccionar tipo</option>
                                        <option  value="Guardia">Guardia</option>
                                        <option  value="Administrador">Administrador</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                    <label for="inputName" class="col-sm-4 col-form-label">Horas trabajadas</label>
                                    <input type="text" name="hrstrab_emp" class="col-sm-8 form-control input-lg" value="{{$empleado->hrstrab_emp}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                    <label for="inputName" class="col-sm-4 col-form-label">Descripcion del contrato</label>
                                    <input type="text" name="des_contrato" class="col-sm-8 form-control input-lg" value="{{$empleado->des_contrato}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                    <label for="inputName" class="col-sm-4 col-form-label">Fecha inicia el contrato</label>
                                    <input type="text" name="fec_ini_contrato" class="col-sm-8 form-control input-lg"
                                    data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask value="{{$empleado->fec_ini_contrato}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                    <label for="inputName" class="col-sm-4 col-form-label">Fecha finaliza el contrato</label>
                                    <input type="text" name="fec_fin_contrato" class="col-sm-8 form-control  input-lg"
                                    data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask value="{{$empleado->fec_fin_contrato}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{route('admin.empleados.index')}}" class="btn btn-danger ">Salir</a>
                                <form action="{{route('admin.empleados.destroy', $empleado->cod_empleado)}}"  class="d-inline formulario-eliminar" method="POST">
                                @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger toastrDefaultSuccess">Borrar</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
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

    <!-- No Funciona -->
    <script>
        /*$('.formulario-eliminar').submit(function(e){
            e.preventDefault();

            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            }
            })
        });*/
    </script>

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
        $(function () {
            $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            });
        });
    </script>

    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
            theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('yyyy/mm/dd', { 'placeholder': 'yyyy/mm/dd' })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });

        })
    </script>

    <script>
        $(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        $('.toastrDefaultSuccess').click(function() {
            toastr.success('Eliminando cliente en proceso.')
        });
        $('.toastrDefaultInfo').click(function() {
            toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        });
        $('.toastrDefaultError').click(function() {
            toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        });
        $('.toastrDefaultWarning').click(function() {
            toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        });
        });
    </script>
@stop



