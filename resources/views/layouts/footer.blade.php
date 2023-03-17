<!-- / Layout wrapper -->
<script src="{{asset('sneat/assets/vendor/js/helpers.js')}}"></script>
<script src="{{asset('sneat/assets/js/config.js')}}"></script>
<script src="{{asset('sneat/assets/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{asset('sneat/assets/vendor/libs/popper/popper.js')}}"></script>
<script src="{{asset('sneat/assets/vendor/js/bootstrap.js')}}"></script>
<script src="{{asset('sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{asset('sneat/assets/vendor/js/menu.js')}}"></script>
<script src="{{asset('sneat/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
<script src="{{asset('sneat/assets/js/main.js')}}"></script>
<script src="{{asset('sneat/assets/js/dashboards-analytics.js')}}"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
<script src="{{asset('js/search.js')}}"></script>
<script src="{{asset('js/jstorage.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>

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

<!-- Select2 -->
<script src="{{asset('adminlte/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/select2/js/i18n/es.js')}}"></script>
<!-- fullCalendar -->
<script type="text/javascript" src="{{asset('/fullcalendar/lib/main.js')}}"></script>
<script type="text/javascript" src="{{asset('/fullcalendar/lib/locales-all.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Axios-->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<!-- JStorage-->
<script src="{{asset('js/jstorage.js')}}"></script>

@php
    if (Auth::user()->rol == 'Paciente') {
        $nucleo = App\Models\Nucleo::where('user_id', Auth::user()->id)->pluck('paciente_id');
        $citas = App\Models\Cita::whereIn('paciente_id', $nucleo)->where('estado', 'En espera')->get();
        $mis_citas = App\Models\Cita::where('paciente_id', Auth::user()->paciente->id)->where('estado', 'En espera')->get();

        $arrayFamiliares = [];
        $arrayMisCitas = [];
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

        for ($i=0; $i < count($mis_citas); $i++) { 
            $arrayMisCitas[$i] = [
                'tipo' => $mis_citas[$i]->title,
                'inicio' => Carbon\Carbon::parse($mis_citas[0]->start)->format('d/m/Y h:i A'),
                'fin' => Carbon\Carbon::parse($mis_citas[0]->end)->format('d/m/Y h:i A'),
                'doctor' => $mis_citas[$i]->doctor->nombre." ".$mis_citas[$i]->doctor->apellidos,
                'paciente' => $mis_citas[$i]->paciente->nombre." ".$mis_citas[$i]->paciente->apellidos,
                'sala' => $mis_citas[$i]->doctor->sala->nombre
            ];
        }
    }
@endphp

@if (Auth::user()->rol == 'Paciente')   
    <script>
        // console.log({{ Illuminate\Support\Js::from($arrayFamiliares) }});
        $.jStorage.set("citas", {{ Illuminate\Support\Js::from($arrayFamiliares) }});
        $.jStorage.set("mis_citas", {{ Illuminate\Support\Js::from($arrayMisCitas) }});
    </script>
@endif

@yield('scripts')

<script>
    //Mensaje de alerta para usar en cualquier caso
    Livewire.on('swal', function (type, message) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'bottom',
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

@stack('js')

{{-- Si sale error 419 page expired recargamos la pagina --}}
<script>
  window.livewire.onError(statusCode => {
    if (statusCode === 419) {
        location.reload();

        return false
    }
  })
</script>

@if(session('datos'))
        <script>
            $(function () {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'bottom',
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
                    position: 'bottom',
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

    @if(session('fallo'))
        <script>
            $(function () {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'bottom',
                    showConfirmButton: false,
                    timer: 3000
                });

                Toast.fire({
                    icon: 'error',
                    title: '{{session('cancelar')}}'
                })
            })
        </script>  
    @endif

    @if(session('cancelar'))
        <script>
            $(function () {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'bottom',
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
