@extends('adminlte::page')

@section('title', 'Eliminar')

@section('content_header')
    <h1>Planillas</h1>
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
                            <h3 class="card-title">Mostrar Planilla Por Codigo</h3>
                        </div>
                        @foreach ($planillas as $planilla)
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label for="inputName" class="col-sm-4 col-form-label">Codigo de Planilla</label>
                                        <input type="text" name="cod_planilla" value="{{$planilla->cod_planilla}}" class="col-sm-8 form-control input-lg " disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <label for="inputName" class="col-sm-4 col-form-label">Nombre del Empleado</label>
                                        <input type="text" name="primer_nom" class="col-sm-8 form-control input-lg " disabled value="{{$planilla->primer_nom}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <label for="inputName" class="col-sm-4 col-form-label">Apellido del Empleado</label>
                                        <input type="text" name="primer_apel" class="col-sm-8 form-control input-lg " disabled value="{{$planilla->primer_apel}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <label for="inputName" class="col-sm-4 col-form-label">DNI del Empleado</label>
                                        <input type="number" name="rtn_persona" class="col-sm-8 form-control input-lg " disabled value="{{$planilla->rtn_persona}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <label for="inputName" class="col-sm-4 col-form-label">Monto de pago</label>
                                        <input type="text" name="mon_pago" value="{{$planilla->mon_pago}}" class="col-sm-8 form-control input-lg" disabled>
                                    </div>
                                </div>
                      
                                <div class="form-group">
                                    <div class="input-group">
                                        <label for="inputName" class="col-sm-4 col-form-label">IHSS</label>
                                        <input type="text" name="ihss" value="{{$planilla->ihss}}" class="col-sm-8 form-control input-lg" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <label for="inputName" class="col-sm-4 col-form-label">RAP</label>
                                        <input type="text" name="rap" value="{{$planilla->rap}}" class="col-sm-8 form-control input-lg" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <label for="inputName" class="col-sm-4 col-form-label">Vales</label>
                                        <input type="text" name="vales" value="{{$planilla->vales}}" class="col-sm-8 form-control input-lg" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <label for="inputName" class="col-sm-4 col-form-label">Deducciones</label>
                                        <input type="text" name="deducciones" value="{{$planilla->deducciones}}" class="col-sm-8 form-control input-lg" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <label for="inputName" class="col-sm-4 col-form-label">Pago sub total</label>
                                        <input type="text" name="pago_stotal" value="{{$planilla->pago_stotal}}" class="col-sm-8 form-control input-lg" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <label for="inputName" class="col-sm-4 col-form-label">Pago total</label>
                                        <input type="text" name="pago_total" value="{{$planilla->pago_total}}" class="col-sm-8 form-control input-lg" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <label for="inputName" class="col-sm-4 col-form-label">Fecha pago planilla</label>
                                        <input type="text" name="fec_pago_planilla" value="{{$planilla->fec_pago_planilla}}" class="col-sm-8 form-control input-lg"
                                        data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <label for="inputName" class="col-sm-4 col-form-label">Estado de empleado</label>
                                        <input type="text" name="estado_empleado" value="{{$planilla->estado_empleado}}" class="col-sm-8 form-control input-lg" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <label for="inputName" class="col-sm-4 col-form-label">Tipo empleado</label>
                                        <input type="text" name="tipo_empleado" value="{{$planilla->tipo_empleado}}" class="col-sm-8 form-control input-lg" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <label for="inputName" class="col-sm-4 col-form-label">Horas trabajadas del empleado</label>
                                        <input type="text" name="hrstrab_emp" value="{{$planilla->hrstrab_emp}}" class="col-sm-8 form-control input-lg" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{route('admin.planillas.index')}}" class="btn btn-danger ">Salir</a>
                                <form action="{{route('admin.planillas.destroy', $planilla->cod_planilla)}}"  class="d-inline formulario-eliminar" method="POST">
                                @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger toastrDefaultSuccess">Borrar</button>
                                </form>
                            </div>
                        </form>
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
            toastr.success('Eliminando pago empleado en proceso.')
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

        $('.toastsDefaultDefault').click(function() {
            $(document).Toasts('create', {
            title: 'Toast Title',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.toastsDefaultTopLeft').click(function() {
            $(document).Toasts('create', {
            title: 'Toast Title',
            position: 'topLeft',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.toastsDefaultBottomRight').click(function() {
            $(document).Toasts('create', {
            title: 'Toast Title',
            position: 'bottomRight',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.toastsDefaultBottomLeft').click(function() {
            $(document).Toasts('create', {
            title: 'Toast Title',
            position: 'bottomLeft',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.toastsDefaultAutohide').click(function() {
            $(document).Toasts('create', {
            title: 'Toast Title',
            autohide: true,
            delay: 750,
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.toastsDefaultNotFixed').click(function() {
            $(document).Toasts('create', {
            title: 'Toast Title',
            fixed: false,
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.toastsDefaultFull').click(function() {
            $(document).Toasts('create', {
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            icon: 'fas fa-envelope fa-lg',
            })
        });
        $('.toastsDefaultFullImage').click(function() {
            $(document).Toasts('create', {
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            image: '../../dist/img/user3-128x128.jpg',
            imageAlt: 'User Picture',
            })
        });
        $('.toastsDefaultSuccess').click(function() {
            $(document).Toasts('create', {
            class: 'bg-success',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.toastsDefaultInfo').click(function() {
            $(document).Toasts('create', {
            class: 'bg-info',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.toastsDefaultWarning').click(function() {
            $(document).Toasts('create', {
            class: 'bg-warning',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.toastsDefaultDanger').click(function() {
            $(document).Toasts('create', {
            class: 'bg-danger',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        $('.toastsDefaultMaroon').click(function() {
            $(document).Toasts('create', {
            class: 'bg-maroon',
            title: 'Toast Title',
            subtitle: 'Subtitle',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });
        });
    </script>
@stop




