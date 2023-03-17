<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SGCM</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" href="{{asset('/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('/adminlte/dist/css/adminlte.min.css')}}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/toastr/toastr.min.css')}}">
</head>
<body style="background-color: #fff">
    <div class="row mt-5 mx-3">
        <div class="col-12">
            <img src="{{asset('imagenes/logo_login.png')}}" class="img-fluid mx-auto d-block" alt="Responsive image" width="20%" height="20%">
        </div>
        <div class="col-md-6">
            <div class="card card-primary mt-3">
                <div class="card-header">
                    <h6>
                        Mis Citas
                    </h6>
                </div>
                <div class="card-body">
                    <div id="table" class="table-editable">
                        {{-- <a href="{{ route('admin.paciente.create') }}" class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i> Crear</a> --}}
                        <table class="table table-bordered table-hover dataTable dtr-inline" id="dtPacientes1">
                        <thead>
                            <tr>
                                <th class="th-sm">Doctor</th>
                                <th class="th-sm">Tipo de Cita</th>
                                <th class="th-sm">Fecha y Hora</th>
                                <th class="th-sm">Sala</th>
                            </tr>
                        </thead>
                        <tbody id="cuerpo1">
                            
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-primary mt-3">
                <div class="card-header">
                    <h6>
                        Citas de Familiares
                    </h6>
                </div>
                <div class="card-body">
                    <div id="table" class="table-editable">
                        {{-- <a href="{{ route('admin.paciente.create') }}" class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i> Crear</a> --}}
                        <table class="table table-bordered table-hover dataTable dtr-inline" id="dtPacientes">
                        <thead>
                            <tr>
                                <th class="th-sm">Paciente</th>
                                <th class="th-sm">Doctor</th>
                                <th class="th-sm">Tipo de Cita</th>
                                <th class="th-sm">Fecha y Hora</th>
                                <th class="th-sm">Sala</th>
                            </tr>
                        </thead>
                        <tbody id="cuerpo">
                            
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-12">
            <h1>No estas conectado a internet.</h1>
        </div>
        <div class="col-md-12">
            <h3 id="user"></h3>
        </div> --}}
    </div>
    <!-- jQuery -->
    <script src="{{asset('/adminlte/plugins/jquery/jquery.min.js')}}"></script>

    <script src="{{asset('/adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('/adminlte/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('/adminlte/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('/adminlte/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('/adminlte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('/adminlte/dist/js/adminlte.min.js')}}"></script>
    <!-- Toastr -->
    <script src="{{asset('adminlte/plugins/toastr/toastr.min.js')}}"></script>

    <!-- JStorage-->
    <script src="{{asset('js/jstorage.js')}}"></script>

    <script>
        var value = $.jStorage.get("citas");
        var value1 = $.jStorage.get("mis_citas");
        // console.log(value);
        // var element = document.getElementById('user').innerHTML = value;

        $(document).ready(function () {
            $('#dtPacientes1').DataTable({
            responsive: true,
            autoWidth: false,

            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "Nada encontrado - disculpa",
                "info": "Mostrando la página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": "Buscar:",
                "paginate": {
                "next": "Siguiente",
                "previous": "Anterior"
                }
            }
            });
            $('.dataTables_length').addClass('bs-select');
        });

        $(document).ready(function () {
            $('#dtPacientes').DataTable({
            responsive: true,
            autoWidth: false,

            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "Nada encontrado - disculpa",
                "info": "Mostrando la página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": "Buscar:",
                "paginate": {
                "next": "Siguiente",
                "previous": "Anterior"
                }
            }
            });
            $('.dataTables_length').addClass('bs-select');
        });

        $('#cuerpo').empty();
        $.each(value, function(i, f){
            console.log(f.paciente);
            $('#cuerpo').append('<tr><td>'+f.paciente+'</td><td>'+f.doctor+'</td><td>'+f.tipo+'</td><td>'+f.inicio+'</td><td>'+f.sala+'</td></tr>');
        });

        $('#cuerpo1').empty();
        $.each(value1, function(i, f){
            console.log(f.paciente);
            $('#cuerpo1').append('<tr><td>'+f.doctor+'</td><td>'+f.tipo+'</td><td>'+f.inicio+'</td><td>'+f.sala+'</td></tr>');
        });
    </script> 
</body>
</html>


    
