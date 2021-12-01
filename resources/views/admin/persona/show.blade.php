@extends('adminlte::page')

@section('title', 'Eliminar')

@section('content_header')
    <h1>Personas</h1>
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
                            <h3 class="card-title">Mostrar Persona Por Codigo</h3>
                        </div>
                        @foreach ($personas as $persona)
                            <div class="modal-body">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <h5>Datos Personales</h5>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label for="inputName" class="col-sm-4 col-form-label">Codigo de Persona</label>
                                                        <input type="text" name="cod_persona" class="col-sm-8 form-control input-lg " placeholder="Ingresar codigo de persona" value="{{$persona->cod_persona}}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label for="inputName" class="col-sm-4 col-form-label">Primer Nombre</label>
                                                        <input type="text" name="primer_nom" class="col-sm-8 form-control input-lg " placeholder="Ingresar primer nombre" value="{{$persona->primer_nom}}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label for="inputName" class="col-sm-4 col-form-label">Segundo Nombre</label>
                                                        <input type="text" name="segundo_nom" class="col-sm-8 form-control input-lg" placeholder="Ingresar segundo nombre"  value="{{$persona->segundo_nom}}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label for="inputName" class="col-sm-4 col-form-label">Primer Apellido</label>
                                                        <input type="text" name="primer_apel" class="form-control input-lg" placeholder="Ingresar primer apellido" value="{{$persona->primer_apel}}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label for="inputName" class="col-sm-4 col-form-label">Sexo</label>
                                                        <select class=" col-sm-8 form-control input-lg" name="sexo" disabled>
                                                            <option  selected value="{{$persona->sexo}}">{{$persona->sexo}} | Actualmente seleccionado</option>
                                                            <option  value="F">Femenino</option>
                                                            <option  value="M">Masculino</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label for="inputName" class="col-sm-4 col-form-label">Edad</label>
                                                        <input type="text" name="edad" id="edad" class="form-control input-lg" placeholder="Ingresar edad" value="{{$persona->edad}}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label for="inputName" class="col-sm-4 col-form-label">Fecha de Nacimiento</label>
                                                        <input type="text" name="fec_nac_persona" id="fec_nac_persona" class="col-sm-8 form-control input-lg" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask value="{{$persona->fec_nac_persona}}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label for="inputName" class="col-sm-4 col-form-label">RTN</label>
                                                        <input type="text" name="rtn_persona" id="rtn_persona" class="form-control input-lg" value="{{$persona->rtn_persona}}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label for="inputName" class="col-sm-4 col-form-label">Tipo de Persona</label>
                                                        <select class=" col-sm-8 form-control input-lg" name="tipo_persona" disabled>
                                                            <option selected value="{{$persona->tipo_persona}}">{{$persona->tipo_persona}} | Actualmente seleccionado</option>
                                                            <option  value="Cliente">Cliente</option>
                                                            <option  value="Empleado">Empleado</option>
                                                            <option  value="Administrador">Administrador</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label for="inputName" class="col-sm-4 col-form-label">Direccion</label>
                                                        <input type="text" name="des_direc"  class="form-control input-lg" value="{{$persona->des_direc}}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label for="inputName" class="col-sm-4 col-form-label">Municipio</label>
                                                        <input type="text" name="municipio"  class="form-control input-lg" value="{{$persona->municipio}}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label for="inputName" class="col-sm-4 col-form-label">Departamento</label>
                                                        <input type="text" name="departamento"  class="form-control input-lg" value="{{$persona->departamento}}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label for="inputName" class="col-sm-4 col-form-label">Teléfono</label>
                                                        <input type="text" name="num_tel" class="form-control input-lg" value="{{$persona->num_tel}}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label for="inputName" class="col-sm-4 col-form-label">Tipo de Celular</label>
                                                        <select class=" col-sm-8 form-control input-lg" name="tipo_tel" disabled>
                                                            <option selected value="{{$persona->tipo_tel}}">{{$persona->tipo_tel}} | Actualmente seleccionado</option>
                                                            <option  value="Casa">Casa</option>
                                                            <option  value="Celular">Celular</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer">
                                <a href="{{route('admin.personas.index')}}" class="btn btn-danger ">Salir</a>
                                <form action="{{route('admin.personas.destroy', $persona->cod_persona)}}"  class="d-inline formulario-eliminar" method="POST">
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
            toastr.success('Eliminando registro persona en proceso.')
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




