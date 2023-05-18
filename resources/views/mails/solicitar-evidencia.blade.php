<x-mail::message>
# Se envió evidencia del evento: {{ $data['nombre'] }}


## Fecha en que se realizó el evento:
- Fecha de inicio: {{ date('d/m/Y H:i', strtotime($data['fecha_inicio'])) }}
- Fecha final: {{ date('d/m/Y H:i', strtotime($data['fecha_final'])) }}

<br>

Da click en el siguiente botón para ver la evidencia y generar las constancias.

<x-mail::button :url="route('directivo.evidencia.show', ['evento' => $data['evento']])">
Generar Constancias
</x-mail::button>

</x-mail::message>