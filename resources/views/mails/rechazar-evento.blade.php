
<x-evento-info :data="$data" :info="true">
    NO fue AUTORIZADO

    <x-slot:informacion>
        <b>Observaciones:</b>
        <p>{{ $data['observacion'] }}</p>
        <hr>
    </x-slot:informacion>
</x-evento-info>
