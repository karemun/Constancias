
<x-evento-info :data="$data" :button="false">
    NO fue AUTORIZADO

    <x-slot:informacion>
        <b>Observaciones:</b>
        <p>{{ $data['observacion'] }}</p>
        <hr>
    </x-slot:informacion>
</x-evento-info>
