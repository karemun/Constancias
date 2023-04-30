
<x-evento-info :data="$data" :info="true">
    fue solicitado

    <x-slot:informacion>
        <b>Información del solicitante:</b>
        <table style="margin-top: 24px;">
            <tr>
                <td><b>Nombre:</b></td>
                <td>{{ $data['solicitante']['nombre'] }}</td>
            </tr>
            <tr>
                <td><b>Email:</b></td>
                <td>{{ $data['solicitante']['email'] }}</td>
            </tr>
        </table>
        <br>
        <hr><br>
    </x-slot:informacion>
</x-evento-info>
