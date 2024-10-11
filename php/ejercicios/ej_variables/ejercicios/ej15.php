<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ataque Alienígena con SVG</title>
</head>
<body>

    <h1>Ataque Alienígena</h1>

    <?php
    $dado1 = rand(1, 6);
    $dado2 = rand(1, 6);
    $dado3 = rand(1, 6);
    $acumulado1 = $dado1;
    $acumulado2 = $acumulado1 + $dado2;
    $acumulado3 = $acumulado2 + $dado3;

    echo "<div class='dados'>";
    echo "<img src='../img/dados/$dado1.svg' alt='Dado 1' width='50'>";
    echo "<img src='../img/dados/$dado2.svg' alt='Dado 2' width='50'>";
    echo "<img src='../img/dados/$dado3.svg' alt='Dado 3' width='50'>";
    echo "</div>";
    ?>

    <svg width="600" height="100" xmlns="http://www.w3.org/2000/svg">
        <!-- Definir las casillas de la rejilla -->
        <?php for ($i = 0; $i < 15; $i++): ?>
            <rect x="<?php echo $i * 40; ?>" y="25" width="40" height="50" fill="none" stroke="black" />
        <?php endfor; ?>

        <text x="-40" y="55" font-size="30" id="nave">🛸
            <animate attributeName="x" from="-40" to="600" dur="5s" repeatCount="indefinite" />
        </text>

        <?php
        function explosionSVG($posicion) {
            $x = ($posicion - 1) * 40 + 10; // Calcular la posición de la explosión
            echo "<text x='$x' y='55' font-size='30' visibility='hidden' id='explosion-$posicion'>💥
                    <set attributeName='visibility' to='visible' begin='nave.begin + " . ($posicion * 0.33) . "s' />
                  </text>";
        }

        if ($acumulado1 <= 15) explosionSVG($acumulado1);
        if ($acumulado2 <= 15) explosionSVG($acumulado2);
        if ($acumulado3 <= 15) explosionSVG($acumulado3);
        ?>
    </svg>

</body>
</html>
