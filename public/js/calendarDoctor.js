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
        events: baseURL+"/doctor/calendar/show",
        eventClick:function(info){
            var evento = info.event; 
            axios.get(baseURL+"/doctor/calendar/takeCita/"+ info.event.id).
            then(
            (respuesta) => {
                var title = document.getElementById("title");
                var doctor = document.getElementById("doctor");
                var fecha = document.getElementById("fecha");
                var hora = document.getElementById("hora"); 
                console.log(respuesta.data.id);
                formEdit.id.value = respuesta.data.id;
                title.innerHTML = respuesta.data.title;
                paciente.innerHTML = respuesta.data.paciente;
                fecha.innerHTML = respuesta.data.fecha;
                estado.innerHTML = respuesta.data.estado;
                hora.innerHTML = respuesta.data.hora;
                sala.innerHTML = respuesta.data.sala;

                if (respuesta.data.estado == 'Cancelada' || respuesta.data.estado == 'Terminada') {
                    $('#btnTerminar').attr("disabled", true);
                    $('#btnNoAssist').attr("disabled", true);
                }else if(respuesta.data.estado == 'En espera'){
                    $('#btnTerminar').attr("disabled", false);
                }

                if (respuesta.data.estado == 'Sin Asistencia') {
                    $('#btnNoAssist').attr("disabled", true);
                    $('#btnTerminar').attr("disabled", true);
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

    document.getElementById("btnTerminar").addEventListener("click",function(){
        console.log(title.innerHTML);

        if (title.innerHTML == 'Odontologia') {
            window.location.href = baseURL+"/doctor/procedimiento/odontologia/"+formEdit.id.value;
        } else if (title.innerHTML == 'Medicina General') {
            window.location.href = baseURL+"/doctor/procedimiento/medica-general/"+formEdit.id.value;
        } else {
            enviarDatos("/doctor/calendar/finishCita/"+formEdit.id.value);
        }
    });
    document.getElementById("btnNoAssist").addEventListener("click",function(){
        enviarDatos("/doctor/calendar/noAssist/"+formEdit.id.value);
    });

    function enviarDatos(url){
        $( "#loading" ).show();
        const datos = new FormData(formEdit);
        const nuevaURL = baseURL+url;
        axios.post(nuevaURL, datos).
        then(
            (respuesta) => {
                calendar.refetchEvents();
                $("#eventoEdit").modal("hide");
                $( "#loading" ).hide();
                }
            ).catch(
                error=>{ if (error.response) { console.log(error.response.date);}
                }
            )
        }


});