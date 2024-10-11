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
            $asignaturas   = array("DAW", "DWES", "DIW", "DWEC", "LIBRE");
            $horas = array("16:00 - 16:50", "16:55 - 17:45", "17:50 - 18:40", 
            "18:40 - 19:05", "19:05 - 19:55", "20:00 - 20:50", "20:55 - 21:45");
            echo "<table border='1'>";
                echo "<tr>";
                    echo "  <th class='dia'>Horario</th>";
                    echo "  <th class='dia'>Lunes</th>";
                    echo "  <th class='dia'>Martes</th>";
                    echo "  <th class='dia'>Miércoles</th>";
                    echo "  <th class='dia'>Jueves</th>";
                    echo "  <th class='dia'>Viernes</th>";
                echo "</tr>";
                //primera hora
                echo "<tr>";
                    echo "<td class='horas'> " . $horas[0] . "</td>";
                    echo "<td class='diw' rowspan='2'> " . $asignaturas[2] . "</td>";
                    echo "<td class='dwes'> " . $asignaturas[1] . "</td>";
                    echo "<td class='dwec' rowspan='2'> " . $asignaturas[3] . "</td>";
                    echo "<td class='diw' rowspan='2'> " . $asignaturas[2] . "</td>";
                    echo "<td class='daw' rowspan='2'> " . $asignaturas[0] . "</td>";
                echo "</tr>";
                //segunda hora
                echo "<tr>";
                    echo "<td class='horas'> " . $horas[1] . "</td>";
                    echo "<td class='diw'> " . $asignaturas[2] . "</td>";
                echo "</tr>";
                //tercera hora
                echo "<tr>";
                    echo "<td class='horas'> " . $horas[2] . "</td>";
                    echo "<td class='dwes'> " . $asignaturas[1] . "</td>";
                    echo "<td class='daw'> " . $asignaturas[0] . "</td>";
                    echo "<td class='daw'> " . $asignaturas[0] . "</td>";
                    echo "<td class='dwes'> " . $asignaturas[1] . "</td>";
                    echo "<td class='diw'> " . $asignaturas[2] . "</td>";
                echo "</tr>";
                //recreo
                echo "<tr>";
                    echo "<td class='horas'> " . $horas[3] . "</td>";
                    echo "<td class='recreo' colspan='5'> " . "RECREO" . "</td>";
                echo "</tr>";
                //cuarta hora
                echo "<tr>";
                    echo "<td class='horas'> " . $horas[4] . "</td>";
                    echo "<td class='dwes'> " . $asignaturas[1] . "</td>";
                    echo "<td class='dwec' rowspan='2'> " . $asignaturas[3] . "</td>";
                    echo "<td class='daw'> " . $asignaturas[0] . "</td>";
                    echo "<td class='dwes'> " . $asignaturas[1] . "</td>";
                    echo "<td class='diw'> " . $asignaturas[2] . "</td>";
                echo "</tr>";
                //quinta hora
                echo "<tr>";
                    echo "<td class='horas'> " . $horas[5] . "</td>";
                    echo "<td class='dwec' rowspan='2'> " . $asignaturas[3] . "</td>";
                    echo "<td class='dwes' rowspan='2'> " . $asignaturas[1] . "</td>";
                    echo "<td class='libre' rowspan='2'> " . $asignaturas[4] . "</td>";
                    echo "<td class='dwes' rowspan='2'> " . $asignaturas[1] . "</td>";
                echo "</tr>";
                //sexta hora
                echo "<tr>";
                    echo "<td class='horas'> " . $horas[6] . "</td>";
                    echo "<td class='libre'> " . $asignaturas[4] . "</td>";
                echo "</tr>";
                echo "</table>";
        ?>
    </body>
</html>
