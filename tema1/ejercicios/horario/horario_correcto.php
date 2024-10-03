<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./stylesheet.css">
    <title>Horario DAW-24/25</title>
</head>
<body>
    <h1>HORARIO 2024/2025 DAW</h1>
    
    <?php
        $asignaturas = array("DAW", "DWES", "DIW", "DWEC", "LIBRE");
        $horas = array("16:00 - 16:50", "16:55 - 17:45", "17:50 - 18:40", "18:40 - 19:05", "19:05 - 19:55", "20:00 - 20:50", "20:55 - 21:45");
    ?>
    
    <table border="1">
        <tr>
            <th class='dia'>Horario</th>
            <th class='dia'>Lunes</th>
            <th class='dia'>Martes</th>
            <th class='dia'>Miércoles</th>
            <th class='dia'>Jueves</th>
            <th class='dia'>Viernes</th>
        </tr>

        <!-- Primera hora -->
        <tr>
            <td class='horas'><?= $horas[0] ?></td>
            <td class='diw' rowspan='2'><?= $asignaturas[2] ?></td>
            <td class='dwes'><?= $asignaturas[1] ?></td>
            <td class='dwec' rowspan='2'><?= $asignaturas[3] ?></td>
            <td class='diw' rowspan='2'><?= $asignaturas[2] ?></td>
            <td class='daw' rowspan='2'><?= $asignaturas[0] ?></td>
        </tr>

        <!-- Segunda hora -->
        <tr>
            <td class='horas'><?= $horas[1] ?></td>
            <td class='diw'><?= $asignaturas[2] ?></td>
        </tr>

        <!-- Tercera hora -->
        <tr>
            <td class='horas'><?= $horas[2] ?></td>
            <td class='dwes'><?= $asignaturas[1] ?></td>
            <td class='daw'><?= $asignaturas[0] ?></td>
            <td class='daw'><?= $asignaturas[0] ?></td>
            <td class='dwes'><?= $asignaturas[1] ?></td>
            <td class='diw'><?= $asignaturas[2] ?></td>
        </tr>

        <!-- Recreo -->
        <tr>
            <td class='horas'><?= $horas[3] ?></td>
            <td class='recreo' colspan='5'>RECREO</td>
        </tr>

        <!-- Cuarta hora -->
        <tr>
            <td class='horas'><?= $horas[4] ?></td>
            <td class='dwes'><?= $asignaturas[1] ?></td>
            <td class='dwec' rowspan='2'><?= $asignaturas[3] ?></td>
            <td class='daw'><?= $asignaturas[0] ?></td>
            <td class='dwes'><?= $asignaturas[1] ?></td>
            <td class='diw'><?= $asignaturas[2] ?></td>
        </tr>

        <!-- Quinta hora -->
        <tr>
            <td class='horas'><?= $horas[5] ?></td>
            <td class='dwec' rowspan='2'><?= $asignaturas[3] ?></td>
            <td class='dwes' rowspan='2'><?= $asignaturas[1] ?></td>
            <td class='libre' rowspan='2'><?= $asignaturas[4] ?></td>
            <td class='dwes' rowspan='2'><?= $asignaturas[1] ?></td>
        </tr>

        <!-- Sexta hora -->
        <tr>
            <td class='horas'><?= $horas[6] ?></td>
            <td class='libre'><?= $asignaturas[4] ?></td>
        </tr>
    </table>
</body>
</html>
