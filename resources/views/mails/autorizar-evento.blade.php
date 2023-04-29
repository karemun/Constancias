
<x-evento-info :data="$data" :info="true">
    fue AUTORIZADO
    <br><br>
    Folio del evento: {{ $data['folio'] }}

    <x-slot:informacion>
        <b>Observaciones:</b>
        <p>{{ $data['observacion'] }}</p>
        <hr>
        <b>Información:</b>
        <p>Despues de realizado el evento, deberas descargar el PDF adjunto para proceder con la <a href="{{ route('evento.index') }}">Generacion de Constancias</a>, donde deberas escribir el numero de folio para ingresar, subir el PDF adjunto en 'Documento de autorización' y subir la evidencia generada del evento.</p>
        <hr>
    </x-slot:informacion>
</x-evento-info>
