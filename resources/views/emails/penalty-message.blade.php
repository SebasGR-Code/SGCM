@component('mail::message')
# Hola!

Has recibido una multa de 3.000 COP por inasistencia a la cita: 

**Fecha:** {{$fecha}}

**Hora:** {{$hora}}

Saludos,<br>
{{ config('app.name') }}
@endcomponent
