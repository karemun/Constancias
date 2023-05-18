<x-mail::message>
# Evidencia del evento: {{ $data['nombre'] }}


La evidencia del evento que enviaste fue rechazada por diferentes motivos.

## Observaciones:

{{ $data['observacion'] }}

<br>

Deberás volver a enviar la evidencia correcta del evento para solicitar la generación de constancias.

<x-mail::button :url="route('evidencia.buscar')">
Solicitar Constancias
</x-mail::button>


</x-mail::message>
