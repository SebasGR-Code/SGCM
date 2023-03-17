@extends('plantilla.plantilla')

@section('contenido')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Informacion</h4>
                </div>
                <div class="card-body">
                    <!-- the events -->
                    <div id="external-events">
                    <span class="badge rounded-pill bg-success">Terminada</span>
                    <span class="badge rounded-pill bg-warning">Cancelada</span>
                    <span class="badge rounded-pill bg-primary">En espera</span>
                    <span class="badge rounded-pill bg-danger">Sin Asistencia</span>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>    
        </div>
        <div class="col-md-9">
            <div class="container">
                <!-- THE CALENDAR -->
                <div id="agenda"></div>
            </div>
        </div>
    </div>
    @include('paciente.calendar.cita.eventShow')
@endsection

@section('scripts')
<script src="{{asset('js/calendarPaciente.js')}}"></script>
<script>
    $(function () { 
        $('#datetimepicker1').datetimepicker({ 
            locale: 'es',
            icons:{ 
                time: 'fas fa-clock',
                date: 'fas fa-calendar',
                up: 'fas fa-arrow-up',
                down: 'fas fa-arrow-down',
                previous: 'fas fa-arrow-circle-left',
                next: 'fas fa-arrow-circle-right',
                today: 'far fa-calendar-check-o',
                clear: 'fas fa-trash',
                close: 'far fa-times' 
            } 
        });

        $('#datetimepicker2').datetimepicker({ 
            locale: 'es',
            icons:{ 
                time: 'fas fa-clock',
                date: 'fas fa-calendar',
                up: 'fas fa-arrow-up',
                down: 'fas fa-arrow-down',
                previous: 'fas fa-arrow-circle-left',
                next: 'fas fa-arrow-circle-right',
                today: 'far fa-calendar-check-o',
                clear: 'fas fa-trash',
                close: 'far fa-times' 
            } 
        });
    });

    //Select2
    $('.select2bs4').select2({
      theme: 'bootstrap4',
      language: "es"
    })
</script>
@endsection