document.addEventListener('DOMContentLoaded', function() {
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
        events: baseURL+"/paciente/calendar/show",
        eventClick:function(info){
            var evento = info.event; 
            axios.get(baseURL+"/paciente/calendar/takeCita/"+ info.event.id).
            then(
            (respuesta) => {
                var title = document.getElementById("title");
                var doctor = document.getElementById("doctor");
                var paciente = document.getElementById("paciente");
                var fecha = document.getElementById("fecha");
                var hora = document.getElementById("hora"); 
                console.log(respuesta.data.id);
                formEdit.id.value = respuesta.data.id;
                title.innerHTML = respuesta.data.title;
                doctor.innerHTML = respuesta.data.doctor;
                paciente.innerHTML = respuesta.data.paciente;
                fecha.innerHTML = respuesta.data.fecha;
                estado.innerHTML = respuesta.data.estado;
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
        enviarDatos("/paciente/calendar/cancelCita/"+formEdit.id.value);
    });

    function enviarDatos(url){
        const datos = new FormData(formEdit);
        const nuevaURL = baseURL+url;
        axios.post(nuevaURL, datos).
        then(
          (respuesta) => {
            calendar.refetchEvents();
            $("#eventoEdit").modal("hide");
          }
          ).catch(
            error=>{ if (error.response) { console,log(error.responde.date);}
            }
          )
      }

    
});