<div>
    <div class="card mb-4">
        <h5 class="card-header">Cita Medica General</h5>
        <div class="card-body">
            <div class="row py-3 border border-solid border-dark rounded mb-3">
                <div class="col-md-12">
                <label for="defaultFormControlInput" class="form-label">Motivo de consulta</label>
                <textarea class="form-control" wire:model="motivo"></textarea>
                @error('motivo')
                <span class="badge rounded-pill bg-label-danger mt-2">El motivo es requerido</span>
                @enderror
                {{-- <div id="defaultFormControlHelp" class="form-text">We'll never share your details with anyone else.</div> --}}
                </div>
            </div>
            <div class="row py-3 border border-solid border-dark rounded mb-3">
                <h6>Antecedentes personales</h6>
                <div class="col-md-4">
                    <label for="defaultFormControlInput" class="form-label">Alérgicos</label>
                    <textarea class="form-control" wire:model="alergicos"></textarea>
                </div>
                <div class="col-md-4">
                    <label for="defaultFormControlInput" class="form-label">Quirúrgicos</label>
                    <textarea class="form-control" wire:model="quirurgicos"></textarea>
                </div>
                <div class="col-md-4">
                    <label for="defaultFormControlInput" class="form-label">Otros</label>
                    <textarea class="form-control" wire:model="otros"></textarea>
                </div>
            </div>
            <div class="row py-3 border border-solid border-dark rounded mb-3">
                <h6>Sintomas</h6>
                <div class="d-flex justify-content-around">
                    <div>
                        <div class="form-check form-check-inline mt-3">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" wire:model="fiebre">
                            <label class="form-check-label" for="inlineCheckbox1">Fiebre</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="1" wire:model="tos">
                            <label class="form-check-label" for="inlineCheckbox2">Tos</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="1" wire:model="cansancio">
                            <label class="form-check-label" for="inlineCheckbox3">Cansancio</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="1" wire:model="dolor_garganta">
                            <label class="form-check-label" for="inlineCheckbox3">Dolor de garganta</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="1" wire:model="dolor_cabeza">
                            <label class="form-check-label" for="inlineCheckbox3">Dolor de cabeza</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="1" wire:model="perdida">
                            <label class="form-check-label" for="inlineCheckbox3">Pérdida del gusto o del olfato</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="1" wire:model="dificultad">
                            <label class="form-check-label" for="inlineCheckbox3">Dificultad para respirar o disnea</label>
                        </div>
                    </div> 
                    <div class="row">
                        <label for="html5-text-input" class="col-md-3 col-form-label">Otros:</label>
                        <div class="col-md-9">
                          <input class="form-control" type="text" wire:model="sintoma_otro">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row py-3 border border-solid border-dark rounded mb-3">
                <h6>Signos Vitales</h6>
                <div class="col-md-3">
                    <label for="defaultFormControlInput" class="form-label">Aspecto General</label>
                    <textarea class="form-control" wire:model="aspecto_general"></textarea>
                    <label for="defaultFormControlInput" class="form-label">Indice de masa corporal</label>
                    <input type="number" class="form-control" wire:model="masa_corporal">
                </div>
                <div class="col-md-3">
                    <label for="defaultFormControlInput" class="form-label">Peso (Kgs)</label>
                    <input type="number" class="form-control" wire:model="peso">
                    <label for="defaultFormControlInput" class="form-label">Talla (Mts)</label>
                    <input type="number" class="form-control" wire:model="talla">
                </div>
                <div class="col-md-3">
                    <label for="defaultFormControlInput" class="form-label">Tension Arterial</label>
                    <input type="text" class="form-control" wire:model="tension_arterial">
                    <label for="defaultFormControlInput" class="form-label">Frecuencia cardiaca</label>
                    <input type="number" class="form-control" wire:model="frecuencia_cardiaca">
                </div>
                <div class="col-md-3">
                    <label for="defaultFormControlInput" class="form-label">Frecuencia respiratoria</label>
                    <input type="number" class="form-control" wire:model="frecuencia_respiratoria">
                    <label for="defaultFormControlInput" class="form-label">Temperatura</label>
                    <input type="number" class="form-control" wire:model="temperatura">
                </div>
            </div>
            <div class="row py-3 border border-solid border-dark rounded mb-3">
                <h6>Examen Fisico</h6>
                <div class="col-md-4">
                    <label for="defaultFormControlInput" class="form-label">Cabeza y cuello</label>
                    <textarea class="form-control" wire:model="cabeza_cuello"></textarea>
                    <label for="defaultFormControlInput" class="form-label">Ojos y fondo de ojos</label>
                    <textarea class="form-control" wire:model="ojos"></textarea>
                </div>
                <div class="col-md-4">
                    <label for="defaultFormControlInput" class="form-label">Cardíaco</label>
                    <textarea class="form-control" wire:model="cardiaco"></textarea>
                    <label for="defaultFormControlInput" class="form-label">Pulmonar</label>
                    <textarea class="form-control" wire:model="pulmonar"></textarea>
                </div>
                <div class="col-md-4">
                    <label for="defaultFormControlInput" class="form-label">Abdomen</label>
                    <textarea class="form-control" wire:model="abdomen"></textarea>
                    <label for="defaultFormControlInput" class="form-label">Mental</label>
                    <textarea class="form-control" wire:model="mental"></textarea>
                </div>
            </div>
            <div class="row py-3 border border-solid border-dark rounded mb-3">
                <h6>Diagnostico y Analisis</h6>
                <div class="col-md-6">
                    <label for="defaultFormControlInput" class="form-label">Diagnostico principal</label>
                    <input type="text" class="form-control" wire:model="diagnostico_principal">
                    @error('diagnostico_principal')
                    <span class="badge rounded-pill bg-label-danger mt-2">El diagnostico principal es requerido</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="defaultFormControlInput" class="form-label">Análisis y plan</label>
                    <textarea class="form-control" wire:model="analisis_plan"></textarea>
                    @error('analisis_plan')
                    <span class="badge rounded-pill bg-label-danger mt-2">El analisis y plan es requerido</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <button class="btn btn-success" wire:click="$emit('sendData')">Enviar</button>
</div>

@push('js')
    <script>
        //Alerta de envio de datos
        Livewire.on('sendData', () => {
            Swal.fire({
            title: '¿Estas seguro?',
            text: "Se va guardar la información",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, guardar!',
            }).then((result) => {
            if (result.isConfirmed) {
                @this.newData();
            }
            })
        });
    </script>
@endpush
