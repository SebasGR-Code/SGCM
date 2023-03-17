@extends('plantilla.plantilla')

@section('titulo','Afiliados')
    
@section('contenido')
 
<!-- Editable table -->

<div class="card">
    <div class="card-body">
    <div id="table" class="table-editable">
        <div class="d-flex justify-content-end">
          <a href="{{ route('admin.paciente.create') }}" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Crear</a>
        </div>
        <table class="table table-hover dataTable dtr-inline" id="dtPacientes">
        <thead>
            <tr>
                <th class="th-sm">Nombre</th>
                <th class="th-sm">Apellidos</th>
                <th class="th-sm">Identificacion</th>
                <th class="th-sm">Genero</th>
                <th class="th-sm">Estado</th>
                <th class="th-sm"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pacientes as $paciente)
            <tr>
                <td >{{$paciente->nombre}}</td>
                <td>{{$paciente->apellidos}}</td>
                <td>{{$paciente->tipo_identificacion}} {{$paciente->num_identificacion}}</td>
                <td>{{$paciente->genero}}</td>
                <td>
                  @if ($paciente->user->estado == 0)
                   <span class="badge rounded-pill bg-label-success">Activo</span>    
                  @else
                  <span class="badge rounded-pill bg-label-danger">Desactivado</span> 
                  @endif
                </td>
                <td class="th-sm">
                  <ul class="list-inline mt-2">
                    <li class="list-inline-item">
                      <a href="{{ route('admin.paciente.edit', $paciente->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Editar</a>
                    </li>
                    @if ($paciente->user->estado == 0)
                    <li class="list-inline-item">
                      <form action="{{route('admin.paciente.destroy',$paciente->id)}}" class="formulario-eliminar" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash-alt"></i> Desactivar</button>
                      </form>
                    </li>   
                    <li class="list-inline-item">
                      <a href="{{ route('admin.paciente.family-nucleus', $paciente->user->id) }}" class="btn btn-primary btn-sm"><i class="fad fa-users"></i> Familiares</a>
                    </li> 
                    @else
                    <li class="list-inline-item">
                      <a href="{{ route('admin.paciente.activate', $paciente->id) }}" class="btn btn-success btn-sm"> Activar</a>
                    </li>    
                    @endif
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
      'El registro ha sido desactivado.',
      'success'
      )
    </script>  
  @endif

<script>
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

  $('.formulario-eliminar').submit(function(e){
    e.preventDefault();

    Swal.fire({
      title: '¿Estas seguro?',
      text: "Este registro se desactivara",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: '¡Si, desactivar!'
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
      }
    })
  }) 
</script>
@endsection