@component('mail::message')
# Hola!

Tienes una nueva cita medica: 

**Fecha:** {{$fecha}}

**Hora:** {{$hora}}

**Doctor:** {{$doctor}}

**Sala:** {{$sala}}

Saludos,<br>
{{ config('app.name') }}
@endcomponent
