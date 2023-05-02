
<x-evento-info :data="$data" :button="false">
    fue AUTORIZADO
    <br><br>
    Folio del evento: {{ $data['folio'] }}

    <x-slot:informacion>
        <b>Observaciones:</b>
        <p>{{ $data['observacion'] }}</p>
        <hr>
    </x-slot:informacion>
</x-evento-info>
