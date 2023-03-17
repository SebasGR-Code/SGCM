<div class="modal fade" id="eventoEdit" tabindex="-1" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCenterTitle">Cita Medica</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="formedit">
      <div class="modal-body">
        <input required type="hidden" id="id" class="form-control" name="id" required autocomplete="name">

        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
  
            <h3 class="text-center" id="title"></h3>

            <p class="text-muted text-center" id="estado"></p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <div class="d-flex justify-content-between">

                  <b><i class="fas fa-user-md"></i> Doctor</b> <a class="float-right" id="doctor"></a>
                </div>
              </li>
              <li class="list-group-item">
                <div class="d-flex justify-content-between">

                  <b><i class="fas fa-user"></i> Paciente</b> <a class="float-right" id="paciente"></a>
                </div>
              </li>
              <li class="list-group-item">
                <div class="d-flex justify-content-between">

                  <b><i class="fas fa-calendar-day"></i> Fecha</b> <a class="float-right" id="fecha"></a>
                </div>
              </li>
              <li class="list-group-item">
                <div class="d-flex justify-content-between">

                  <b><i class="far fa-clock"></i> Hora</b> <a class="float-right" id="hora"></a>
                </div>
              </li>
              <li class="list-group-item">
                <div class="d-flex justify-content-between">

                  <b><i class="fas fa-door-closed"></i> Sala</b> <a class="float-right" id="sala"></a>
                </div>
              </li>
            </ul>

          </div>
          <!-- /.card-body -->
        </div>
      </div>
      </form>
      <div class="modal-footer">
        <button type="submit" class="btn btn-info" id="btnCancelar">Cancelar cita</button>
      </div>
    </div>
  </div>
</div>

{{-- <div class="modal fade" id="eventoEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header text-center bg-primary">
      <h4 class="modal-title w-100 font-weight-bold">Cita</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
      <form id="formedit">
          @csrf
          <div class="modal-body mx-3">
              <input required type="hidden" id="id" class="form-control" name="id" required autocomplete="name">
               
              <div class="card card-primary card-outline">
                  <div class="card-body box-profile">
          
                    <h3 class="text-center" id="title"></h3>

                    <p class="text-muted text-center" id="estado"></p>
    
                    <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                        <b><i class="fas fa-user-md"></i> Doctor</b> <a class="float-right" id="doctor"></a>
                      </li>
                      <li class="list-group-item">
                        <b><i class="fas fa-calendar-day"></i> Fecha</b> <a class="float-right" id="fecha"></a>
                      </li>
                      <li class="list-group-item">
                        <b><i class="far fa-clock"></i> Hora</b> <a class="float-right" id="hora"></a>
                      </li>
                      <li class="list-group-item">
                        <b><i class="fas fa-door-closed"></i> Sala</b> <a class="float-right" id="sala"></a>
                      </li>
                    </ul>
    
                  </div>
                  <!-- /.card-body -->
                </div>
          </div>
      </form>    
          <div class="modal-footer d-flex justify-content-center">
              <button type="submit" class="btn btn-info" id="btnCancelar">Cancelar cita</button>
          </div>
  </div>
</div>
</div> --}}