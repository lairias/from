@extends('adminlte::page')

@section('title', 'Crear')

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
                            <h3 class="card-title">Agregar Empleado</h3>
                        </div>
                        <form action="{{route('admin.empleados.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <h5>Datos del Empleado</h5>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-empleado">
                                                    Filtrador de Persona
                                                </button>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-6 col-form-label">DNI Persona</label>
                                                    <input type="text" class=" @error('codigo_persona') is-invalid @enderror col-sm-12 form-control input-lg" name="name_em" id="post-codigo_persona" disabled>

                                                    <input type="hidden" name="codigo_persona" id="post-codigo_persona_hi">
                                                    @error('codigo_persona')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-4 col-form-label">Estado del Empleado</label>
                                                    <select class=" @error('estado_empleado') is-invalid @enderror col-sm-12 form-control input-lg" name="estado_empleado" value="{{old('estado_empleado')}}" id="post-estado_empleado">
                                                        <option read only value="">Seleccionar tipo</option>
                                                        <option value="Activo" @if (old('estado_empleado')=="Activo" ) {{ 'selected' }} @endif>Activo</option>
                                                        <option value="Inactivo" @if (old('estado_empleado')=="Inactivo" ) {{ 'selected' }} @endif>Inactivo</option>
                                                    </select>
                                                    @error('estado_empleado')
                                                    <div class="invalid-feedback">
                                                        {{$message}} |Seleccione estado del empleado.
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-4 col-form-label">Tipo del Empleado</label>
                                                    <select class="@error('tipo_empleado') is-invalid @enderror col-sm-12 form-control input-lg" name="tipo_empleado" value="{{old('tipo_empleado')}}" id="post-tipo_empleado">
                                                        <option read only value="">Seleccionar tipo</option>
                                                        <option value="Guardia" @if (old('tipo_empleado')=="Guardia" ) {{ 'selected' }} @endif>Guardia</option>
                                                        <option value="Administrador" @if (old('tipo_empleado')=="Administrador" ) {{ 'selected' }} @endif>Administrador</option>
                                                    </select>
                                                    @error('tipo_empleado')
                                                    <div class="invalid-feedback">
                                                        {{$message}} |Seleccione un tipo de empleado.
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
                                                    <label for="inputName" class="col-sm-12 col-form-label">Horas trabajadas</label>
                                                    <input type="number" name="horas_trabajadas" value="{{old('horas_trabajadas')}}" id="post-horas_trabajadas" class="@error('horas_trabajadas') is-invalid @enderror col-sm-12 form-control input-lg" placeholder="Ingresar horas trabajadas" onkeypress="return SoloNumeros(event);" min="1" max="999">
                                                    @error('horas_trabajadas')
                                                    <div class="invalid-feedback">
                                                        {{$message}} |No debe llevar caracteres especiales, comas ni guiones.
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-12 col-form-label">Descripcion del contrato</label>
                                                    <input type="text" name="descripción_contrato" value="{{old('descripción_contrato')}}" id="post-descripción_contrato" class="@error('descripción_contrato') is-invalid @enderror col-sm-12 form-control input-lg" placeholder="Ingresar descripcion del contrato" minlength="5" maxlength="255">
                                                    @error('descripción_contrato')
                                                    <div class="invalid-feedback">
                                                        {{$message}} |Solo letras sin caracteres especiales.
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-12 col-form-label">Fecha inicia el contrato</label>
                                                    <input type="date" name="fec_ini_contrato" value="{{old('fec_ini_contrato')}}" id="post-fec_ini_contrato" class="@error('fec_ini_contrato') is-invalid @enderror col-sm-12 form-control input-lg" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>
                                                    @error('fec_ini_contrato')
                                                    <div class="invalid-feedback">
                                                        La fecha no puede ser antes que hoy.
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-12 col-form-label">Fecha finaliza el contrato</label>
                                                    <input type="date" name="fec_fin_contrato" value="{{old('fec_fin_contrato')}}" id="post-fec_fin_contrato" class="@error('fec_fin_contrato') is-invalid @enderror col-sm-12 form-control  input-lg" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>
                                                    @error('fec_fin_contrato')
                                                    <div class="invalid-feedback">
                                                        La fecha debe ser despues hoy.
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer">
                                <a href="{{route('admin.empleados.index')}}" class="btn btn-danger">Salir</a>
                                <button type="submit" class="btn btn-warning toastrDefaultSuccess">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-empleado">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h4 class="modal-title">Filtrador de Persona</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class=" col-md-12 form-control" id="codigo_persona" placeholder=" Ingresar DNI de persona">
                        <ul class="list-group" id="campo_empleado">
                        </ul>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
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
        <!-- Select2 -->
        <link rel="stylesheet" href="{{  asset('vendor/select2/css/select2.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">

        @stop
        @section('js')
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $(document).ready(function() {
                    $('.select2').select2({
                        theme: 'bootstrap4',
                    });
                });
            });
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

        <script>
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
            document.querySelector("#codigo_persona").addEventListener('keypress', async e => {
                        const respuesta = await fetch(`http://3.16.169.17:3000/api/personas/buscar/${e.target.value}`);
                        const encontrado = await respuesta.json();
                        document.querySelector('#campo_empleado').innerHTML = ``;

                        encontrado.map(X => {
                                if (X.tipo_persona != "Cliente" ) {
                                    const list = document.createElement('li');
                                    const span = document.createElement('span');
                                    list.classList.add('list-group-item');
                                    list.setAttribute('data-cod', X.cod_persona);
                                    list.innerText = `${X.cod_persona} - ${X.primer_nom} - ${X.primer_apel} - ${X.tipo_persona}`;

                                    document.querySelector('#campo_empleado').appendChild(list);
                                }
                                })

                        });





                    document.querySelector('#campo_empleado').addEventListener('click', async (e) => {
                        e.preventDefault()

                        if (e.target.classList.value == 'list-group-item') {
                            const text = e.target.innerText;
                            document.querySelector('#post-codigo_persona').value = text.split(' ')[2] + ' ' + text.split(' ')[4] + ' /  ' + text.split(' ')[6];

                            const id_empleado = e.target.getAttribute('data-cod');
                            document.querySelector('#post-codigo_persona_hi').value = e.target.getAttribute('data-cod')
                        }
                    })
        </script>
        @stop
