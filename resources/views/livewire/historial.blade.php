<div>
    <div class="card mb-3">
        <div class="card-body">
            <div class="input-group">
                <input type="number" class="form-control" placeholder="Ingresa el numero de documento" wire:model="n_documento" wire:keydown.enter="search">
                <span class="input-group-text cursor-pointer" wire:click="search"><i class='bx bx-search-alt-2' ></i></span>
            </div>
        </div>
    </div>
    @if (!empty($paciente))  
    <div class="row">
        <div class="col-md-4">
            <div class="card card-primary card-outline mb-3">
                <div class="card-body box-profile">
                    <div class="d-flex justify-content-center">
                        <i class='bx bx-user-circle bx-lg' ></i>
                    </div>
                <h3 class="profile-username text-center">{{$paciente->nombre}} {{$paciente->apellidos}}</h3>
                <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                <div class="d-flex justify-content-between">
                    <b><i class='bx bxs-id-card'></i> {{$paciente->tipo_identificacion}}</b> 
                    <a class="float-right">{{$paciente->num_identificacion}}</a>
                </div>
                </li>
                <li class="list-group-item">
                <div class="d-flex justify-content-between">
                    <b><i class='bx bx-{{$paciente->genero == 'Femenino' ? 'female' : 'male'}}-sign' ></i> Genero</b> 
                    <a class="float-right">{{$paciente->genero}}</a>
                </div>
                </li>
                <li class="list-group-item">
                <div class="d-flex justify-content-between">
                    <b><i class='bx bxs-calendar' ></i> Fecha de Nacimiento</b> 
                    <a class="float-right">{{$paciente->fecha_nacimiento}}</a>
                </div>
                </li>
                <li class="list-group-item">
                    <div class="d-flex justify-content-between">
                        <b><i class='bx bxs-droplet' ></i> RH</b> 
                        <a class="float-right">{{$paciente->rh}}</a>
                    </div>
                </li>
                </ul>
                </div>
                
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar cita" wire:model="search_cita">
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($this->citas as $cita)   
                    <div class="col-lg-3 col-sm-12">
                        <div class="d-flex justify-content-center">
                            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exLargeModal{{$cita->id}}">
                                {{Carbon\Carbon::parse($cita->start)->format('Y-m-d h:i A')}} 
                                {{$cita->title}}
                            </button>
                        </div>
                        <div class="modal fade" id="exLargeModal{{$cita->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel4">{{$cita->title}}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @if ($cita->title == 'Medicina General')
                                        @livewire('show-medica-general', ['cita_id' => $cita->id], key($cita->id))
                                    @elseif ($cita->title == 'Odontologia')
                                        @livewire('show-odontologia', ['cita_id' => $cita->id], key($cita->id))
                                    @endif
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
</div>
