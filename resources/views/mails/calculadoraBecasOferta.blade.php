<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table>
        <tr>
            <td>
                INSCRIPCIÓN <br>
                Con tu promoción &nbsp;&nbsp;&nbsp; {{ session('InscCB') }}
            </td>
            <td>
                4 PARCIALES DE <br>
                Beca del {{ session('Beca') }} &nbsp;&nbsp;&nbsp; {{ session('ParcCB') }}
            </td>
            <td>
                TOTAL A PAGAR EN 1er CUATRIMESTRE
                Promoción y Beca &nbsp;&nbsp;&nbsp; {{ session('TotalCB') }}
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td>
                <p>
                    Tu selección ha sido: Licenciatura en {{ session('Carrera') }} <br>
                    Plantel: {{ session('Plantel') }} en horario: {{ session('Turno') }} de {{ session('Turno') }} <br>
                    Inicio de clases {{ session('DescripPer') }} <br>
                    Vigencia: {{ session('Vigencia') }} <br>
                    Durante el cuatrimestre se deberan pagar 4 parcialidades indicadas en el Calendario Escolar. <br>
                    Para mayor información de los costos de reinscripción, acude al plantel de tu interes.
                </p>
            </td>
        </tr>
    </table>
</body>

</html>
