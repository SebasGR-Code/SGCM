@extends('plantilla.plantilla')

    
@section('contenido')

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Cambiar contraseña</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('user.updatePassword')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            
            @csrf
            <div class="mb-3">
            <label class="form-label" for="mypassword">Introduce tu actual password:</label>
            <input type="password" name="mypassword" class="form-control">
            <div class="text-danger">{{$errors->first('mypassword')}}</div>
            </div>
            <div class="mb-3">
            <label class="form-label" for="password">Introduce tu nuevo password:</label>
            <input type="password" name="password" class="form-control">
            <div class="text-danger">{{$errors->first('password')}}</div>
            </div>
            <div class="mb-3">
            <label class="form-label" for="mypassword">Confirma tu nuevo password:</label>
            <input type="password" name="password_confirmation" class="form-control">
            </div>
            
          
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            
            <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i> Cambiar contraseña</button>
        </div>
    </form>
</div>

@endsection

