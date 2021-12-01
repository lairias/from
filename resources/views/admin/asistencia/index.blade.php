@extends('adminlte::page')

@section('title', 'Ingresar')

@section('content_header')
<h1>Asistencia </h1>
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
                            <h3 class="card-title">{{\Carbon\Carbon::parse(\Carbon\Carbon::now())->formatLocalized('%d de %B  del %Y ')}}
                            </h3>
                        </div>


                        <div class="col-md-10  ">

                            <div class="col-md-2 p-2 ">
                                <button type="button" id="eliminar" class="eliminar btn btn-warning">
                                    <a href="{{route('admin.asistencia.create')}}">
                                        Validar Asistencia
                                    </a>
                                </button>
                            </div>
                            <table class="table ">
                                <thead>
                                    <th scope="col">Primer Nombre</th>
                                    <th scope="col">Primer Apellido</th>
                                    <th scope="col">DNI</th>
                                    <th scope="col">Tipo Empleado</th>
                                    <th scope="col">Acción</th>
                                </thead>
                                <tbody id='tabla'>
                                    @foreach ($empleados as $empleado)
                                    <tr>
                                        <td> {{$empleado->primer_nom}}</td>
                                        <td> {{$empleado->primer_apel}}</td>
                                        <td> {{$empleado->rtn_persona}}</td>
                                        <td> {{$empleado->tipo_empleado}}</td>


                                        @foreach($asistencias[0] as $asistencia)
                                        @if(\Carbon\Carbon::parse(\Carbon\Carbon::now())->format('M d Y') <= \Carbon\Carbon::parse($asistencia->fec_asistencia)->format('M d Y'))
                                        <td> true</td>
                                        {{\Carbon\Carbon::parse(\Carbon\Carbon::now())->format('M d Y')}} / {{ \Carbon\Carbon::parse($asistencia->fec_asistencia)->format('M d Y')}}  
                                        <br>
                                        @break
                                        @else
                                        <td> listo</td>
                                        @break
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal de empleados-->
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
        <!-- Modal de clientes-->



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
            const mes_actual = new Date()
            document.querySelector("#codigo_empleado").addEventListener('keypress', async e => {
                const respuesta = await fetch(`http://3.16.169.17:3000/api/personas/buscar/${e.target.value}`);
                const encontrado = await respuesta.json();
                document.querySelector('#campo_empleado').innerHTML = ``;

                encontrado.map(X => {
                    const list = document.createElement('li');
                    const span = document.createElement('span');
                    list.classList.add('list-group-item');
                    list.setAttribute('data-cod', X.cod_persona);
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



            const fecha = document.querySelector("#fecha");




            fecha.addEventListener('change', e => {
                $('button').attr('data-fecha', e.target.value)
                $(':button').prop('disabled', false);
            })








            $(document).on('click', '.eliminar', function(event) {
                event.preventDefault();

                const codigo = document.querySelector("#eliminar").getAttribute('data-cod');
                const fecha_final = document.querySelector("#eliminar").getAttribute('data-fecha');


                const data = {
                    cod: codigo,
                    fec_fin_contrato: fecha_final
                }
                const options = {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data),
                }
                fetch(`http://3.16.169.17:3000/api/empleados/contrato/${codigo}`, options).then(repuesta => {})

                location.reload();

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