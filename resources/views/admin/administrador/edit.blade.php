@extends('plantilla.plantilla')

    
@section('contenido')

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Editar administrador</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('admin.administrador.update',$admin->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa el nombre" value="{{$admin->nombre}}">
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ingresa los apellidos" value="{{$admin->apellidos}}">
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="tipo_identificacion">Tipo de identificacion</label>
                    <select class="form-select" name="tipo_identificacion" id="tipo_identificacion">
                        <option value="CC"{{ $admin->tipo_identificacion == 'CC' ? 'selected="selected"' : '' }}>CC</option>
                        <option value="TI"{{ $admin->tipo_identificacion == 'TI' ? 'selected="selected"' : '' }}>TI</option>
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="num_identificacion">N° de identificacion</label>
                    <input type="text" class="form-control" id="num_identificacion" name="num_identificacion" placeholder="Ingresa el numero de identificacion" value="{{$admin->num_identificacion}}">
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="rh">RH</label>
                    <select class="form-select" name="rh" id="rh">
                        <option value="A+"{{ $admin->rh == 'A+' ? 'selected="selected"' : '' }}>A+</option>
                        <option value="A-"{{ $admin->rh == 'A-' ? 'selected="selected"' : '' }}>A-</option>
                        <option value="B+"{{ $admin->rh == 'B+' ? 'selected="selected"' : '' }}>B+</option>
                        <option value="B-"{{ $admin->rh == 'B-' ? 'selected="selected"' : '' }}>B-</option>
                        <option value="O+"{{ $admin->rh == 'O+' ? 'selected="selected"' : '' }}>O+</option>
                        <option value="O-"{{ $admin->rh == 'O-' ? 'selected="selected"' : '' }}>O-</option>
                        <option value="AB+"{{ $admin->rh == 'AB+' ? 'selected="selected"' : '' }}>AB+</option>
                        <option value="AB-"{{ $admin->rh == 'AB-' ? 'selected="selected"' : '' }}>AB-</option>
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="genero">Genero</label>
                    <select class="form-select" name="genero" id="genero">
                        <option value="Masculino"{{ $admin->genero == 'Masculino' ? 'selected="selected"' : '' }}>Masculino</option>
                        <option value="Femenino"{{ $admin->genero == 'Femenino' ? 'selected="selected"' : '' }}>Femenino</option>
                    </select>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Fecha de nacimiento</label>
                    <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="{{$admin->fecha_nacimiento}}">
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="email">Correo</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa un correo" value="{{$admin->user->email}}">
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <a class="btn btn-danger" href="{{route('cancelar','admin.administrador.index')}}"><i class="fas fa-ban"></i> Cancelar</a>
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
</script>
@endsection
