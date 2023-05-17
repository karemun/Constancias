
<h1>Se envio evidencia del evento: {{ $data['nombre'] }}</h1>

<p>
    Fecha en que se realizo el evento:
    - Fecha de inicio: {{ date('d/m/Y H:i', strtotime($data['fecha_inicio'])) }}
    - Fecha final: {{ date('d/m/Y H:i', strtotime($data['fecha_final'])) }}
</p>

<br>

<p>
    Da click en el siguiente boton para ver la evidencia y autorizar las constancias.
</p>
