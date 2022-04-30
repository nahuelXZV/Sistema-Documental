<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Historial de {{ $paciente->nombre }}</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }

    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="{{ asset('Logo.png') }}" style="width: 100px; max-width: 300px" />
                            </td>

                            <td>
                                {{ $clinica->nombre }} #: {{ $clinica->direccion }}<br />
                                Ciudad: {{ $clinica->ciudad }}<br />
                                Telefono: {{ $clinica->telefono }} <br>
                                Creado: {{ $fecha }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Apellidos y Nombres<br />
                                Documento<br />
                                Telefono
                            </td>

                            <td>
                                {{ $paciente->nombre }} <br />
                                {{ $paciente->documento }}<br />
                                {{ $paciente->telefono }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>Datos generales</td>

                <td></td>
            </tr>

            <tr class="item">
                <td>Apellidos y Nombres: {{ $paciente->nombre }}</td>

                <td></td>
            </tr>
            <tr class="item">
                <td>Fecha de nacimiento: {{ $paciente->fecha_nacimiento }}</td>

                <td></td>
            </tr>
            <tr class="item">
                <td>Tipo de documento: {{ $paciente->tipo_documento }}</td>

                <td></td>
            </tr>
            <tr class="item">
                <td>Documento: {{ $paciente->documento }}</td>

                <td></td>
            </tr>
            <tr class="item">
                <td>Telefono: {{ $paciente->telefono }}</td>

                <td></td>
            </tr>
            <tr class="item">
                <td>Sexo: {{ $paciente->sexo }}</td>

                <td></td>
            </tr>
            <tr class="item">
                <td>Estado civil: {{ $paciente->estado_civil }}</td>

                <td></td>
            </tr>
            <tr class="item">
                <td>Situacion laboral: {{ $paciente->situacion_laboral }}</td>

                <td></td>
            </tr>
            <tr class="heading">
                <td>Lugar de nacimiento</td>

                <td></td>
            </tr>
            <tr class="item">
                <td>Pais: {{ $paciente->pais }}</td>

                <td></td>
            </tr>
            <tr class="item">
                <td>Departamento: {{ $paciente->departamento }}</td>

                <td></td>
            </tr>
            <tr class="item">
                <td>Nacionalidad: {{ $paciente->nacionalidad }}</td>

                <td></td>
            </tr>
            <tr class="item">
                <td>Nivel educativo</td>

                <td></td>
            </tr>
            <tr class="item">
                <td>Nivel de estudio: {{ $paciente->nivel_educativo }}</td>

                <td></td>
            </tr>
            <tr class="item">
                <td>Año cursado: {{ $paciente->año_cursado }}</td>

                <td></td>
            </tr>


            <tr class="heading">
                <td>Datos residenciales</td>

                <td></td>
            </tr>

            <tr class="item">
                <td>Pais: {{ $residencia->pais }}</td>

                <td></td>
            </tr>

            <tr class="item">
                <td>Departamento: {{ $residencia->departamento }}</td>

                <td></td>
            </tr>
            <tr class="item">
                <td>Barrio: {{ $residencia->barrio }}</td>

                <td></td>
            </tr>
            <tr class="item">
                <td>Dirección: {{ $residencia->direccion }}</td>

                <td></td>
            </tr>
            <tr class="item">
                <td>Nro de casa: {{ $residencia->nro_casa }}</td>

                <td></td>
            </tr>
            <tr class="item">
                <td>Referencia: {{ $residencia->referencia }}</td>

                <td></td>
            </tr>

            @if ($parentales)
                <tr class="heading">
                    <td>Datos del padre</td>

                    <td></td>
                </tr>

                <tr class="item">
                    <td>Apellido y Nombre: {{ $parentales->apellido }} {{ $parentales->nombre }}</td>

                    <td></td>
                </tr>

                <tr class="item">
                    <td>Edad: {{ $parentales->edad }}</td>

                    <td></td>
                </tr>
                <tr class="item">
                    <td>Tipo de documento: {{ $parentales->tipo_documento }}</td>

                    <td></td>
                </tr>
                <tr class="item">
                    <td>Documento: {{ $parentales->documento }}</td>

                    <td></td>
                </tr>
                <tr class="item">
                    <td>Estado civil: {{ $parentales->estado_civil }}</td>

                    <td></td>
                </tr>
                <tr class="item">
                    <td>Nivel de estudio: {{ $parentales->nivel_educativo }}</td>

                    <td></td>
                </tr>
                <tr class="item">
                    <td>Ocupacion: {{ $parentales->ocupacion }}</td>

                    <td></td>
                </tr>
                <tr class="item">
                    <td>Otros: {{ $residencia->otros }}</td>

                    <td></td>
                </tr>
            @endif

            @if ($maternales)
                <tr class="heading">
                    <td>Datos de la madre</td>

                    <td></td>
                </tr>

                <tr class="item">
                    <td>Apellido y Nombre: {{ $maternales->apellido }} {{ $maternales->nombre }}</td>

                    <td></td>
                </tr>

                <tr class="item">
                    <td>Edad: {{ $maternales->edad }}</td>

                    <td></td>
                </tr>
                <tr class="item">
                    <td>Tipo de documento: {{ $maternales->tipo_documento }}</td>

                    <td></td>
                </tr>
                <tr class="item">
                    <td>Documento: {{ $maternales->documento }}</td>

                    <td></td>
                </tr>
                <tr class="item">
                    <td>Estado civil: {{ $maternales->estado_civil }}</td>

                    <td></td>
                </tr>
                <tr class="item">
                    <td>Nivel de estudio: {{ $maternales->nivel_educativo }}</td>

                    <td></td>
                </tr>
                <tr class="item">
                    <td>Ocupacion: {{ $maternales->ocupacion }}</td>

                    <td></td>
                </tr>
                <tr class="item">
                    <td>Otros: {{ $maternales->otros }}</td>

                    <td></td>
                </tr>
            @endif

            @if ($examen)
                <tr class="heading">
                    <td>Examen Físico</td>

                    <td></td>
                </tr>

                <tr class="item">
                    <td>Pulsos: {{ $examen->pulsos }}</td>

                    <td></td>
                </tr>
                <tr class="item">
                    <td>FR: {{ $examen->FR }}</td>

                    <td></td>
                </tr>
                <tr class="item">
                    <td>FC: {{ $examen->FC }}</td>

                    <td></td>
                </tr>
                <tr class="item">
                    <td>T° Axilar: {{ $examen->t_axilar }}</td>

                    <td></td>
                </tr>
                <tr class="item">
                    <td>Peso: {{ $examen->peso }}</td>

                    <td></td>
                </tr>
                <tr class="item">
                    <td>Talla: {{ $examen->talla }}</td>

                    <td></td>
                </tr>
                <tr class="item">
                    <td>IMC: {{ $examen->imc }}</td>

                    <td></td>
                </tr>
                <tr class="item">
                    <td>Estado Nutricional: {{ $examen->estado_nutricional }}</td>

                    <td></td>
                </tr>
                <tr class="item">
                    <td>Otros datos de interes: {{ $examen->otros }}</td>

                    <td></td>
                </tr>
            @endif



        </table>
    </div>
</body>

</html>
