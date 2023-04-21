<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Constancias-Prepa11</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
    <style>
        .font-styles {
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif,
                'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
            position: relative;
        }
        @media only screen and (max-width: 600px) {
            .inner-body {
                width: 100% !important;
            }

            .footer {
                width: 100% !important;
            }
        }
    </style>
</head>

<body class="font-styles"
    style="-webkit-text-size-adjust: none; background-color: #ffffff; color: #718096; height: 100%; line-height: 1.4; margin: 0; padding: 0; width: 100% !important;">

    <table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation"
        style="-premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%; background-color: #edf2f7; margin: 0; padding: 0; width: 100%;">
        <tr>
            <td align="center" class="font-styles"
                style="box-sizing: border-box; position: relative;">
                <table class="content width-styles" cellpadding="0" cellspacing="0" role="presentation"
                    style="box-sizing: border-box; position: relative; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%; margin: 0; padding: 0;">
                    <tr>
                        <td class="header" style="padding: 25px 0; text-align: center;">
                            <p class="font-styles"
                                style="color: #3d4852; font-size: 19px; font-weight: bold; text-decoration: none; display: inline-block;">
                                Constancias-Prepa11
                            </p>
                        </td>
                    </tr>

                    <!-- Email Body -->
                    <tr>
                        <td class="body" width="100%" cellpadding="0" cellspacing="0"
                            style="-premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%; background-color: #edf2f7; border-bottom: 1px solid #edf2f7; border-top: 1px solid #edf2f7; margin: 0; padding: 0; width: 100%; border: hidden !important;">
                            <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0"
                                role="presentation"
                                style="-premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 570px; background-color: #ffffff; border-color: #e8e5ef; border-radius: 2px; border-width: 1px; box-shadow: 0 2px 0 rgba(0, 0, 150, 0.025), 2px 4px 0 rgba(0, 0, 150, 0.015); margin: 0 auto; padding: 0; width: 570px;">
                                <!-- Body content -->
                                <tr>
                                    <td class="content-cell"
                                        style="max-width: 100vw; padding: 32px;">
                                        <h1
                                            style="color: #3d4852; font-size: 18px; font-weight: bold; margin-top: 0; text-align: left;">
                                            Se solicito el evento: {{ $data['evento'] }}
                                        </h1>
                                        <br>
                                        <div style="font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">

                                            <b>Información del solicitante:</b>
                                            <p>Nombre: {{ $data['nombre'] }}</p>
                                            <p>Email: {{ $data['email'] }}</p>
                                            <hr>

                                            <b>Información del evento:</b>
                                            <p>Nombre: {{ $data['evento'] }}</p>
                                            <p>Tipo: {{ $data['tipo'] }}</p>
                                            <p>Departamento: {{ $data['departamento'] }}</p>
                                            <p>Ubicación: {{ $data['ubicacion'] }}</p>
                                            <p>Fecha de inicio: {{ date('d/m/Y H:i', strtotime($data['fecha_inicio'])) }}</p>
                                            <p>Fecha de finalización: {{ date('d/m/Y H:i', strtotime($data['fecha_final'])) }}</p>
                                            <p>Material requerido: {{ $data['material'] }}</p>
                                            <hr>

                                            <b>Participantes del evento:</b>
                                            @php
                                                $participantes = array_map(null, $data['nombre_p'], $data['rol_p'], $data['actividad_p'], $data['puesto_p'], $data['codigo_p']);
                                            @endphp
                                            @foreach ($participantes as $participante)
                                                <p>Nombre: {{ $participante[0] }}</p>
                                                <p>Rol: {{ $participante[1] }}</p>
                                                <p>Actividad: {{ $participante[2] }}</p>
                                                <p>Puesto: {{ $participante[3] }}</p>
                                                <p>Codigo: {{ $participante[4] }}</p>
                                                <hr>
                                            @endforeach
                                    </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0"
                                role="presentation"
                                style="-premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 570px; margin: 0 auto; padding: 0; text-align: center; width: 570px;">
                                <tr>
                                    <td class="content-cell" align="center"
                                        style="tive; max-width: 100vw; padding: 32px;">
                                        <p
                                            style="line-height: 1.5em; margin-top: 0; color: #b0adc5; font-size: 12px; text-align: center;">
                                            Fecha: {{ date('d/m/Y') }}</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>