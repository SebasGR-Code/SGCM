<!-- Button trigger modal -->
<button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalCenter">
    Crear
</button>

<div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">Solicitud de Cita</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('paciente.solicitud.store') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Tipo de cita</label>
                    <select required class="form-select" id="especialidades" name="tipo_cita" {{old('tipo_cita')}}>
                        <option value="">Selecciona una especialidad</option>
                        <option value="Medicina General">Medicina General</option>
                        <option value="Odontologia">Odontologia</option>
                        <option value="Pediatria">Pediatria</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Doctor de preferencia</label>
                    <select required class="form-select" name="doctor_id" id="doctores" data-old="{{old('doctores')}}">
                        
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Paciente</label>
                    <select required class="form-select" name="paciente_id">
                        <option value="">Selecciona un paciente</option>
                        <option value="{{Auth::user()->paciente->id}}">{{Auth::user()->paciente->nombre}} {{Auth::user()->paciente->apellidos}}</option>
                        @foreach ($pacientes as $paciente)
                            @if ($paciente->estado != '0')   
                                    <option value="{{$paciente->paciente->id}}" {{$paciente->estado == '0' ? 'disabled' : ''}}>{{$paciente->paciente->nombre}} {{$paciente->paciente->apellidos}} - {{$paciente->relacion}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Comenta cual es su disponiblidad horaria</label>
                    <textarea name="disponibilidad" id="disponibilidad" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
<!-- Modal -->
{{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">Solicitud de cita</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="{{ route('paciente.solicitud.store') }}" method="POST">
        @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label>Tipo de cita</label>
                <select required class="form-control select2bs4" id="especialidades" name="tipo_cita" {{old('tipo_cita')}}>
                    <option value="">Selecciona una especialidad</option>
                    <option value="Medicina General">Medicina General</option>
                    <option value="Odontologia">Odontologia</option>
                    <option value="Pediatria">Pediatria</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Doctor de preferencia</label>
                <select required class="form-control select2bs4" name="doctor_id" id="doctores" data-old="{{old('doctores')}}">
                    
                </select>
            </div>
            <div class="mb-3">
                <label for="nombre">Comenta cual es tu disponiblidad horaria</label>
                <textarea name="disponibilidad" id="disponibilidad" cols="30" rows="10" class="form-control"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        </div>
    </form>
</div>
</div> --}}