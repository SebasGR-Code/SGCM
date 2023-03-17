<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        {{-- <link rel="shortcut icon" href="{{ asset('logo_control.ico') }}"> --}}
    <title>SGCM</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->

    <link rel="stylesheet" href="{{asset('/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset('/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">

    <link rel="stylesheet" href="{{asset('/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- fullCalendar -->
    <link href="{{asset('/fullcalendar/lib/main.css')}}" rel="stylesheet">
    @yield('estilos')

    <script type="text/javascript">
        var baseURL = {!! json_encode(url('/')) !!}
    </script>

    <link rel="stylesheet" href="{{asset('/adminlte/dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    {{-- Etiqueta para el PWA --}}
    @laravelPWA
    {{-- Estilos y scripts de livewire --}}
    @livewireStyles
    @livewireScripts
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark navbar-primary">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    
                </li>
            </ul>
            
            <ul class="navbar-nav ml-auto nav-flex-icons">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     @if (Auth::user()->rol == 'Admin')
                      Admin <i class="fas fa-user"></i>
                     @elseif (Auth::user()->rol == 'Doctor')  
                      Doctor<i class="fas fa-user"></i>
                    @elseif (Auth::user()->rol == 'Paciente') 
                      Paciente<i class="fas fa-user"></i>
                    @endif     
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink-333">
                    <a class="dropdown-item waves-effect waves-light" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        Cerrar sesión
                    </a>
          
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf  </form>
                </div>
                </li>
            </ul>




        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{route('admin')}}" class="brand-link navbar-primary">
                <img src="{{asset('imagenes/logo2.png')}}" alt=""
                    class="brand-image" style="opacity: .8; margin-left: .3rem">
            <span class="brand-text font-weight-light">SGCitasMedicas</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                    <img src="/imagenes/sin-foto.png" class="img-circle elevation-2">
                    </div>
                    <div class="info">
                        @if (Auth::user()->rol == 'Admin')
                            <a href="#" class="d-block">{{Auth::user()->admin->nombre}} {{Auth::user()->admin->apellidos}}</a>
                        @elseif (Auth::user()->rol == 'Paciente')
                            <a href="#" class="d-block">{{Auth::user()->paciente->nombre}} {{Auth::user()->paciente->apellidos}}</a>
                        @elseif (Auth::user()->rol == 'Doctor')
                            <a href="#" class="d-block">{{Auth::user()->doctor->nombre}} {{Auth::user()->doctor->apellidos}}</a>
                        @endif
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">

                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ route('user.password') }}" class="nav-link {{ request()->routeIs('user.password') ? 'active' : '' }}" activa>
                                <i class="fas fa-lock nav-icon"></i>

                                <p>
                                    Cambiar contraseña
                                </p>
                            </a>
                        </li> 
                        @if (Auth::user()->rol == 'Admin')
                            <li class="nav-header">USUARIOS</li>
                            <li class="nav-item has-treeview {{ request()->routeIs('admin.administrador*') ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link {{ request()->routeIs('admin.administrador*') ? 'active' : '' }}" activa>
                                    <i class="nav-icon fas fa-user"></i>

                                    <p>
                                        Administradores
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.administrador.index') }}" class="nav-link {{ request()->routeIs('admin.administrador.index') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Ver administradores</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.administrador.create') }}" class="nav-link {{ request()->routeIs('admin.administrador.create') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Crear administrador</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li class="nav-item has-treeview {{ request()->routeIs('admin.paciente*') ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link {{ request()->routeIs('admin.paciente*') ? 'active' : '' }}" activa>
                                    <i class="nav-icon fas fa-user"></i>

                                    <p>
                                        Afiliados
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.paciente.index') }}" class="nav-link {{ request()->routeIs('admin.paciente.index') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Ver afiliados</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.paciente.create') }}" class="nav-link {{ request()->routeIs('admin.paciente.create') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Crear afiliado</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="nav-item has-treeview {{ request()->routeIs('admin.doctor*') ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link {{ request()->routeIs('admin.doctor*') ? 'active' : '' }}" activa>
                                    <i class="nav-icon fas fa-user-md"></i>

                                    <p>
                                        Doctores
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.doctor.index') }}" class="nav-link {{ request()->routeIs('admin.doctor.index') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Ver doctores</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.doctor.create') }}" class="nav-link {{ request()->routeIs('admin.doctor.create') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Crear doctor</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li class="nav-header">INSTALACIONES</li>
                            <li class="nav-item">
                                <a href="{{ route('admin.sala.index') }}" class="nav-link {{ request()->routeIs('admin.sala*') ? 'active' : '' }}" activa>
                                    <i class="fas fa-door-closed nav-icon"></i>

                                    <p>
                                        Salas
                                    </p>
                                </a>
                            </li>
                            <li class="nav-header">CITAS</li>
                            <li class="nav-item">
                                <a href="{{ route('admin.calendar.index') }}" class="nav-link {{ request()->routeIs('admin.calendar*') ? 'active' : '' }}" activa>
                                    <i class="fas fa-calendar-alt nav-icon"></i>

                                    <p>
                                        Calendario
                                    </p>
                                </a>
                            </li> 
                            <li class="nav-item">
                                <a href="{{ route('admin.solicitud.index') }}" class="nav-link {{ request()->routeIs('admin.solicitud*') ? 'active' : '' }}" activa>
                                    <i class="fas fa-thumbtack nav-icon"></i>

                                    <p>
                                        Solicitudes
                                    </p>
                                </a>
                            </li>    
                        @endif
                        @if (Auth::user()->rol == 'Paciente')
                            <li class="nav-header">CITAS</li>
                            <li class="nav-item">
                                <a href="{{ route('paciente.calendar.index') }}" class="nav-link {{ request()->routeIs('paciente.calendar*') ? 'active' : '' }}" activa>
                                    <i class="fas fa-calendar-alt nav-icon"></i>

                                    <p>
                                        Calendario
                                    </p>
                                </a>
                            </li>  
                            <li class="nav-item">
                                <a href="{{ route('paciente.solicitud.index') }}" class="nav-link {{ request()->routeIs('paciente.solicitud*') ? 'active' : '' }}" activa>
                                    <i class="fas fa-thumbtack nav-icon"></i>

                                    <p>
                                        Solicitudes
                                    </p>
                                </a>
                            </li>     
                        @endif
                        @if (Auth::user()->rol == 'Doctor')
                            <li class="nav-header">CITAS</li>
                            <li class="nav-item">
                                <a href="{{ route('doctor.calendar.index') }}" class="nav-link {{ request()->routeIs('doctor.calendar*') ? 'active' : '' }}" activa>
                                    <i class="fas fa-calendar-alt nav-icon"></i>

                                    <p>
                                        Calendario
                                    </p>
                                </a>
                            </li>     
                        @endif

                            <!--<li class="nav-item has-treeview">
                                <a href="#" class= "nav-link">
                                    
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Usuarios
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="" 
                                        class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Listado Personal</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Crear Personal</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="nav-item has-treeview">
                                <a href="#" class= "nav-link">
                                    
                                    <i class="nav-icon fas fa-calendar-check"></i>
                                    <p>
                                        Turnos
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="" 
                                        class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Listado Turnos</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Crear Turno</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="nav-item has-treeview">
                                <a href="" class="nav-link" activa>
                                    
                                    <i class="nav-icon fas fa-list"></i>
                                    <p>
                                        Ordenes
                                        
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link" activa>
                                    
                                    <i class="nav-icon fas fa-cash-register"></i>
                                    <p>
                                        Compras
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Listado de compras</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Registrar compra</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="nav-item has-treeview">
                                <a href="" class="nav-link" activa>
                                    
                                    <i class="nav-icon fas fa-clipboard-check"></i>
                                    <p>
                                        Ventas
                                        
                                    </p>
                                </a>
                            </li>-->
                            

                    </ul>
                    
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>@yield('titulo')</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                
                                @yield('breadcrumb')

                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                @yield('contenido')

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->



        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    
    <!-- jQuery -->
    <script src="{{asset('/adminlte/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

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
    <script src="{{asset('/adminlte/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <script src="{{asset('/adminlte/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('adminlte/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('adminlte/plugins/select2/js/i18n/es.js')}}"></script>
    <!-- fullCalendar -->
    <script type="text/javascript" src="{{asset('/fullcalendar/lib/main.js')}}"></script>
    <script type="text/javascript" src="{{asset('/fullcalendar/lib/locales-all.js')}}"></script>
    <script src="{{asset('adminlte/plugins/moment/moment.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('/adminlte/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('/adminlte/dist/js/demo.js')}}"></script>
    <!-- Aviso de https://sweetalert2.github.io/-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <!-- Axios-->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
     <!-- JStorage-->
    <script src="{{asset('js/jstorage.js')}}"></script>

    @php
        if (Auth::user()->rol == 'Paciente') {
            $nucleo = App\Models\Nucleo::where('user_id', Auth::user()->id)->pluck('paciente_id');
            $citas = App\Models\Cita::whereIn('paciente_id', $nucleo)->where('estado', 'En espera')->get();

            $arrayFamiliares = [];
            for ($i=0; $i < count($citas); $i++) { 
                $arrayFamiliares[$i] = [
                    'tipo' => $citas[$i]->title,
                    'inicio' => Carbon\Carbon::parse($citas[0]->start)->format('d/m/Y h:i A'),
                    'fin' => Carbon\Carbon::parse($citas[0]->end)->format('d/m/Y h:i A'),
                    'doctor' => $citas[$i]->doctor->nombre." ".$citas[$i]->doctor->apellidos,
                    'paciente' => $citas[$i]->paciente->nombre." ".$citas[$i]->paciente->apellidos,
                    'sala' => $citas[$i]->doctor->sala->nombre
                ];
            }
        }
    @endphp

    @if (Auth::user()->rol == 'Paciente')   
        <script>
            // console.log({{ Illuminate\Support\Js::from($arrayFamiliares) }});
            $.jStorage.set("citas", {{ Illuminate\Support\Js::from($arrayFamiliares) }});
        </script>
    @endif
    
    @yield('scripts')

    <script>
        //Mensaje de alerta para usar en cualquier caso
        Livewire.on('swal', function (type, message) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-right',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: type,
                title: message
            })
        });
    </script>
    
    @if(session('datos'))
        <script>
            $(function () {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });

                Toast.fire({
                    icon: 'success',
                    title: '{{session('datos')}}'
                })
            })
        </script>  
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
            $(function () {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });

                Toast.fire({
                    icon: 'error',
                    title: '{{$error}}'
                })
            })
            </script> 
        @endforeach
    @endif

    @if(session('cancelar'))
        <script>
            $(function () {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });

                Toast.fire({
                    icon: 'info',
                    title: '{{session('cancelar')}}'
                })
            })
        </script>  
    @endif

</body>

</html>
