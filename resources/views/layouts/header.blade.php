<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="description" content="" />
<link rel="shortcut icon" href="{{ asset('logo_control.ico') }}">
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
  href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
  rel="stylesheet" />
<link rel="stylesheet" href="{{asset('sneat/assets/vendor/fonts/boxicons.css')}}" />
<link rel="stylesheet" href="{{asset('sneat/assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
<link rel="stylesheet" href="{{asset('sneat/assets/vendor/css/theme-default.css')}}"
  class="template-customizer-theme-css" />
<link rel="stylesheet" href="{{asset('sneat/assets/css/demo.css')}}" />
<link rel="stylesheet" href="{{asset('sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

<link rel="stylesheet" href="{{asset('sneat/assets/vendor/libs/apex-charts/apex-charts.css')}}" />

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="{{asset('css/trafo.css')}}">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

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

<style>
  .verde{
    fill: rgb(35, 184, 35, 0.5)!important;          
  }

  g:hover {
    cursor: pointer;
  }

  .sombreado{
    filter: drop-shadow(3px 5px 2px rgb(0 0 0 / 0.4));
  }

  .swal2-container {
    z-index: 20000 !important;
  }
</style>

<script type="text/javascript">
    var baseURL = {!! json_encode(url('/')) !!}
</script>

<!-- Scripts -->
{{-- <script src="{{ mix('js/app.js'). '?version='. Str::random() }}"></script> --}}
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}
{{-- Etiqueta para el PWA --}}
@laravelPWA

@livewireStyles
@livewireScripts