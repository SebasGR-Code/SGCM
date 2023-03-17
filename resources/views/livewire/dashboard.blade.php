<div wire:init="search">
    <div class="card mb-3">
        <div class="card-body">
            <div class="card-title">
                <h5>Filtro</h5>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Fecha inicio</label>
                        <input type="date" class="form-control" wire:model="fecha_inicio" placeholder="Ingresa la fecha inicial">
                        @error('fecha_inicio') <span class="badge bg-danger">Campo necesario</span> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Fecha fin</label>
                        <input type="date" class="form-control" wire:model="fecha_fin" placeholder="Ingresa la fecha final">
                        @error('fecha_final') <span class="badge bg-danger">Campo necesario</span> @enderror
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary" wire:click="search">Buscar</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                  {{-- <h5 class="card-title m-0 me-2">Transactions</h5> --}}
                </div>
                <div class="card-body">
                  <ul class="p-0 m-0">
                    <li class="d-flex mb-4 pb-1">
                      <div class="avatar flex-shrink-0 me-3">
                        <span class="badge bg-label-danger p-2"><i class="bx bxs-user-badge text-danger"></i></span>
                      </div>
                      <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                          <h6 class="mb-0">Administradores registrados</h6>
                        </div>
                        <div class="user-progress d-flex align-items-center gap-1">
                          <h6 class="mb-0">{{$cant_admin}}</h6> <span class="text-muted">Cant.</span>
                        </div>
                      </div>
                    </li>
                    <li class="d-flex mb-4 pb-1">
                      <div class="avatar flex-shrink-0 me-3">
                        <span class="badge bg-label-warning p-2"><i class="bx bxs-user-circle text-warning"></i></span>
                      </div>
                      <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                          <h6 class="mb-0">Afiliados registrados</h6>
                        </div>
                        <div class="user-progress d-flex align-items-center gap-1">
                          <h6 class="mb-0">{{$cant_afiliados}}</h6> <span class="text-muted">Cant.</span>
                        </div>
                      </div>
                    </li>
                    <li class="d-flex mb-4 pb-1">
                      <div class="avatar flex-shrink-0 me-3">
                        <span class="badge bg-label-info p-2"><i class="bx bx bxs-user-pin text-info"></i></span>
                      </div>
                      <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                            <h6 class="mb-0">Doctores registrados</h6>
                        </div>
                        <div class="user-progress d-flex align-items-center gap-1">
                          <h6 class="mb-0">{{$cant_doctor}}</h6> <span class="text-muted">Cant.</span>
                        </div>
                      </div>
                    </li>
                    <li class="d-flex mb-4 pb-1">
                      <div class="avatar flex-shrink-0 me-3">
                        <span class="badge bg-label-success p-2"><i class="bx bx-store-alt text-success"></i></span>
                      </div>
                      <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                          <h6 class="mb-0">Salas registradas</h6>
                        </div>
                        <div class="user-progress d-flex align-items-center gap-1">
                          <h6 class="mb-0">{{$cant_salas}}</h6> <span class="text-muted">Cant.</span>
                        </div>
                      </div>
                    </li>
                    <li class="d-flex mb-4 pb-1">
                      <div class="avatar flex-shrink-0 me-3">
                        <span class="badge bg-label-secondary p-2"><i class="bx bx-calendar text-secondary"></i></span>
                      </div>
                      <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                          <h6 class="mb-0">Citas terminadas con éxito</h6>
                        </div>
                        <div class="user-progress d-flex align-items-center gap-1">
                          <h6 class="mb-0">{{$cant_citas}}</h6> <span class="text-muted">Cant.</span>
                        </div>
                      </div>
                    </li>
                    <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                          <span class="badge bg-label-warning p-2"><i class="bx bx-calendar text-warning"></i></span>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                          <div class="me-2">
                            <h6 class="mb-0">Citas canceladas</h6>
                          </div>
                          <div class="user-progress d-flex align-items-center gap-1">
                            <h6 class="mb-0">{{$cant_citas_cancel}}</h6> <span class="text-muted">Cant.</span>
                          </div>
                        </div>
                    </li>
                    <li class="d-flex">
                        <div class="avatar flex-shrink-0 me-3">
                          <span class="badge bg-label-danger p-2"><i class="bx bx-calendar text-danger"></i></span>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                          <div class="me-2">
                            <h6 class="mb-0">Citas sin asistencia</h6>
                          </div>
                          <div class="user-progress d-flex align-items-center gap-1">
                            <h6 class="mb-0">{{$cant_citas_noassist}}</h6> <span class="text-muted">Cant.</span>
                          </div>
                        </div>
                    </li>
                  </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div wire:ignore>
                                <canvas id="myChartEdad" height="250"></canvas>    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div wire:ignore>
                                <canvas id="myChartTipo" height="250"></canvas>    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div wire:ignore>
                                <canvas id="myChartSintomas" height="250"></canvas>    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div wire:ignore>
                                <canvas id="myChartDoctores" height="250"></canvas>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="d-flex justify-content-center">
                        <h6>Cantidad de citas por fecha</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div wire:ignore>
                        <canvas id="myChartLineCitas" height="300"></canvas>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
<script>
    document.addEventListener('livewire:load', function (){ 
        const ctxEdad = document.getElementById('myChartEdad').getContext('2d');
        const myChartEdad = new Chart(ctxEdad, {
            type: 'bar',
            data: {
                labels: ["Entre 6 y 11 años", "Entre 12 y 18 años", "Entre 19 y 26 años", "Entre 27 y 59 años", "Mayor de 60 años"],
                datasets: [{
                    label: "Datos",
                    backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                    data: [0,0,0,0,0]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, 
                plugins: {
                    legend: {
                        display: false,
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Cantidad de citas de pacientes atendidos en el rango de edad'
                    }
                }
            }
        });

        //Identificamos el ID y removemos la ultima barra
        Livewire.on('removeDataEdad', () => {
            
            myChartEdad.data.datasets.pop(); 
            myChartEdad.update(); 
            
            Livewire.emit('addDataEdad');
            
        });

        //Aca añadimos la barra nueva con su valor, se verifica su limite y se le asigna color
        Livewire.on('addDataEdad', () => {
           
            var newDataset = {
                label: 'Datos',
                backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                data: @this.values_edad,
            }

            
            myChartEdad.data.datasets.push(newDataset);
            myChartEdad.update();
            
        })

        const ctxTipo = document.getElementById('myChartTipo').getContext('2d');
        const myChartTipo = new Chart(ctxTipo, {
            type: 'pie',
            data: {
                labels: ["Medicina General", "Odontologia"],
                datasets: [{
                    label: "Datos",
                    backgroundColor: ["rgb(54, 162, 235)", "rgb(255, 205, 86)"],
                    data: [0,0]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, 
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Tipo de cita más común'
                    }
                }
            }
        });

        //Identificamos el ID y removemos la ultima barra
        Livewire.on('removeDataTipo', () => {
            
            myChartTipo.data.datasets.pop(); 
            myChartTipo.update(); 
            
            Livewire.emit('addDataTipo');
            
        });

        //Aca añadimos la barra nueva con su valor, se verifica su limite y se le asigna color
        Livewire.on('addDataTipo', () => {
           
            var newDataset = {
                label: 'Datos',
                backgroundColor: ["rgb(54, 162, 235)", "rgb(255, 205, 86)"],
                data: @this.values_tipo,
            }

            
            myChartTipo.data.datasets.push(newDataset);
            myChartTipo.update();
            
        })

        const ctxSintomas = document.getElementById('myChartSintomas').getContext('2d');
        const myChartSintomas = new Chart(ctxSintomas, {
            type: 'bar',
            data: {
                labels: ["Fiebre", "Tos", "Cansancio", "Dolor de garganta", "Dolor de cabeza", "Pérdida del gusto o del olfato", "Disnea"],
                datasets: [{
                    label: "Datos",
                    backgroundColor: ["#3e95cd"],
                    data: [0,0,0,0,0,0,0]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, 
                plugins: {
                    legend: {
                        display: false,
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Sintomas mas comunes'
                    }
                }
            }
        });

        //Identificamos el ID y removemos la ultima barra
        Livewire.on('removeDataSintomas', () => {
            
            myChartSintomas.data.datasets.pop(); 
            myChartSintomas.update(); 
            
            Livewire.emit('addDataSintomas');
            
        });

        //Aca añadimos la barra nueva con su valor, se verifica su limite y se le asigna color
        Livewire.on('addDataSintomas', () => {
           
            var newDatasetSintomas = {
                label: 'Datos',
                backgroundColor: ["#3e95cd"],
                data: @this.values_sintomas,
            }

            myChartSintomas.data.datasets.push(newDatasetSintomas);
            myChartSintomas.update();
            
        })

        const ctxDoctores = document.getElementById('myChartDoctores').getContext('2d');
        const myChartDoctores = new Chart(ctxDoctores, {
            type: 'bar',
            data: {
                labels: @this.values_doctores["nombres"],
                datasets: [{
                    label: "Datos",
                    backgroundColor: ["rgb(255, 205, 86)"],
                    data: [0,0,0,0,0,0,0]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, 
                plugins: {
                    legend: {
                        display: false,
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Numero de citas atendidas por doctor'
                    }
                }
            }
        });

        //Identificamos el ID y removemos la ultima barra
        Livewire.on('removeDataDoctores', () => {
            
            myChartDoctores.data.datasets.pop(); 
	    for (let i = 0; i < @this.old_count_doctor; i++) {     
                myChartDoctores.data.labels.pop();
            }
            myChartDoctores.update(); 
            
            Livewire.emit('addDataDoctores');
            
        });

        //Aca añadimos la barra nueva con su valor, se verifica su limite y se le asigna color
        Livewire.on('addDataDoctores', () => {
           
            var newDatasetDoctores = {
                label: 'Datos',
                backgroundColor: ["rgb(255, 205, 86)"],
                data: @this.values_doctores["total"],
            }
            
            for (let i = 0; i < @this.values_doctores["nombres"].length; i++) {     
                myChartDoctores.data.labels.push(@this.values_doctores["nombres"][i]);
            }
            myChartDoctores.data.datasets.push(newDatasetDoctores);
            myChartDoctores.update();
            
        })

        const myChartLineCitas = new Chart(document.getElementById("myChartLineCitas"), {
            type: 'line',
            data: {
                labels: @this.values_citas['fechas'],
                datasets: [{ 
                    data: @this.values_citas['cantidad'],
                    label: "Lineal",
                    backgroundColor: "rgba(18, 136, 229 ,0.2)",
                    borderColor: "rgba(18, 136, 229 ,1)",
                    fill: false,
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                title: {
                    display: true,
                    text: 'Grafico de Linea'
                }
            }
        });

        //Identificamos el ID y removemos la ultima barra
        Livewire.on('removeDataCitas', () => {
            
            myChartLineCitas.data.datasets.pop();
            for (let i = 0; i < @this.old_count_citas; i++) {  
            	myChartLineCitas.data.labels.pop();
	    }
            myChartLineCitas.update(); 
            
            Livewire.emit('addDataCitas');
            
        });

        //Aca añadimos la barra nueva con su valor, se verifica su limite y se le asigna color
        Livewire.on('addDataCitas', () => {
           
           var newDatasetCitas = {
                data: @this.values_citas['cantidad'],
                label: "Datos",
                backgroundColor: "rgba(18, 136, 229 ,0.2)",
                borderColor: "rgba(18, 136, 229 ,1)",
                fill: true,
                tension: 0.3
           }
           
           for (let i = 0; i < @this.values_citas["fechas"].length; i++) {     
            myChartLineCitas.data.labels.push(@this.values_citas["fechas"][i]);
           }
           myChartLineCitas.data.datasets.push(newDatasetCitas);
           myChartLineCitas.update();
           
       })
    })
</script>
@endpush
