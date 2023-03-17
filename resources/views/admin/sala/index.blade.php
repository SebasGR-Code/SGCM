@extends('plantilla.plantilla')

@section('titulo','Salas')
    
@section('contenido')
 
<!-- Editable table -->

<div class="card">
    <div class="card-body">
    <div id="table" class="table-editable">
        <div class="d-flex justify-content-end">
          @include('admin.sala.create')
        </div>
        <table class="table table-hover dataTable dtr-inline table-sm" id="dtSalas">
        <thead>
            <tr>
                <th class="th-sm">Nombre</th>
                <th class="th-sm">Doctor</th>
                <th class="th-sm"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($salas as $sala)
            <tr>
                <td>{{$sala->nombre}}</td>
                @if ($sala->doctor != null)
                    <td>{{$sala->doctor->nombre}} {{$sala->doctor->apellidos}}</td>
                @else
                    <td>Sin doctor aún</td> 
                @endif
                
                <td>
                    <ul class="list-inline mt-2">
                        <li class="list-inline-item">
                        <form action="{{route('admin.sala.destroy',$sala->id)}}" class="formulario-eliminar" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash-alt"></i> Eliminar</button>
                        </form>
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
      'La sala ha sido eliminada.',
      'success'
      )
    </script>  
  @endif

<script>
  $(document).ready(function () {
    $('#dtSalas').DataTable({
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
      text: "Esta sala se eliminara definitivamente",
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
  }) 
</script>
@endsection

