@extends('plantilla.plantilla')

    
@section('contenido')

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Editar doctor</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('admin.doctor.update',$doctor->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa el nombre" value="{{$doctor->nombre}}">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ingresa los apellidos" value="{{$doctor->apellidos}}">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="tipo_identificacion">Tipo de identificacion</label>
                    <select class="form-select" name="tipo_identificacion" id="tipo_identificacion">
                        <option value="CC" {{ $doctor->tipo_identificacion == 'CC' ? 'selected="selected"' : '' }}>CC</option>
                        <option value="TI" {{ $doctor->tipo_identificacion == 'TI' ? 'selected="selected"' : '' }}>TI</option>
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="num_identificacion">N° de identificacion</label>
                    <input type="text" class="form-control" id="num_identificacion" name="num_identificacion" placeholder="Ingresa el numero de identificacion" value="{{$doctor->num_identificacion}}">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="rh">RH</label>
                    <select class="form-select" name="rh" id="rh">
                        <option value="A+"{{ $doctor->rh == 'A+' ? 'selected="selected"' : '' }}>A+</option>
                        <option value="A-"{{ $doctor->rh == 'A-' ? 'selected="selected"' : '' }}>A-</option>
                        <option value="B+"{{ $doctor->rh == 'B+' ? 'selected="selected"' : '' }}>B+</option>
                        <option value="B-"{{ $doctor->rh == 'B-' ? 'selected="selected"' : '' }}>B-</option>
                        <option value="O+"{{ $doctor->rh == 'O+' ? 'selected="selected"' : '' }}>O+</option>
                        <option value="O-"{{ $doctor->rh == 'O-' ? 'selected="selected"' : '' }}>O-</option>
                        <option value="AB+"{{ $doctor->rh == 'AB+' ? 'selected="selected"' : '' }}>AB+</option>
                        <option value="AB-"{{ $doctor->rh == 'AB-' ? 'selected="selected"' : '' }}>AB-</option>
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="genero">Genero</label>
                    <select class="form-select" name="genero" id="genero">
                        <option value="Masculino"{{ $doctor->genero == 'Masculino' ? 'selected="selected"' : '' }}>Masculino</option>
                        <option value="Femenino"{{ $doctor->genero == 'Femenino' ? 'selected="selected"' : '' }}>Femenino</option>
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="especialidad">Especialidad</label>
                    <select class="form-select" name="especialidad" id="especialidad">
                        <option value="Medicina General"{{ $doctor->especialidad == 'Medicina General' ? 'selected="selected"' : '' }}>Medicina General</option>
                        <option value="Odontologia"{{ $doctor->especialidad == 'Odontologia' ? 'selected="selected"' : '' }}>Odontologia</option>
                        <option value="Pediatria"{{ $doctor->especialidad == 'Pediatria' ? 'selected="selected"' : '' }}>Pediatria</option>
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label>Salas</label>
                    <select required class="form-control select2bs4" id="sala_id" name="sala_id">
                        <option value="" {{ $doctor->sala_id == null ? 'selected="selected"' : '' }}>Selecciona una sala</option>
                      @foreach ($salas as $sala)
                        @if ($sala->doctor == null || $sala->doctor->id == $doctor->id)
                            <option value="{{$sala->id}}" {{ $doctor->sala_id == $sala->id ? 'selected="selected"' : '' }}>{{$sala->nombre}}</option>
                        @endif
                      @endforeach
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label>Fecha de nacimiento</label>
                    <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="{{$doctor->fecha_nacimiento}}">
                    
                </div>
                <div class="mb-3 col-md-6">
                    <label for="email">Correo</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa un correo" value="{{$doctor->user->email}}">
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <a class="btn btn-danger" href="{{route('cancelar','admin.doctor.index')}}"><i class="fas fa-ban"></i> Cancelar</a>
            <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i> Guardar</button>
        </div>
    </form>
</div>

@endsection

@section('scripts')
<script>
    $(function () {
        $('#reservationdate').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    });

    //Select2
    $('.select2bs4').select2({
      theme: 'bootstrap4',
      language: "es"
    })
</script>
@endsection
