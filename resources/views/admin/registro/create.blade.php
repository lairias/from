@extends('adminlte::page')

@section('title', 'Crear')

@section('content_header')
<h1>Registro diario</h1>
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
                            <h3 class="card-title">Agregar Registro</h3>
                        </div>
                        <form action="{{route('admin.registros.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-body">
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <h5>Datos del Registro</h5>
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <!-- Aqui van los form-group por individual -->
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-empleado">
                                                        Filtrador de Empleado
                                                    </button>
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-6 col-form-label">DNI Empleado</label>
                                                        <input type="text" class=" @error('codigo_empleado') is-invalid @enderror col-sm-12 form-control input-lg" name="name_em" id="post-codigo_empleado" disabled>

                                                        <input type="hidden" name="codigo_empleado" id="post-codigo_empleado_hi">
                                                        @error('codigo_empleado')
                                                        <div class="invalid-feedback">
                                                            {{$message}} |Seleccione un empleado.
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- Aqui van los form-group por individual -->
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-cliente">
                                                        Filtrador de Cliente
                                                    </button>
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-6 col-form-label">DNI Cliente</label>
                                                        <input class=" @error('codigo_cliente') is-invalid @enderror col-sm-12 form-control input-lg" name="codigo_cli" id="post-codigo_cliente" disabled>
                                                        <input type="hidden" name="codigo_cliente" id="post-codigo_cliente_hi">
                                                        @error('codigo_cliente')
                                                        <div class="invalid-feedback">
                                                            {{$message}} |Seleccione un cliente.
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- Aqui van los form-group por individual -->
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-lg">
                                                        Filtrador de Recurso
                                                    </button>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="inputName" class="col-sm-8 col-form-label">Serie Recurso</label>
                                                                <input type="text" class="  col-sm-12 form-control input-lg" name="codigo_recurso" id="post-codigo_recurso"disabled>

                                                            </div>
                                                            <div class="col-md-2">
                                                                <label for="inputName" class="col-ms-4 col-form-label">Cantidad</label>
                                                                <input type="number" class="  col-sm-12 form-control input-lg" name="codigo_recurso" id="post-cantidad_recurso">

                                                            </div>
                                                            <div class="col-md-2">
                                                                <label for="inputName" class="col-ms-4 col-form-label">Acción</label>
                                                                <button id="agregar" class="btn btn-primary">Agregar </button>
                                                            </div>
                                                        </div>

                                                        @error('codigo_recurso')
                                                        <div class="invalid-feedback">
                                                            {{$message}} |Seleccione un recurso.
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6  ">
                                                    <table class="table ">
                                                        <thead>
                                                            <h2 class="d-none" id="total"> Asignado : </h2>
                                                            <tr>
                                                                <th scope="col">Nombre Recurso</th>
                                                                <th scope="col">Cantidad</th>
                                                                <th scope="col">Acción</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id='tabla'>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <!-- Aqui van los form-group por individual -->
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-6 col-form-label">Fecha Asignado</label>
                                                        <input type="date" name="fec_asignado" value="{{old('fec_asignado')}}" class="@error('fec_asignado') is-invalid @enderror form-control input-lg" placeholder="Ingresar fecha asignada">
                                                        @error('fec_asignado')
                                                        <div class="invalid-feedback">
                                                            La fecha de empleado asignado debe ser despues de ayer.
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- Aqui van los form-group por individual -->
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-6 col-form-label">Turno Asignado</label>
                                                        <select class="@error('turno_asignado') is-invalid @enderror col-sm-12 form-control input-lg" name="turno_asignado" value="{{old('turno_asignado')}}" id="turno_asignado">
                                                            <option read only value="">Seleccionar tipo</option>
                                                            <option value="Matutina" @if (old('turno_asignado')=="Matutina" ) {{ 'selected' }} @endif>Matutina</option>
                                                            <option value="Vespertina" @if (old('turno_asignado')=="Vespertina" ) {{ 'selected' }} @endif>Vespertina</option>
                                                            <option value="Nocturna" @if (old('turno_asignado')=="Nocturna" ) {{ 'selected' }} @endif>Nocturna</option>
                                                        </select>
                                                        @error('turno_asignado')
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
                                    <a href="{{route('admin.registros.index')}}" class="btn btn-danger">Salir</a>
                                    <button type="submit" class="btn btn-warning toastrDefaultSuccess">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal de reccursos-->
        <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h4 class="modal-title">Filtrador de Recursos</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class=" col-md-12 form-control" id="codigo" placeholder=" Ingresar serial del recurso">
                        <ul class="list-group" id="campo">
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
        <!-- Modal de empleados-->
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
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- Modal de clientes-->
        <div class="modal fade" id="modal-cliente">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h4 class="modal-title">Filtrador de Cliente</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class=" col-md-12 form-control" id="codigo_cliente" placeholder=" Ingresar DNI del cliente">
                        <ul class="list-group" id="campo_cliente">
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
        <!--  -->
        <link rel="stylesheet" href="{{  asset('vendor//css/.min.css')}}">
        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="{{  asset('vendor/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
        <!-- Toastr -->
        <link rel="stylesheet" href="{{  asset('vendor/toastr/toastr.min.css')}}">
        <!--  -->
        <link rel="stylesheet" href="{{  asset('vendor//css/.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs//4.0.6-rc.0/css/.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/-bootstrap4-theme@x.x.x/dist/-bootstrap4.min.css">

        @stop
        @section('js')

        <script src="https://cdnjs.cloudflare.com/ajax/libs//4.0.6-rc.0/js/.min.js"></script>
        <script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Page specific script -->


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
        <!--  -->
        <script src="{{  asset('vendor//js/.full.min.js')}}"></script>
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
            document.querySelector("#post-codigo_recurso").addEventListener('keydown', async e => {
                if (e.keyCode === 13) {
                    const respuesta = await fetch(`http://3.16.169.17:3000/api/recursos/buscar/${e.target.value}`);
                    const encontrado = await respuesta.json();
                    encontrado.map(X => {

                        document.querySelector('#post-codigo_recurso').value = `${X.des_recurso}`
                        document.querySelector('#post-cantidad_recurso').setAttribute('max', X.cantidad);
                        document.querySelector('#post-codigo_recurso').setAttribute('data-cod', X.cod_recurso);
                    })
                    e.preventDefault()

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
                    list.innerText = `${X.cod_persona} - ${X.primer_nom} - ${X.primer_apel}`;
                    document.querySelector('#campo_empleado').appendChild(list);
                })

            });

            document.querySelector('#campo_empleado').addEventListener('click', (e) => {
                e.preventDefault()
                if (e.target.classList.value == 'list-group-item') {
                    const text = e.target.innerText;
                    document.querySelector('#post-codigo_empleado').value = text.split(' ')[2] + ' ' + text.split(' ')[4];

                    document.querySelector('#post-codigo_empleado_hi').value = e.target.getAttribute('data-cod')


                }
            })
            // funcion de cliente
            document.querySelector("#codigo_cliente").addEventListener('keypress', async e => {
                const respuesta = await fetch(`http://3.16.169.17:3000/api/clientes/buscar/${e.target.value}`);
                const encontrado = await respuesta.json();
                document.querySelector('#campo_cliente').innerHTML = ``;

                encontrado.map(X => {

                    const list = document.createElement('li');
                    const span = document.createElement('span');
                    list.classList.add('list-group-item');
                    list.setAttribute('data-cod', X.cod_cliente);
                    list.innerText = `${X.cod_cliente} - ${X.primer_nom} - ${X.primer_apel}`;
                    document.querySelector('#campo_cliente').appendChild(list);
                })

            });

            document.querySelector('#campo_cliente').addEventListener('click', (e) => {
                e.preventDefault()
                if (e.target.classList.value == 'list-group-item') {
                    const text = e.target.innerText;
                    document.querySelector('#post-codigo_cliente').value = text.split(' ')[2] + ' ' + text.split(' ')[4];

                    document.querySelector('#post-codigo_cliente_hi').value = e.target.getAttribute('data-cod')


                }
            })

            document.querySelector("#codigo").addEventListener('keypress', async e => {
                const respuesta = await fetch(`http://3.16.169.17:3000/api/recursos/buscar/${e.target.value}`);
                const encontrado = await respuesta.json();
                document.querySelector('#campo').innerHTML = ``;

                encontrado.map(X => {
                    const list = document.createElement('li');
                    const span = document.createElement('span');
                    list.classList.add('list-group-item');
                    span.classList.add('badge');
                    span.classList.add('bg-primary');
                    span.classList.add('rounded-pill');
                    span.classList.add('mx-2');
                    list.setAttribute('data-cod', X.cod_recurso)
                    span.innerHTML = `${X.cantidad}`;
                    list.innerText = `${X.cod_recurso} - ${X.des_recurso}`;
                    list.value = `${X.cantidad}`;
                    list.appendChild(span)
                    document.querySelector('#campo').appendChild(list);
                })


            });
            document.querySelector('#campo').addEventListener('click', (e) => {
                e.preventDefault()
                if (e.target.classList.value == 'list-group-item') {
                    const text = e.target.innerText;
                    document.querySelector('#post-codigo_recurso').value = text.split(' ')[2] + ' ' + text.split(' ')[3] + ' ' + text.split(' ')[4];
                    document.querySelector('#post-codigo_recurso').setAttribute('data-cod', e.target.getAttribute('data-cod'));
                    document.querySelector('#post-cantidad_recurso').setAttribute('max', e.target.value);

                }
            })

            document.querySelector('#agregar').addEventListener('click', e => {
                e.preventDefault()
                const recurso = document.querySelector('#post-codigo_recurso').value;
                const cantidad = document.querySelector('#post-cantidad_recurso').value;
                const id = document.querySelector('#post-codigo_recurso').getAttribute('data-cod');
                if (cantidad != '') {
                    const asignado = ` <tr >
                <input type="hidden" name="recursos[]" value="${id}" >
                <input type="hidden" name="cantidad[]" value="${cantidad}" >
                                                                <td>${recurso}</td>
                                                                <td>${cantidad}</td>
                                                                  <td>   <button type="button" id="eliminar"  data-cod="${id}" data-cantidad="${cantidad}"  class="eliminar btn btn-warning" onclick='eliminar(e)'> Eliminar
                                                    </button>
                                                    </td>
                                                            </tr>`
                    document.querySelector("#tabla").innerHTML += asignado;

                    const data = {
                        cod: document.querySelector('#post-codigo_recurso').getAttribute('data-cod'),
                        cantidad: document.querySelector('#post-cantidad_recurso').value
                    }
                    const options = {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(data),
                    }
                    const id_f = document.querySelector('#post-codigo_recurso').getAttribute('data-cod');
                    fetch(`http://3.16.169.17:3000/api/recursos/cantidad-menos/${id_f}`, options).then(repuesta => {})

                    document.querySelector('#post-codigo_recurso').value = ``;
                    document.querySelector('#post-codigo_recurso').setAttribute('data-cod', null);
                    document.querySelector('#post-cantidad_recurso').setAttribute('max', null);
                    document.querySelector('#post-cantidad_recurso').value = ``;
                }




            })





            $(document).on('click', '.eliminar', function(event) {
                event.preventDefault();

                const codigo = document.querySelector("#eliminar").getAttribute('data-cod');
                const canti = document.querySelector("#eliminar").getAttribute('data-cantidad');

                const data = {
                    cod: codigo,
                    cantidad: canti
                }
                const options = {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data),
                }
                const id_f = document.querySelector('#post-codigo_recurso').getAttribute('data-cod');
                fetch(`http://3.16.169.17:3000/api/recursos/cantidad-mas/${codigo}`, options).then(repuesta => {})


                $(this).closest('tr').remove();
            });
        </script>



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
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });

                $('.swalDefaultSuccess').click(function() {
                    Toast.fire({
                        icon: 'success',
                        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                    })
                });
                $('.swalDefaultInfo').click(function() {
                    Toast.fire({
                        icon: 'info',
                        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                    })
                });
                $('.swalDefaultError').click(function() {
                    Toast.fire({
                        icon: 'error',
                        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                    })
                });
                $('.swalDefaultWarning').click(function() {
                    Toast.fire({
                        icon: 'warning',
                        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                    })
                });
                $('.swalDefaultQuestion').click(function() {
                    Toast.fire({
                        icon: 'question',
                        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                    })
                });

                $('.toastrDefaultSuccess').click(function() {
                    toastr.success('Registro Creado Exitosamente.')
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
