<div>
    <div class="modal-body">
        <div class="mb-3">
            <label class="form-label">Especialidad</label>
            <select required class="form-select" wire:model="especialidad">
                <option value="">Selecciona una especialidad</option>
                <option value="Medicina General" >Medicina General</option>
                <option value="Odontologia">Odontologia</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Doctor</label>
            <select required class="form-select" wire:model="doctor_id">
                <option value="">Selecciona un doctor</option>
                @foreach ($doctores as $doctor)
                    <option value="{{$doctor->id}}" {{$solicitud->doctor_id == $doctor->id ? 'selected' : ''}}>{{$doctor->nombre}} {{$doctor->apellidos}}</option>
                @endforeach
            </select>
            @error('doctor_id')
            <span class="badge rounded-pill bg-label-danger mt-2">El campo doctor es requerido</span>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Paciente</label>
            <select required class="form-select" wire:model="paciente_id">
                <option value="">Selecciona un paciente</option>
                @foreach ($pacientes as $paciente)
                    <option value="{{$paciente->id}}" {{$solicitud->paciente_id == $paciente->id ? 'selected' : ''}}>{{$paciente->nombre}} {{$paciente->apellidos}}</option>
                @endforeach
            </select>
            @error('doctor_id')
            <span class="badge rounded-pill bg-label-danger mt-2">El campo paciente es requerido</span>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="start">Fecha y hora de inicio</label>
            <input required type="datetime-local" class="form-control" wire:model="start"/>
            @error('start')
            <span class="badge rounded-pill bg-label-danger mt-2">El campo hora de inicio es requerido</span>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="end">Fecha y hora de finalizacion</label>
            <input required type="datetime-local" class="form-control" wire:model="end"/>
            @error('end')
            <span class="badge rounded-pill bg-label-danger mt-2">El campo hora fin es requerido</span>
            @enderror
        </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
      <button type="button" class="btn btn-primary" wire:click="newData">Guardar</button>
    </div>
</div>
