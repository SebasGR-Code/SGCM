@extends('plantilla.plantilla')

    
@section('contenido')

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Nuevo doctor</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('admin.doctor.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa el nombre" required value="{{old('nombre')}}"> 
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ingresa los apellidos" required value="{{old('apellidos')}}"> 
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="tipo_identificacion">Tipo de identificacion</label>
                    <select class="form-select" name="tipo_identificacion" id="tipo_identificacion" required> 
                        <option value="">Selecciona el tipo de identificacion</option>
                        <option value="CC">CC</option>
                        <option value="TI">TI</option>
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="num_identificacion">N° de identificacion</label>
                    <input type="text" class="form-control" id="num_identificacion" name="num_identificacion" placeholder="Ingresa el numero de identificacion" required value="{{old('num_identificacion')}}"> 
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="rh">RH</label>
                    <select class="form-select" name="rh" id="rh" required> 
                        <option value="">Selecciona el tipo de sangre</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="genero">Genero</label>
                    <select class="form-select" name="genero" id="genero" required> 
                        <option value="">Selecciona un genero</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="especialidad">Especialidad</label>
                    <select class="form-select" name="especialidad" id="especialidad" required> 
                        <option value="">Selecciona una especialidad</option>
                        <option value="Medicina General">Medicina General</option>
                        <option value="Odontologia">Odontologia</option>
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Salas</label>
                    <select required class="form-control select2bs4" id="sala_id" name="sala_id" required> 
                        <option value="">Selecciona una sala</option>
                      @foreach ($salas as $sala)
                        @if ($sala->doctor == null)
                            <option value="{{$sala->id}}">{{$sala->nombre}}</option>
                        @endif
                      @endforeach
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Fecha de nacimiento</label>
                    <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" required value="{{old('fecha_nacimiento')}}">       
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="email">Correo</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa un correo" required value="{{old('email')}}"> 
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
