@extends('adminlte::page')

@section('title', 'Crear')

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
                        <div class="card-header ">
                            <h3 class="card-title">Agregar Pago</h3>

                        </div>
                        <form action="{{route('admin.planillas.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-body">
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <h5>Datos del Pago</h5>
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-empleado">
                                                        Filtrador de Empleado
                                                    </button>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- Aqui van los form-group por individual -->
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-6 col-form-label">DNI Empleado</label>
                                                        <input type="text" class=" @error('codigo_empleado') is-invalid @enderror col-sm-12 form-control input-lg" name="name_em" id="post-codigo_empleado" disabled>

                                                        <input type="hidden" name="codigo_empleado" id="post-codigo_empleado_hi">
                                                        @error('codigo_empleado')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- Aqui van los form-group por individual -->
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-6 col-form-label">Monto de Pago</label>
                                                        <input type="number" id='monto_pago' name="monto_pago" value="{{old('monto_pago')}}" class="@error('monto_pago') is-invalid @enderror col-sm-12 form-control input-lg" placeholder="Ingresar monto de pago">
                                                        @error('monto_pago')
                                                        <div class="invalid-feedback">
                                                            {{$message}} |Solo se aceptan numeros y decimales sin espacios.
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- Aqui van los form-group por individual -->
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-6 col-form-label">Horas Trabajadas</label>
                                                        <input type="text" name="pago_horas_extras" class="@error('pago_horas_extras') is-invalid @enderror col-sm-12 form-control input-lg" id="input-horas-trabajadas" minlength="2" maxlength="7" disabled>
                                                    </div>
                                                </div>

                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-6 col-form-label">IHSS</label>
                                                        <input type="text" id='ihss' name="ihss" class="@error('ihss') is-invalid @enderror col-sm-12 form-control input-lg" placeholder="Ingresar IHSS" readonly>
                                                        @error('ihss')
                                                        <div class="invalid-feedback">
                                                            {{$message}} |Solo se aceptan numeros y decimales sin espacios.
                                                        </div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-6 col-form-label">RAP</label>
                                                        <input type="text" id='rap' name="rap" class="@error('rap') is-invalid @enderror col-sm-12 form-control input-lg" placeholder="Ingresar RAP" readonly>
                                                        @error('rap')
                                                        <div class="invalid-feedback">
                                                            {{$message}} |Solo se aceptan numeros y decimales sin espacios.
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="">
                                                        <table class="table ">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Descripción
                                                                        <a data-toggle="modal" data-target="#modal-calculo">
                                                                            <i class="fas fa-info-circle "></i>
                                                                        </a>
                                                                    </th>
                                                                    <th scope="col">Totales</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id='tabla'>

                                                                <tr>
                                                                    <td>IHSS: </td>
                                                                    <td id="saldo_ihss"></td>
                                                                <tr>
                                                                    <td>RAP:</td>
                                                                    <td id="saldo_rap"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Vales:</td>
                                                                    <td id="saldo_vales">L. --</td>
                                                                </tr>
                                                            </tbody>
                                                            <tfooter>
                                                                <tr>

                                                                    <th scope="col">Total Deducciones:</th>
                                                                    <th id="total_min">--</th>
                                                                </tr>
                                                                <tr>

                                                                    <th scope="col">Total Pago: </th>
                                                                    <th id="total_">--</th>
                                                                </tr>

                                                            </tfooter>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- Aqui van los form-group por individual -->
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-6 col-form-label">VALES</label>
                                                        <input type="text" name="vales_" id="input-vales" class="@error('vales') is-invalid @enderror col-sm-12 form-control input-lg" placeholder="Ingresar deducciones" disabled>
                                                        <input type="hidden" name="vales" id="post-vales">
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
                                                        <label for="inputName" class="col-sm-6 col-form-label">Fecha pago de planilla</label>
                                                        <input type="date" name="fec_pago_planilla" value="{{old('fec_pago_planilla')}}" class="@error('fec_pago_planilla') is-invalid @enderror col-sm-8 form-control input-lg">
                                                        @error('fec_pago_planilla')
                                                        <div class="invalid-feedback">
                                                            La fecha pago debe ser despues de ayer.
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer">
                                    <a href="{{route('admin.planillas.index')}}" class="btn btn-danger">Salir</a>
                                    <button type="submit" class="btn btn-warning toastrDefaultSuccess">Guardar</button>
                                </div>
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
                        <h4 class="modal-title">Filtrador de Empleado</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class=" col-md-12 form-control" id="codigo_empleado" placeholder=" Ingresar DNI del empleado">
                        <ul class="list-group" id="campo_empleado">
                        </ul>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-calculo">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h4 class="modal-title">Tabla de Calculos</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item"> IVM</li>
                            <li class="list-group-item" id="calculo_IVM"></li>
                        </ul>
                        <ul class="list-group list-group-horizontal-sm">
                            <li class="list-group-item">EFM</li>
                            <li class="list-group-item" id="calculo_EFM"></li>
                        </ul>
                        <ul class="list-group list-group-horizontal-sm">
                            <li class="list-group-item">IHSS</li>
                            <li class="list-group-item" id="calculo_IHSS"></li>
                        </ul>
                        <ul class="list-group list-group-horizontal-sm">
                            <li class="list-group-item">RAP</li>
                            <li class="list-group-item" id="calculo_RAP"></li>
                        </ul>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
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
        <!-- Select2 -->
        <link rel="stylesheet" href="{{  asset('vendor/select2/css/select2.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">

        @stop
        @section('js')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
        <script>
            const montopago = document.querySelector('#monto_pago');
            const RAP = document.querySelector('#rap');
            const IHSS = document.querySelector('#ihss');
            let IVM;
            let SALARIO;
            let sub_rap;
            let RAP_;
            let total;
            let VALES;
            let EFM;
            let total_m;
            let monto = "5004";



            montopago.addEventListener('keyup', async (e) => {
                e.preventDefault();
                let respuesta1 = await fetch(`http://3.16.169.17:3000/api/seguridad/8`);
                let dato_rap = await respuesta1.json();
                dato_rap.map(async (X) => {
                    RAP.value = X.dato * e.target.value;
                    sub_rap = X.dato * e.target.value;
                    document.querySelector("#saldo_rap").innerHTML = `L${X.dato * e.target.value}`

                    document.querySelector("#total_min").innerHTML = `${total + VALES + sub_rap} `
                    total_m = total + VALES + sub_rap;
                    document.querySelector("#total_").innerHTML = `${ e.target.value - total_m } `
                });
            });


            window.addEventListener('DOMContentLoaded', async (e) => {
                let respuesta = await fetch(`http://3.16.169.17:3000/api/seguridad/19`);
                let dato_ivm = await respuesta.json();
                dato_ivm.map(async (X) => {
                    IVM = X.dato;
                });
                let respuesta1 = await fetch(`http://3.16.169.17:3000/api/seguridad/20`);
                let dato_EFM = await respuesta1.json();
                dato_EFM.map(async (X) => {
                    EFM = X.dato;
                });
                let respuesta2 = await fetch(`http://3.16.169.17:3000/api/seguridad/21`);
                let dato_salario = await respuesta2.json();
                dato_salario.map(async (X) => {
                    SALARIO = X.dato;
                });

                let respuesta3 = await fetch(`http://3.16.169.17:3000/api/seguridad/8`);
                let dato_rap = await respuesta3.json();
                dato_rap.map(async (X) => {
                    RAP_ = X.dato;
                });

                const Sub_IVM = SALARIO * IVM;
                const Sub_EFM = SALARIO * EFM;
                total = Sub_EFM + Sub_IVM;
                IHSS.value = total;

                document.querySelector("#calculo_IVM").innerHTML = `   ${IVM} *  ${SALARIO}  `
                document.querySelector("#calculo_EFM").innerHTML = `   ${EFM} *  ${SALARIO}  `
                document.querySelector("#calculo_IHSS").innerHTML = ` IVM + EFM  `
                document.querySelector("#calculo_RAP").innerHTML = `${RAP_} `


                document.querySelector("#saldo_ihss").innerHTML = `L.${total}`;


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
                    list.setAttribute('data-horas', X.hrstrab_emp);
                    list.innerText = `${X.cod_empleado} - ${X.primer_nom} - ${X.primer_apel} - ${X.tipo_empleado}`;

                    document.querySelector('#campo_empleado').appendChild(list);

                })

            });



            document.querySelector('#campo_empleado').addEventListener('click', async (e) => {
                e.preventDefault()

                if (e.target.classList.value == 'list-group-item') {
                    const text = e.target.innerText;
                    document.querySelector('#post-codigo_empleado').value = text.split(' ')[2] + ' ' + text.split(' ')[4] + ' /  ' + text.split(' ')[6];

                    const id_empleado = e.target.getAttribute('data-cod');
                    document.querySelector('#post-codigo_empleado_hi').value = e.target.getAttribute('data-cod')
                    document.querySelector('#input-horas-trabajadas').value = e.target.getAttribute('data-horas')

                    if (e.target.getAttribute('data-horas') >= 120) {

                        let respuesta = await fetch(`http://3.16.169.17:3000/api/vales/monto_vale/${id_empleado}`);
                        let dato_vales = await respuesta.json();
                        document.querySelector("#input-vales").value = ``;
                        dato_vales.map(async (X) => {
                            if(X.vales  == null){
                                VALES = 0
                                document.querySelector("#saldo_vales").innerHTML = `L. 0`;
                                document.querySelector("#input-vales").value = 0;
                                document.querySelector("#post-vales").value = 0;
                            }else{
                                VALES = X.vales;
                                document.querySelector("#input-vales").value = X.vales;
                                document.querySelector("#post-vales").value = X.vales;
                                document.querySelector("#saldo_vales").innerHTML = `L.${X.vales}`;

                            }
                        });



                        document.querySelector('#monto_pago').value = monto;
                        let respuesta1 = await fetch(`http://3.16.169.17:3000/api/seguridad/8`);
                        let dato_rap = await respuesta1.json();

                        dato_rap.map(async (X) => {
                            RAP.value = X.dato * monto;
                            sub_rap = X.dato * monto;

                            document.querySelector("#saldo_rap").innerHTML = `L.${X.dato * monto}`

                            document.querySelector("#total_min").innerHTML = `L.${total + VALES + sub_rap} `

                            total_m = total + VALES + sub_rap;
                            document.querySelector("#total_").innerHTML = `L.${ monto - total_m } `


                        });
                    }



                }
            })


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
                    toastr.success('Registro de pago empleado en proceso.')
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
