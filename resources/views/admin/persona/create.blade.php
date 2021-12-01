@extends('adminlte::page')

@section('title', 'Crear')

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
                            <h3 class="card-title">Agregar Persona</h3>
                        </div>
                        <form action="{{route('admin.personas.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <h5>Datos Personales</h5>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="primer_nom" class="col-sm-6 col-form-label">Primer Nombre</label>
                                                        <input type="text" name="primer_nombre" value="{{old('primer_nombre')}}" class="@error('primer_nombre') is-invalid @enderror col-sm-12 form-control input-lg " placeholder="Ingresar primer nombre" onkeypress="return SoloLetras(event);" minlength="2" maxlength="15">
                                                        @error('primer_nombre')
                                                            <div class="invalid-feedback">
                                                                {{$message}} |Solo se aceptan Letras sin espacios.
                                                            </div>
                                                        @enderror
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-6 col-form-label">Segundo Nombre</label>
                                                        <input type="text" name="segundo_nombre" value="{{old('segundo_nombre')}}" class="@error('segundo_nombre') is-invalid @enderror col-sm-12  form-control input-lg" placeholder="Ingresar segundo nombre" onkeypress="return SoloLetras(event);" minlength="2" maxlength="15">
                                                        @error('segundo_nombre')
                                                            <div class="invalid-feedback">
                                                                {{$message}} |Solo se aceptan Letras sin espacios.
                                                            </div>
                                                        @enderror
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-6 col-form-label">Primer Apellido</label>
                                                        <input type="text" name="primer_apellido" value="{{old('primer_apellido')}}" class="@error('primer_apellido') is-invalid @enderror form-control input-lg" placeholder="Ingresar primer apellido" onkeypress="return SoloLetras(event);" minlength="2" maxlength="15">
                                                        @error('primer_apellido')
                                                            <div class="invalid-feedback">
                                                                {{$message}} |Solo se aceptan Letras sin espacios.
                                                            </div>
                                                        @enderror
                                                    </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-6 col-form-label">Sexo</label>
                                                        <select class="@error('sexo') is-invalid @enderror col-sm-12  form-control input-lg" name="sexo" value="{{old('sexo')}}">
                                                            <option read only value="">Seleccionar tipo</option>
                                                            <option value="F"@if (old('sexo')=="F") {{ 'selected' }} @endif>Femenino</option>
                                                            <option value="M"@if (old('sexo')=="M") {{ 'selected' }} @endif>Masculino</option>
                                                        </select>
                                                        @error('sexo')
                                                            <div class="invalid-feedback">
                                                                {{$message}} |Seleccione tipo de sexo.
                                                            </div>
                                                        @enderror
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-6 col-form-label">Edad</label>
                                                        <input type="text" name="edad" value="{{old('edad')}}" class="@error('edad') is-invalid @enderror form-control input-lg" placeholder="Ingresar edad" onkeypress="return SoloNumeros(event);" minlength="2" maxlength="3">
                                                        @error('edad')
                                                            <div class="invalid-feedback">
                                                                {{$message}} |Solo números sin espacios.
                                                            </div>
                                                        @enderror
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-6 col-form-label">Fecha de Nacimiento</label>
                                                        <input type="date" name="fecha_nacimiento"  value="{{old('fecha_nacimiento')}}" class="@error('fecha_nacimiento') is-invalid @enderror col-sm-12  form-control input-lg">
                                                        @error('fecha_nacimiento')
                                                            <div class="invalid-feedback">
                                                                {{$message}} |Seleccione fecha de nacimiento valida.
                                                            </div>
                                                         @enderror
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-6 col-form-label">RTN</label>
                                                        <input type="text" name="rtn_persona" value="{{old('rtn_persona')}}" class="@error('rtn_persona') is-invalid @enderror form-control input-lg" placeholder="Ingresar RTN" onkeypress="return SoloNumeros(event);" minlength="13" maxlength="20">
                                                        @error('rtn_persona')
                                                            <div class="invalid-feedback">
                                                                {{$message}} |Solo numeros sin espacios.
                                                            </div>
                                                        @enderror
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-6 col-form-label">Tipo de Persona</label>
                                                        <select class="@error('tipo_persona') is-invalid @enderror col-sm-12  form-control input-lg" name="tipo_persona" value="{{old('tipo_persona')}}">
                                                            <option read only value="">Seleccionar tipo</option>
                                                            <option value="Cliente" @if (old('tipo_persona')=="Cliente") {{ 'selected' }} @endif>Cliente</option>
                                                            <option value="Empleado" @if (old('tipo_persona')=="Empleado") {{ 'selected' }} @endif>Empleado</option>
                                                            <option value="Administrador" @if (old('tipo_persona')=="Administrador") {{ 'selected' }} @endif>Administrador</option>
                                                        </select>
                                                        @error('tipo_persona')
                                                            <div class="invalid-feedback">
                                                                {{$message}} |Seleccione un tipo de persona.
                                                            </div>
                                                        @enderror
                                                    </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-6 col-form-label">Direccion</label>
                                                        <input  type="text" name="direccion" value="{{old('direccion')}}" class="@error('direccion') is-invalid @enderror form-control input-lg" placeholder="Ingresar direccion" minlength="5" maxlength="255">
                                                        @error('direccion')
                                                            <div class="invalid-feedback">
                                                                {{$message}} |Solo letras sin caracteres especiales.
                                                            </div>
                                                        @enderror
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-6 col-form-label">Municipio</label>
                                                        <input type="text" name="municipio" value="{{old('municipio')}}" class="@error('municipio') is-invalid @enderror form-control input-lg" placeholder="Ingresar municipio" minlength="5" maxlength="255">
                                                        @error('municipio')
                                                            <div class="invalid-feedback">
                                                                {{$message}} |Solo letras sin espacio ni caracteres especiales.
                                                            </div>
                                                        @enderror
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-6 col-form-label">Departamento</label>
                                                        <input type="text" name="departamento" value="{{old('departamento')}}" class="@error('departamento') is-invalid @enderror form-control input-lg" placeholder="Ingresar departamento" minlength="5" maxlength="255">
                                                        @error('departamento')
                                                            <div class="invalid-feedback">
                                                                {{$message}} |Solo letras sin espacio ni caracteres especiales.
                                                            </div>
                                                        @enderror
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-6 col-form-label">Telefono</label>
                                                        <input type="text" name="numero_telefono" value="{{old('numero_telefono')}}" class="@error('numero_telefono') is-invalid @enderror form-control input-lg" placeholder="Ingresar telefono" onkeypress="return SoloNumeros(event);" minlength="8" maxlength="20">
                                                        @error('numero_telefono')
                                                            <div class="invalid-feedback">
                                                                {{$message}} |Solo numeros sin espacio.
                                                            </div>
                                                        @enderror
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-6 col-form-label">Tipo de telefono</label>
                                                        <select class="@error('tipo_telefono') is-invalid @enderror col-sm-12  form-control input-lg" name="tipo_telefono" value="{{old('tipo_telefono')}}">
                                                            <option read only value="">Seleccionar tipo</option>
                                                            <option value="Casa" @if (old('tipo_telefono')=="Casa") {{ 'selected' }} @endif>Casa</option>
                                                            <option value="Celular" @if (old('tipo_telefono')=="Celular") {{ 'selected' }} @endif>Celular</option>
                                                        </select>
                                                        @error('tipo_telefono')
                                                            <div class="invalid-feedback">
                                                                {{$message}} |Seleccione un tipo de telefono.
                                                            </div>
                                                        @enderror
                                                    </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer">
                                <a href="{{route('admin.personas.index')}}" class="btn btn-danger">Salir</a>
                                <button type="submit" class="btn btn-warning toastrDefaultSuccess">Guardar</button>
                            </div>
                        </form>
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
             function sinespacios(e) {
                if (e.target.value.trim()==""){

                }
             }
            function SoloNumeros(evt) {
                if (window.event) {
                    keynum = evt.keyCode;
                } else {
                    keynum = evt.which;
                }

                if ((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13) {
                    return true;
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Solo puede ingresar numeros!',
                        footer: '<a>No se acepta espacios, letras, ni caracteres especiales</a>'
                    })
                    return false;
                }
            }

            function SoloLetras(e) {
                key = e.keyCode || e.which;
                tecla = String.fromCharCode(key).toString();
                letras = "ABCDEFGHIJKLMNOPQRSTUVWXYZÁÉÍÓÚabcdefghijklmnopqrstuvwxyzáéíóú";

                especiales = [8, 13];
                tecla_especial = false
                for (var i in especiales) {
                    if (key == especiales[i]) {
                        tecla_especial = true;
                        break;
                    }
                }


                if (letras.indexOf(tecla) == -1 && !tecla_especial) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Solo puede ingresar letras!',
                        footer: '<a>No se acepta espacios, números, ni caracteres especiales</a>'
                    })
                    return false;
                }
            }

            function Especial(e) {
                key = e.keyCode || e.which;
                tecla = String.fromCharCode(key).toString();
                letraespecial = "$%!@.";

                especiales = [8, 13];
                tecla_especial = false
                for (var i in especiales) {
                    if (key == especiales[i]) {
                        tecla_especial = true;
                        break;
                    }
                }

                if (letraespecial.indexOf(tecla) == -1 && !tecla_especial) {
                    alert("Ingresar solo letras especiales");
                    return false;
                }
            }
        </script>
        <script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Page specific script -->
        <script>
            $('.formulario-eliminar').submit(function(e) {
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
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
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


        <script>
            $(function() {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });


                $('.toastrDefaultSuccess').click(function() {
                    toastr.success('Registro de persona en proceso.')
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
