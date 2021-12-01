@extends('adminlte::page')

@section('title', 'Editar')

@section('content_header')
<h1>Clientes</h1>
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
                            <h3 class="card-title">Actualizar Clientes</h3>
                        </div>
                        @foreach ($clientes as $cliente)
                        <form action="{{route('admin.clientes.update',$cliente->cod_cliente)}}" method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="modal-body">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <h5>Datos del Cliente</h5>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-4 col-form-label">Codigo del cliente</label>
                                                    <input type="number" name="cod_cliente" class="col-sm-8 form-control input-lg " placeholder="Ingresar codigo del cliente" disabled value="{{$cliente->cod_cliente}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-4 col-form-label">Nombre del cliente</label>
                                                    <input type="text" name="primer_nom" class="col-sm-8 form-control input-lg" disabled value="{{$cliente->primer_nom}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-4 col-form-label">Apellido del cliente</label>
                                                    <input type="text" name="primer_apel" class="col-sm-8 form-control input-lg" disabled value="{{$cliente->primer_apel}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-4 col-form-label">DNI del cliente</label>
                                                    <input type="number" name="rtn_persona" class="col-sm-8 form-control input-lg" disabled value="{{$cliente->rtn_persona}}">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-4 col-form-label">Nombre Empresa</label>
                                                    <input type="text" name="nombre_empresa" class="@error('nombre_empresa') is-invalid @enderror col-md-12 form-control input-lg" placeholder="Ingresar nombre de la empresa" minlength="5" maxlength="255" required value="{{$cliente->nom_empresa}}">
                                                    @error('nombre_empresa')
                                                    <div class="invalid-feedback">
                                                        {{$message}}|Solo letras y numeros.
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-4 col-form-label">Correo electrónico</label>
                                                    <input type="text" name="correo_electronico" class="@error('correo_electronico') is-invalid @enderror col-sm-12 form-control input-lg" placeholder="Ingresar correo electrónico" required value="{{$cliente->correo_electronico}}">
                                                    @error('correo_electronico')
                                                    <div class="invalid-feedback">
                                                        {{$message}}| No debe llevar espacios.
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
                                                    <label for="inputName" class="col-sm-4 col-form-label">Descripción contrato</label>
                                                    <input type="text" name="descripción_contrato" class="@error('descripción_contrato') is-invalid @enderror col-sm-12 form-control input-lg" placeholder="Ingresar descripción del contrato" minlength="5" maxlength="255" required value="{{$cliente->des_contrato}}">
                                                    @error('descripción_contrato')
                                                    <div class="invalid-feedback">
                                                        {{$message}}| No debe llevar caracteres especiales, comas ni guiones.
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Aqui van los form-group por individual -->
                                                <div class="form-group">
                                                    <label for="inputName" class="col-sm-4 col-form-label">Fecha inicio contrato</label>
                                                    <input type="text" name="fec_ini_contrato" class="@error('fec_ini_contrato') is-invalid @enderror col-sm-12 form-control input-lg" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask value="{{$cliente->fec_ini_contrato}}">
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
                                                    <label for="inputName" class="col-sm-4 col-form-label">Fecha fin contrato</label>
                                                    <input type="text" name="fec_fin_contrato" class="@error('fec_fin_contrato') is-invalid @enderror col-sm-12 form-control input-lg" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask value="{{$cliente->fec_fin_contrato}}">
                                                    @error('fec_ini_contrato')
                                                    <div class="invalid-feedback">
                                                        La fecha debe ser despues hoy.
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
                                                    <label for="exampleFormControlTextarea1" class="form-label">Descripcion de baja</label>
                                                    <textarea name="descripcion_baja" class="form-control" id="exampleFormControlTextarea1" rows="3"> {{$cliente->des_baja}} </textarea>
                                                    @error('descripcion_baja')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 px-5">
                                                <label for="exampleFormControlTextarea1" class="form-label">Estado</label>
                                                @if ($cliente-> estado)
                                                <div class="form-check">
                                                    <input value="{{$cliente-> estado}}" class="form-check-input" type="radio" name="est" id="flexRadioDefault" .{{$cliente->cod_cliente}} checked>
                                                    <label class="form-check-label" for="flexRadioDefault" .{{$cliente->cod_cliente}}> Activo</label>
                                                </div>
                                                <div class="form-check">
                                                    <input value="0" class="form-check-input" type="radio" name="est" id="flexRadioDefault" .{{$cliente->cod_cliente}}>
                                                    <label class="form-check-label" for="flexRadioDefault" .{{$cliente->cod_cliente}}> Inactivo</label>
                                                </div>

                                                @else
                                                <div class="form-check">
                                                    <input value="1" class="form-check-input" type="radio" name="est" id="flexRadioDefault" .{{$cliente->cod_cliente}}>
                                                    <label class="form-check-label" for="flexRadioDefault" .{{$cliente->cod_cliente}}> Activo</label>
                                                </div>
                                                <div class="form-check">
                                                    <input value="{{$cliente-> estado}}" class="form-check-input" type="radio" name="est" id="flexRadioDefault" .{{$cliente->cod_cliente}} checked>
                                                    <label class="form-check-label" for="flexRadioDefault" .{{$cliente->cod_cliente}}> Inactivo</label>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer">
                                <a href="{{route('admin.clientes.index')}}" class="btn btn-danger">Salir</a>
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
                    toastr.success('Actualizacion de cliente en proceso.')
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