@extends('plantilla.plantilla')

@section('titulo','Solicitudes de cita')
    
@section('contenido')
 
<!-- Editable table -->

<div class="card">
    <div class="card-body">
    <div id="table" class="table-editable">
        <table class="table table-bordered table-hover dataTable dtr-inline" id="dtSolicitudes">
        <thead>
            <tr>
                <th class="th-sm">Tipo de cita</th>
                <th class="th-sm">Estado</th>
                <th class="th-sm">Disponibilidad</th>
                <th class="th-sm">Doctor</th>
                <th class="th-sm">Paciente</th>
                <th class="th-sm">Fecha de envio</th>
                <th class="th-sm"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($solicitudes as $solicitud)
            <tr>
                <td>{{$solicitud->tipo_cita}}</td>
                <td>{{$solicitud->estado}}</td>
                <td>{{$solicitud->disponibilidad}}</td>
                <td>{{$solicitud->doctor->nombre}}</td>
                <td>{{$solicitud->paciente->nombre}} {{$solicitud->paciente->tipo_identificacion}} {{$solicitud->paciente->num_identificacion}}</td>
                <td>{{$solicitud->created_at}}</td>
                <td class="th-sm">
                  <ul class="list-inline">
                    <li class="list-inline-item">
                        @if ($solicitud->estado == 'En espera')
                            @include('admin.solicitud.createCita')
                        @endif
                    </li>
                    <li class="list-inline-item">
                        @if ($solicitud->estado == 'En espera')
                            <a href="{{route('admin.solicitud.noAcceptCita', $solicitud->id)}}" class="btn btn-sm btn-danger">Rechazar solicitud</a>
                        @endif
                    </li>
                  </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    </div>
</div>



@endsection

@section('scripts')
  @if(session('eliminar') == 'ok')
    <script>
      Swal.fire(
      '!Eliminado!',
      'El registro ha sido eliminado.',
      'success'
      )
    </script>  
  @endif

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

  $(document).ready(function () {
    $('#dtSolicitudes').DataTable({
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

  $('.formulario-eliminar').submit(function(e){
    e.preventDefault();

    Swal.fire({
      title: '¿Estas seguro?',
      text: "Este registro se eliminara definitivamente",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: '¡Si, eliminar!'
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
      }
    })
  }); 

  $(document).ready(function(){
        $('#especialidades').on('change', loadDoctor);

        function loadDoctor() {
        var especialidad = $('#especialidades').val();
        console.log(especialidad);
        if ($.trim(especialidad) != '') {
            $.get('../doctores', {especialidad: especialidad}, function(doctores) {

            $('#doctores').empty();
            $('#doctores').append('"<option value="">Seleccione un doctor</option>"');

            $.each(doctores, function(index, nombre) {
                $('#doctores').append('"<option value="'+index+'" '+(1 == index ? 'selected' : '')+'>'+nombre+'</option>"');
            });

            });
        }
        }
        loadDoctor();
    });

  //Select2
    $('.select2bs4').select2({
      theme: 'bootstrap4',
      language: "es"
    })
</script>
@endsection

