
<div class="modal fade" id="evento" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">Evento</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="formcreate">
            @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label class="form-label">Especialidad</label>
                <select required class="form-select" id="especialidades" name="especialidad" {{old('especialidades')}}>
                    <option value="">Selecciona una especialidad</option>
                    <option value="Medicina General">Medicina General</option>
                    <option value="Odontologia">Odontologia</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Doctor</label>
                <select required class="form-select" name="doctor_id" id="doctores" data-old="{{old('doctores')}}">
                    
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Paciente</label>
                <select required class="form-select" id="paciente_id" name="paciente_id">
                    <option value="">Selecciona un paciente</option>
                    @foreach ($pacientes as $paciente)
                            <option value="{{$paciente->id}}">{{$paciente->nombre}} {{$paciente->apellidos}} - {{$paciente->tipo_identificacion}}{{$paciente->num_identificacion}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="start">Fecha y hora de inicio</label>
                <input required type="datetime-local" name="start" id="start" class="form-control"/>
            </div>
            <div class="form-group">
                <label class="form-label" for="end">Fecha y hora de finalizacion</label>
                <input required type="datetime-local" name="end" id="end" class="form-control"/>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div style="display: none;" class="spinner-border text-info" role="status" id="loading">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        </form> 
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="btnGuardar">Guardar</button>
        </div>
      </div>
    </div>
  </div>


{{-- <div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Evento</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form id="formcreate">
            @csrf
            <div class="modal-body mx-3">
                <div class="form-group">
                    <label>Especialidad</label>
                    <select required class="form-control select2bs4" id="especialidades" name="especialidad" {{old('especialidades')}}>
                        <option value="">Selecciona una especialidad</option>
                        <option value="Medicina General">Medicina General</option>
                        <option value="Odontologia">Odontologia</option>
                        <option value="Pediatria">Pediatria</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Doctor</label>
                    <select required class="form-control select2bs4" name="doctor_id" id="doctores" data-old="{{old('doctores')}}">
                        
                    </select>
                </div>

                <div class="form-group">
                    <label>Paciente</label>
                    <select required class="form-control select2bs4" id="paciente_id" name="paciente_id">
                        <option value="">Selecciona un paciente</option>
                        @foreach ($pacientes as $paciente)
                                <option value="{{$paciente->id}}">{{$paciente->nombre}} {{$paciente->apellidos}} - {{$paciente->tipo_identificacion}}{{$paciente->num_identificacion}}</option>
                        @endforeach
                    </select>
                </div>
    
                <div class="form-group">
                    <label for="start">Fecha y hora de inicio</label>
                    <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                        <input required type="datetime-local" name="start" id="start" class="form-control"/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="end">Fecha y hora de finalizacion</label>
                    <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                        <input required type="datetime-local" name="end" id="end" class="form-control"/>

                    </div>
                </div>
                <span style="display: none;" id="loading" class="badge badge-info">Cargando, por favor espere ...</span>
            </div>
        </form>    
            <div class="modal-footer d-flex justify-content-center">
                <button type="submit" class="btn btn-default" id="btnGuardar">Guardar</button>
            </div>
        
    
    </div>
  </div>
</div> --}}