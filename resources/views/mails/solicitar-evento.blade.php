
<x-evento-info :data="$data" :button="true">
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
            <tr>
                <td><b>Codigo:</b></td>
                <td>{{ $data['solicitante']['codigo'] }}</td>
            </tr>
        </table>
        <br>
        <hr><br>
    </x-slot:informacion>

    <x-slot:boton>
        <a href="{{ route('directivo.evento.show', ['evento' => $data]) }}" class="button button-primary" target="_blank" rel="noopener" style="margin-bottom: 24px; box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; -webkit-text-size-adjust: none; border-radius: 4px; color: #fff; display: inline-block; overflow: hidden; text-decoration: none; background-color: #2d3748; border-bottom: 8px solid #2d3748; border-left: 18px solid #2d3748; border-right: 18px solid #2d3748; border-top: 8px solid #2d3748;">Validar evento</a>
    </x-slot:boton>

</x-evento-info>
