@section('titulo','Familiares')
<div>
    <div class="row">
        <div class="col-lg-5">
            <div class="card card-primary card-outline mb-3">
                <div class="card-body box-profile">
                <h3 class="profile-username text-center">{{$user->paciente->nombre}} {{$user->paciente->apellidos}}</h3>
                <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                <div class="d-flex justify-content-between">
                    <b><i class='bx bxs-id-card'></i> {{$user->paciente->tipo_identificacion}}</b> 
                    <a class="float-right">{{$user->paciente->num_identificacion}}</a>
                </div>
                </li>
                <li class="list-group-item">
                <div class="d-flex justify-content-between">
                    <b><i class='bx bx-{{$user->paciente->genero == 'Femenino' ? 'female' : 'male'}}-sign' ></i> Genero</b> 
                    <a class="float-right">{{$user->paciente->genero}}</a>
                </div>
                </li>
                <li class="list-group-item">
                <div class="d-flex justify-content-between">
                    <b><i class='bx bx-envelope' ></i> Correo</b> 
                    <a class="float-right">{{$user->email}}</a>
                </div>
                </li>
                <li class="list-group-item">
                <div class="d-flex justify-content-between">
                    <b><i class='bx bxs-calendar' ></i> Fecha de Nacimiento</b> 
                    <a class="float-right">{{$user->paciente->fecha_nacimiento}}</a>
                </div>
                </li>
                </ul>
                </div>
                
            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Nuevo familiar</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form wire:submit.prevent="saveFamily">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" wire:model="nombre" placeholder="Ingresa el nombre">
                                @error('nombre') <span class="badge bg-danger">Campo necesario</span> @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="apellidos">Apellidos</label>
                                <input type="text" class="form-control" id="apellidos" wire:model="apellidos" placeholder="Ingresa los apellidos">
                                @error('apellidos') <span class="badge bg-danger">Campo necesario</span> @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="tipo_identificacion">Tipo de identificacion</label>
                                <select class="form-select" wire:model="tipo_identificacion" id="tipo_identificacion">
                                    <option value="">Selecciona</option>
                                    <option value="CC">CC</option>
                                    <option value="TI">TI</option>
                                </select>
                                @error('tipo_identificacion') <span class="badge bg-danger">Campo necesario</span> @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="num_identificacion">N° de identificacion</label>
                                <input type="text" class="form-control" id="num_identificacion" wire:model="num_identificacion" placeholder="Ingresa el numero de identificacion">
                                @error('num_identificacion') <span class="badge bg-danger">Campo necesario</span> @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="rh">RH</label>
                                <select class="form-select" wire:model="rh" id="rh">
                                    <option value="">Selecciona</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                </select>
                                @error('rh') <span class="badge bg-danger">Campo necesario</span> @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="genero">Genero</label>
                                <select class="form-select" wire:model="genero" id="genero">
                                    <option value="">Selecciona</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                </select>
                                @error('genero') <span class="badge bg-danger">Campo necesario</span> @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Fecha de nacimiento</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="date" class="form-control" wire:model="fecha_nacimiento" id="fecha_nacimiento" data-target="#reservationdate">
                                </div>
                                @error('fecha_nacimiento') <span class="badge bg-danger">Campo necesario</span> @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="relacion">Tipo de relacion (Hijo, Padre, Madre ...)</label>
                                <input type="text" class="form-control" id="relacion" wire:model="relacion" placeholder="">
                                @error('relacion') <span class="badge bg-danger">Campo necesario</span> @enderror
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i> Guardar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body">
                <div id="table" class="table-editable">
                    {{-- <a href="{{ route('admin.paciente.create') }}" class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i> Crear</a> --}}
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
                        @foreach ($this->familiares as $nucleo)
                        <tr>
                            <td>{{$nucleo->paciente->nombre}}</td>
                            <td>{{$nucleo->paciente->apellidos}}</td>
                            <td>{{$nucleo->paciente->tipo_identificacion}} {{$nucleo->paciente->num_identificacion}}</td>
                            <td>{{$nucleo->paciente->genero}}</td>
                            <td>
                              @if ($nucleo->estado == 1)
                                <span class="badge rounded-pill bg-label-success">Activo</span>    
                              @else
                                <span class="badge rounded-pill bg-label-danger">Desactivado</span> 
                              @endif
                            </td>
                            <td class="th-sm">
                              <ul class="list-inline">
                                <li class="list-inline-item">
                                    @if ($nucleo->estado == 1)
                                        <button class="btn btn-danger btn-sm" wire:click="deactivate({{$nucleo}})">Desactivar</button>
                                    @else
                                        <button class="btn btn-success btn-sm" wire:click="activate({{$nucleo}})">Activar</button>
                                    @endif
                                </li>
                                {{-- @if ($nucleo->paciente->user->estado == 0)
                                <li class="list-inline-item">
                                  <form action="{{route('admin.paciente.destroy',$nucleo->paciente->id)}}" class="formulario-eliminar" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash-alt"></i> Desactivar</button>
                                  </form>
                                </li>    
                                @else
                                <li class="list-inline-item">
                                  <a href="{{ route('admin.paciente.activate', $paciente->id) }}" class="btn btn-success btn-sm"> Activar</a>
                                </li>    
                                @endif --}}
                              </ul>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    $(document).ready(function () {
        
    });
</script>
@endsection
