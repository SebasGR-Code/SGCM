@extends('plantilla.plantilla')

@section('titulo','Mis solicitudes')
    
@section('contenido')
 
<!-- Editable table -->

<div class="card">
    <div class="card-body">
    <div id="table" class="table-editable">
        <div class="d-flex justify-content-end">
          @include('paciente.solicitud.create')
        </div>
        <table class="table table-hover dataTable dtr-inline table-sm" id="dtSolicitudes">
        <thead>
            <tr>
                <th class="th-sm">Tipo de cita</th>
                <th class="th-sm">Estado</th>
                <th class="th-sm">Doctor</th>
                <th class="th-sm"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($solicitudes as $solicitud)
            <tr>
                <td>{{$solicitud->tipo_cita}}</td>
                <td>{{$solicitud->estado}}</td>
                <td>{{$solicitud->doctor->nombre}} {{$solicitud->doctor->apellidos}}</td>
                <td class="th-sm">
                  <ul class="list-inline">
                    <li class="list-inline-item">
                        @if ($solicitud->estado == 'En espera')
                        <a href="{{route('paciente.solicitud.cancelSolicitud', $solicitud->id)}}" class="btn btn-danger btn-sm mt-2">Cancelar solicitud</a>
                        @endif
                    </li>
                    <li class="list-inline-item">
                      
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
            var old = $('#doctores').data('old') != '' ? $('#doctores').data('old') : '';

            $('#doctores').empty();
            $('#doctores').append('"<option value="">Seleccione un doctor</option>"');

            $.each(doctores, function(index, nombre) {
                $('#doctores').append('"<option value="'+index+'" '+(old == index ? 'selected' : '')+'>'+nombre+'</option>"');
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

