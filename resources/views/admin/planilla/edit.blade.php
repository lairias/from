@extends('adminlte::page')

@section('title', 'Editar')

@section('content_header')
    <h1>Pago Empleado</h1>
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
                            <h3 class="card-title">Actualizar Pago</h3>
                        </div>
                        @foreach ($planillas as $planilla)
                        <form action = "{{route('admin.planillas.update',$planilla->cod_planilla)}}" method="post" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="modal-body">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <h5>Datos del Pago</h5>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-6 col-form-label">Nombre del Empleado</label>
                                                    <input type="text" name="primer_nom" class="col-sm-12 form-control input-lg " disabled value="{{$planilla->primer_nom}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-6 col-form-label">Codigo de planilla</label>
                                                    <input type="text" name="cod_planilla" class="col-sm-12 form-control input-lg " placeholder="Ingresar codigo de planilla" value="{{$planilla->cod_planilla}}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-6 col-form-label">Apellido del Empleado</label>
                                                    <input type="text" name="primer_apel" class="col-sm-12 form-control input-lg " disabled value="{{$planilla->primer_apel}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-6 col-form-label">DNI del Empleado</label>
                                                    <input type="number" name="rtn_persona" class="col-sm-12 form-control input-lg " disabled value="{{$planilla->rtn_persona}}">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-6 col-form-label">Monto de Pago</label>
                                                    <input type="number" name="monto_pago" class="@error('monto_pago') is-invalid @enderror col-sm-12 form-control input-lg" placeholder="Ingresar monto de pago" value="{{$planilla->mon_pago}}">
                                                    @error('monto_pago')
                                                        <div class="invalid-feedback">
                                                            {{$message}} |Solo se aceptan numeros y decimales sin espacios.
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                         
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-6 col-form-label">IHSS</label>
                                                    <input type="number" name="ihss" class="@error('ihss') is-invalid @enderror col-sm-12 form-control input-lg" placeholder="Ingresar IHSS" value="{{$planilla->ihss}}">
                                                    @error('ihss')
                                                        <div class="invalid-feedback">
                                                            {{$message}} |Solo se aceptan numeros y decimales sin espacios.
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-6 col-form-label">RAP</label>
                                                    <input type="number" name="rap" class="@error('rap') is-invalid @enderror col-sm-12 form-control input-lg" placeholder="Ingresar RAP" value="{{$planilla->rap}}"  min="100" max="1000000">
                                                    @error('rap')
                                                        <div class="invalid-feedback">
                                                            {{$message}} |Solo se aceptan numeros y decimales sin espacios.
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-6 col-form-label">VALES</label>
                                                    <input type="number" name="vales" class="@error('vales') is-invalid @enderror col-sm-12 form-control input-lg" placeholder="Ingresar deducciones" value="{{$planilla->vales}}" min="100" max="1000000">
                                                    @error('vales')
                                                        <div class="invalid-feedback">
                                                            {{$message}} |Solo se aceptan numeros y decimales sin espacios.
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-6 col-form-label">Fecha pago planilla</label>
                                                    <input type="text" name="fec_pago_planilla" class="col-sm-12 form-control input-lg" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask value="{{$planilla->fec_pago_planilla}}">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer">
                                <a href="{{route('admin.planillas.index')}}" class="btn btn-danger ">Salir</a>
                                <button type="submit" class="btn btn-warning toastrDefaultSuccess">Guardar</button>
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
    <script>
        function SoloNumeros(evt)
        {
        if(window.event){
        keynum = evt.keyCode;
        }
        else{
        keynum = evt.which;
        }

        if((keynum > 47 && keynum < 58) || keynum == 8 || keynum== 13)
        {
        return true;
        }
        else
        {
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Solo puede ingresar numeros!',
            footer: '<a>No se acepta espacios, letras, ni caracteres especiales</a>'
            })
        return false;
        }
        }

        function SoloLetras(e)
        {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toString();
        letras = "ABCDEFGHIJKLMNOPQRSTUVWXYZ??????????abcdefghijklmnopqrstuvwxyz??????????";

        especiales = [8,13];
        tecla_especial = false
        for(var i in especiales) {
        if(key == especiales[i]){
        tecla_especial = true;
        break;
        }
        }


        if(letras.indexOf(tecla) == -1 && !tecla_especial)
        {
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Solo puede ingresar letras!',
            footer: '<a>No se acepta espacios, n??meros, ni caracteres especiales</a>'
            })
        return false;
        }
        }

        function Especial(e)
        {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toString();
        letraespecial = "$%!@.";

        especiales = [8,13];
        tecla_especial = false
        for(var i in especiales) {
        if(key == especiales[i]){
        tecla_especial = true;
        break;
        }
        }

        if(letraespecial.indexOf(tecla) == -1 && !tecla_especial)
        {
        alert("Ingresar solo letras especiales");
        return false;
        }
        }

    </script>
    <script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Page specific script -->
    <script>
        $('.formulario-eliminar').submit(function(e){
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
        });
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
            "responsive": true, "Change": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
            "paging": true,
            "Change": false,
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
            toastr.success('Actualizando pago empleado en proceso .')
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


