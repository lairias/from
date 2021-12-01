@extends('adminlte::page')

@section('title', 'Editar')

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
                            <h3 class="card-title">Asistencia</h3>
                        </div>
                        <form action="{{route('admin.asistencia.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <h5>Datos de Validación</h5>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-empleado">
                                                    Filtrador de empleado
                                                </button>
                                            </div>
                                            <div class="col-md-4">
                                                <!-- Aqui van los form-group por individual -->

                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-6 col-form-label">Codigo del Empleado</label>
                                                    <input id="cod_empleado" class="col-sm-12 form-control input-lg " placeholder="Ingresar codigo del empleado" disabled>
                                                    <input type="hidden" id="cod_empleado_" name="cod_empleado">
                                                </div>
                                            </div>
                                            <div class=" col-md-4">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-6 col-form-label">Nombre del Empleado</label>
                                                    <input type="text" id="primer_nom" name="primer_nom" class="col-sm-12 form-control input-lg " disabled ">
                                            <input type="hidden" id="primer_nom_" name="primer_nom">
                                                </div>
                                            </div>
                                            <div class=" col-md-4">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-6 col-form-label">Apellido del Empleado</label>
                                                    <input type="text" id="primer_apel" name="primer_apel" class="col-sm-12 form-control input-lg " disabled>
                                                    <input type="hidden" id="primer_apel_" name="primer_pel">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-6 col-form-label">DNI del Empleado</label>
                                                    <input type="text" id="rtn_persona" name="rtn_persona" class="col-sm-12 form-control input-lg " disabled>
                                                    <input type="hidden" id="rtn_persona_" name="rtn_persona">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-6 col-form-label">Estado de Asistencia</label>
                                                    <select class="@error('estado_asistencia') is-invalid @enderror col-sm-12 form-control input-lg" id="estado_empleado" name="estado_asistencia">
                                                        <option selected value="Asistio">Asistio</option>
                                                        <option value="No Asistio">No Asistio</option>
                                                        <option value="Excusado">Excusado</option>
                                                    </select>
                                                    @error('estado_empleado')
                                                    <div class="invalid-feedback">
                                                        {{$message}} |Seleccione estado del empleado.
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="d-none col-md-4" id="hidde-excusa">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-6 col-form-label">Descripción Excusa</label>
                                                    <div class="input-group">
                                                        <textarea name="excusa" class="form-control  @error('excusa') is-invalid @enderror" aria-label="With textarea"></textarea>
                                                    </div>
                                                    @error('excusa')
                                                    <div class="invalid-feedback">
                                                        {{$message}}.
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">

                                            <div class="col-md-4">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-6 col-form-label">Horas Asistidas</label>
                                                    <input type="number" class="@error('horas_asistidas') is-invalid @enderror col-sm-12 form-control input-lg" name="horas_asistidas">

                                                    @error('tipo_empleado')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-6 col-form-label">Fecha de asistencia</label>
                                                    <input type="date" id="fecha-asistencia" name="fecha_asistencia" class="@error('fecha_asistencia') is-invalid @enderror col-sm-12 form-control input-lg" required value="">
                                                    @error('fecha_asistencia')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer">
                                <a href="{{route('admin.asistencia.index')}}" class="btn btn-danger ">Salir</a>
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
                        <h4 class="modal-title">Filtrador de empleados</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class=" col-md-12 form-control" id="codigo_empleado" placeholder=" Ingresar código empleado">
                        <ul class="list-group" id="campo_empleado">
                        </ul>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
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
            var select = document.getElementById('estado_empleado');
            select.addEventListener('change',
                function() {
                    var selectedOption = this.options[select.selectedIndex];
                    if (selectedOption.value === "Excusado") {
                        document.querySelector("#hidde-excusa").classList.remove("d-none")
                    } else {
                        document.querySelector("#hidde-excusa").classList.add("d-none")
                    }
                });


            // funcion de empleados
            document.querySelector("#codigo_empleado").addEventListener('keypress', async e => {
                const respuesta = await fetch(`http://3.16.169.17:3000/api/empleados/buscar/${e.target.value}`);
                const encontrado = await respuesta.json();
                document.querySelector('#campo_empleado').innerHTML = ``;

                encontrado.map(X => {
                    const list = document.createElement('li');
                    const span = document.createElement('span');
                    list.classList.add('list-group-item');
                    list.setAttribute('data-cod', X.cod_empleado);
                    list.setAttribute('data-nom', X.primer_nom);
                    list.setAttribute('data-ape', X.primer_apel);
                    list.setAttribute('data-dni', X.rtn_persona);
                    list.innerText = `${X.cod_persona} - ${X.primer_nom} - ${X.primer_apel}`;
                    document.querySelector('#campo_empleado').appendChild(list);
                })

            });

            document.querySelector('#campo_empleado').addEventListener('click', (e) => {
                e.preventDefault()
                if (e.target.classList.value == 'list-group-item') {
                    document.querySelector('#cod_empleado').value = e.target.getAttribute('data-cod');
                    document.querySelector('#cod_empleado_').value = e.target.getAttribute('data-cod');
                    document.querySelector('#primer_nom').value = e.target.getAttribute('data-nom');
                    document.querySelector('#primer_nom_').value = e.target.getAttribute('data-nom');
                    document.querySelector('#primer_apel').value = e.target.getAttribute('data-ape');
                    document.querySelector('#primer_apel_').value = e.target.getAttribute('data-ape');
                    document.querySelector('#rtn_persona').value = e.target.getAttribute('data-dni');
                    document.querySelector('#rtn_persona_').value = e.target.getAttribute('data-dni');
                }
            })


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
                    toastr.success('Actualizando cliente en proceso.')
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