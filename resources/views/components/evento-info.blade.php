@props(['data', 'info'])
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
    <div>
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
                                    style="color: #3d4852; font-size: 19px; font-weight: bold; text-decoration: none; display: inline-block; margin: 0 auto;">
                                    Constancias-Prepa11
                                </p>
                            </td>
                        </tr>

                        <tr>
                            <td class="body" width="100%" cellpadding="0" cellspacing="0"
                                style="-premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%; background-color: #edf2f7; border-bottom: 1px solid #edf2f7; border-top: 1px solid #edf2f7; margin: 0; padding: 0; width: 100%; border: hidden !important;">
                                <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0"
                                    role="presentation"
                                    style="-premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 570px; background-color: #ffffff; border-color: #e8e5ef; border-radius: 2px; border-width: 1px; box-shadow: 0 2px 0 rgba(0, 0, 150, 0.025), 2px 4px 0 rgba(0, 0, 150, 0.015); margin: 0 auto; padding: 0; width: 570px;">

                                    <tr>
                                        <td class="content-cell"
                                            style="max-width: 100vw; padding: 32px;">
                                            <h1
                                                style="color: #3d4852; font-size: 18px; font-weight: bold; margin-top: 0; text-align: left;">
                                                El evento "{{ $data['evento'] }}" {{ $slot }}
                                            </h1>
                                            <br>
                                            <div style="font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">
        
                                                @if ($info)
                                                    {{ $informacion }}
                                                @endif

                                                <b>Información del evento:</b>
                                                <table style="margin-top: 24px;">
                                                    <tr>
                                                        <td><b>Nombre:</b></td>
                                                        <td>{{ $data['evento'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Tipo:</b></td>
                                                        <td>{{ $data['tipo'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Departamento:</b></td>
                                                        <td>{{ $data['departamento'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Ubicación:</b></td>
                                                        <td>{{ $data['ubicacion'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Fecha de inicio:</b></td>
                                                        <td>{{ date('d/m/Y H:i', strtotime($data['fecha_inicio'])) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Fecha de finalización:</b></td>
                                                        <td>{{ date('d/m/Y H:i', strtotime($data['fecha_final'])) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Material requerido:</b></td>
                                                        <td>{{ $data['material'] }}</td>
                                                    </tr>
                                                </table>
        
                                                <br><hr><br>

                                                <b>Información de los participantes:</b>
                                                <table style="border-collapse: collapse; width: 100%; margin-top: 24px;">
                                                    <thead style="background-color: #e2e8f0;">
                                                        <tr>
                                                            <th style="border: 1px solid #cbd5e0; padding: 8px;">Nombre</th>
                                                            <th style="border: 1px solid #cbd5e0; padding: 8px;">Rol</th>
                                                            <th style="border: 1px solid #cbd5e0; padding: 8px;">Actividad</th>
                                                            <th style="border: 1px solid #cbd5e0; padding: 8px;">Puesto</th>
                                                            <th style="border: 1px solid #cbd5e0; padding: 8px;">Código</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($data['participantes'] as $participante)
                                                            <tr>
                                                                <td style="border: 1px solid #cbd5e0; padding: 8px;">{{ $participante['nombre'] }}</td>
                                                                <td style="border: 1px solid #cbd5e0; padding: 8px;">{{ $participante['rol'] }}</td>
                                                                <td style="border: 1px solid #cbd5e0; padding: 8px;">{{ $participante['actividad'] }}</td>
                                                                <td style="border: 1px solid #cbd5e0; padding: 8px;">{{ $participante['puesto'] }}</td>
                                                                <td style="border: 1px solid #cbd5e0; padding: 8px;">{{ $participante['codigo'] }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
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
    </div>

</body>

</html>