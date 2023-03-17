@component('mail::message')
# Hola!

Bienvenido a la plataforma SGCM, tus credenciales de acceso son:

**Correo:** {{$msg['email']}}

**Contraseña:** Tu numero de identificacion

*{{$msg['nombre']}} {{$msg['apellidos']}} acepta que SGCM maneje sus datos de forma confidencial bajo las leyes:*

[*- Ley 1266 de 2008*](http://www.secretariasenado.gov.co/senado/basedoc/ley_1266_2008.html)

[*- Ley 1581 del 2012*](http://www.secretariasenado.gov.co/senado/basedoc/ley_1581_2012.html)

@component('mail::button',['url' => \URL::to('/')])
    Ir a la plataforma
@endcomponent

¡Saludos!,<br>
{{config('app.name')}}
@endcomponent