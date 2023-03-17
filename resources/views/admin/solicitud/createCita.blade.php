
<button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#createCita{{$solicitud->id}}">
    Asignar cita
  </button>

<div class="modal fade" id="createCita{{$solicitud->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">Crear cita</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        @livewire('modal-solicitud', ['solicitud' => $solicitud], key($solicitud->id))
      </div>
    </div>
</div>

{{-- <div class="modal fade" id="createCita{{$solicitud->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header text-center bg-primary">
      <h4 class="modal-title w-100 font-weight-bold">Evento</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
      <form action="{{route('admin.solicitud.storeCita')}}" method="POST">
          @csrf
          <input type="hidden" value="{{$solicitud->id}}" name="solicitud_id">
          <div class="modal-body mx-3">
              <div class="form-group">
                  <label>Especialidad</label>
                  <select required class="form-control select2bs4" id="especialidades" name="especialidad" {{old('especialidades')}}>
                      <option value="">Selecciona una especialidad</option>
                      <option value="Medicina General" {{$solicitud->tipo_cita == 'Medicina General' ? 'selected' : ''}}>Medicina General</option>
                      <option value="Odontologia" {{$solicitud->tipo_cita == 'Odontologia' ? 'selected' : ''}}>Odontologia</option>
                      <option value="Pediatria" {{$solicitud->tipo_cita == 'Pediatria' ? 'selected' : ''}}>Pediatria</option>
                  </select>
              </div>

              <div class="form-group">
                  <label>Doctor</label>
                  <select required class="form-control select2bs4" name="doctor_id" id="doctores" data-old="{{old('doctores')}}">
                      
                  </select>
              </div>

              <div class="form-group">
                  <label>Paciente</label>
                  <input type="hidden" value="{{$solicitud->paciente->id}}" name="paciente_id">
                  <input readonly type="text" class="form-control" value="{{$solicitud->paciente->nombre}} {{$solicitud->paciente->apellidos}} - {{$solicitud->paciente->tipo_identificacion}}{{$solicitud->paciente->num_identificacion}}">
              </div>
  
              <div class="form-group">
                  <label for="start">Fecha y hora de inicio</label>
                  <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                      <input required type="text" name="start" id="start" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
                      <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                      </div>
                  </div>
              </div>

              <div class="form-group">
                  <label for="end">Fecha y hora de finalizacion</label>
                  <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                      <input required type="text" name="end" id="end" class="form-control datetimepicker-input" data-target="#datetimepicker2"/>
                      <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                      </div>
                  </div>
              </div>
  
          </div>
          <div class="modal-footer d-flex justify-content-center">
            <button type="submit" class="btn btn-default">Guardar</button>
        </div>
      </form>    
          
      
  
  </div>
</div>
</div> --}}