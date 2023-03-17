@extends('plantilla.plantilla')

@section('titulo','Administradores')
    
@section('contenido')
 
<!-- Editable table -->

<div class="card">
    <div class="card-body">
    <div id="table" class="table-editable">
        <div class="d-flex justify-content-end">
          <a href="{{ route('admin.administrador.create') }}" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Crear</a>
        </div>
        <table class="table table-hover dataTable dtr-inline table-sm" id="dtPacientes">
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
            @foreach ($administradores as $admin)
            <tr>
                <td >{{$admin->nombre}}</td>
                <td>{{$admin->apellidos}}</td>
                <td>{{$admin->tipo_identificacion}} {{$admin->num_identificacion}}</td>
                <td>{{$admin->genero}}</td>
                <td>
                  @if ($admin->user->estado == 0)
                   <span class="badge rounded-pill bg-label-success">Activo</span>    
                  @else
                  <span class="badge rounded-pill bg-label-danger">Desactivado</span> 
                  @endif
                </td>
                <td class="th-sm">
                  <ul class="list-inline mt-2">
                    <li class="list-inline-item">
                      <a href="{{ route('admin.administrador.edit', $admin->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Editar</a>
                    </li>
                    @if ($admin->user->estado == 0)
                    <li class="list-inline-item">
                      <form action="{{route('admin.administrador.destroy',$admin->id)}}" class="formulario-eliminar" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash-alt"></i> Desactivar</button>
                      </form>
                    </li>    
                    @else
                    <li class="list-inline-item">
                      <a href="{{ route('admin.administrador.activate', $admin->id) }}" class="btn btn-success btn-sm"> Activar</a>
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