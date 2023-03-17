document.addEventListener('DOMContentLoaded', function() {
    var formulario = document.querySelector("#formcreate");
    var formEdit = document.querySelector("#formedit");
    
    var calendarEl = document.getElementById('agenda');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale:"es",
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,listWeek'
        },
        events: baseURL+"/admin/calendar/show",
        dateClick:function(info){
            formulario.reset();
            formulario.start.value = info.dateStr+" 00:00:00";
            formulario.end.value = info.dateStr+" 00:00:00";
            $("#evento").modal("show");
        },
        eventClick:function(info){
            var evento = info.event; 
            axios.get(baseURL+"/admin/calendar/takeCita/"+ info.event.id).
            then(
            (respuesta) => {
                var title = document.getElementById("title");
                var doctor = document.getElementById("doctor");
                var fecha = document.getElementById("fecha");
                var hora = document.getElementById("hora"); 
                console.log(respuesta.data.id);
                formEdit.id.value = respuesta.data.id;
                title.innerHTML = respuesta.data.title;
                doctor.innerHTML = respuesta.data.doctor;
                fecha.innerHTML = respuesta.data.fecha;
                estado.innerHTML = respuesta.data.estado;
                paciente.innerHTML = respuesta.data.paciente;
                hora.innerHTML = respuesta.data.hora;
                sala.innerHTML = respuesta.data.sala;

                if (respuesta.data.estado == 'Cancelada' || respuesta.data.estado == 'Terminada') {
                    $('#btnCancelar').attr("disabled", true);
                }else if(respuesta.data.estado == 'En espera'){
                    $('#btnCancelar').attr("disabled", false);
                }
                
                $("#eventoEdit").modal("show");
            }).catch(
                error=>{
                    if (error.response) {
                    console.log(error.response.data);
                    }
                }
            )
        }
    });
    calendar.render();

    document.getElementById("btnCancelar").addEventListener("click",function(){
        enviarDatos("/admin/calendar/cancelCita/"+formEdit.id.value, 'cancel');
    });

    document.getElementById("btnEliminar").addEventListener("click",function(){
        console.log('hola');
        enviarDatos("/admin/calendar/destroy/"+formEdit.id.value, 'delete');
      });

    function enviarDatos(url, type){
        const datos = new FormData(formEdit);
        const nuevaURL = baseURL+url;
        axios.post(nuevaURL, datos).
        then(
          (respuesta) => {
            calendar.refetchEvents();
            $("#eventoEdit").modal("hide");
            if (type == 'delete') {
                Livewire.emit('swal', 'success', 'Se eliminó correctamente')
            } else if (type == 'cancel') {
                Livewire.emit('swal', 'success', 'Se canceló correctamente')
            }
          }
          ).catch(
            error=>{ if (error.response) { console,log(error.responde.date);}
            }
          )
      }

    document.getElementById("btnGuardar").addEventListener("click",function(){
        $( "#loading" ).show();
        const dat = new FormData(formulario);
        axios.post(baseURL+"/admin/calendar/store", dat).
        then(
          (respuesta) => {
            console.log(respuesta);
            if (respuesta.data == 'Validacion incorrecta') {
                Livewire.emit('swal', 'error', 'Fallo la validación, revisa los datos')
            } else if (respuesta.data == 'No disponible') {
                Livewire.emit('swal', 'info', 'No hay disponibilidad para este horario')
            } else if (respuesta.data == 'Incoherencia') {
                Livewire.emit('swal', 'error', 'Incoherencia en la fecha de inicio y fin')
            }

            calendar.refetchEvents();
            $("#evento").modal("hide");
            $( "#loading" ).hide();
          }
          ).catch(
            error=>{ if (error.response) { console,log(error.responde.date);}
            }
          )
    });

    function formatAMPM(date) {
        var hours = date.getHours();
        var minutes = date.getMinutes();
        var ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12;
        hours = hours ? hours : 12; // the hour '0' should be '12'
        minutes = minutes < 10 ? '0'+minutes : minutes;
        var strTime = hours + ':' + minutes + ' ' + ampm;
        return strTime;
    }
});