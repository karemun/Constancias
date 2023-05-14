<x-mail::message>
# Se envio evidencia del evento: {{ $data['nombre'] }}


### Fecha en que se realizo el evento:
- Fecha de inicio: {{ date('d/m/Y H:i', strtotime($data['fecha_inicio'])) }}
- Fecha final: {{ date('d/m/Y H:i', strtotime($data['fecha_final'])) }}

<br>

Da click en el siguiente boton para ver la evidencia y generar las constancias.

<x-mail::button :url="route('directivo.evento.index')">
Generar Constancias
</x-mail::button>

</x-mail::message>
