<!DOCTYPE html>
<html>
<head>
    <title>Juego de Dados</title>
</head>
<body>
    <?php
    // Lanzar dados para dos jugadores
    $jugador1_dado1 = rand(1, 6);
    $jugador1_dado2 = rand(1, 6);
    $jugador1_dado3 = rand(1, 6);

    $jugador2_dado1 = rand(1, 6);
    $jugador2_dado2 = rand(1, 6);
    $jugador2_dado3 = rand(1, 6);

    // Evaluar resultados para Jugador 1
    $trio1 = ($jugador1_dado1 == $jugador1_dado2 && $jugador1_dado2 == $jugador1_dado3);
    $par1 = ($jugador1_dado1 == $jugador1_dado2 || $jugador1_dado1 == $jugador1_dado3 || $jugador1_dado2 == $jugador1_dado3);
    $suma1 = $jugador1_dado1 + $jugador1_dado2 + $jugador1_dado3;

    // Evaluar resultados para Jugador 2
    $trio2 = ($jugador2_dado1 == $jugador2_dado2 && $jugador2_dado2 == $jugador2_dado3);
    $par2 = ($jugador2_dado1 == $jugador2_dado2 || $jugador2_dado1 == $jugador2_dado3 || $jugador2_dado2 == $jugador2_dado3);
    $suma2 = $jugador2_dado1 + $jugador2_dado2 + $jugador2_dado3;

    // Determinar el mensaje de resultado
    $mensaje = '';

    if ($trio1 && $trio2) {
        if ($jugador1_dado1 == $jugador1_dado2 && $jugador1_dado2 == $jugador1_dado3) {
            $valorTrio1 = $jugador1_dado1;
        }

        if ($jugador2_dado1 == $jugador2_dado2 && $jugador2_dado2 == $jugador2_dado3) {
            $valorTrio2 = $jugador2_dado1;
        }

        if ($valorTrio1 > $valorTrio2) {
            $mensaje = 'Jugador 1 gana con un trío de ' . $valorTrio1;
        } elseif ($valorTrio1 < $valorTrio2) {
            $mensaje = 'Jugador 2 gana con un trío de ' . $valorTrio2;
        } else {
            $mensaje = 'Empate, ambos jugadores tienen un trío de ' . $valorTrio1;
        }
    } elseif ($trio1) {
        $mensaje = 'Jugador 1 gana con un trío de ' . $jugador1_dado1;
    } elseif ($trio2) {
        $mensaje = 'Jugador 2 gana con un trío de ' . $jugador2_dado1;
    } elseif ($par1 && $par2) {
        $maxPar1 = ($jugador1_dado1 == $jugador1_dado2) ? $jugador1_dado1 : (($jugador1_dado1 == $jugador1_dado3) ? $jugador1_dado1 : $jugador1_dado2);
        $maxPar2 = ($jugador2_dado1 == $jugador2_dado2) ? $jugador2_dado1 : (($jugador2_dado1 == $jugador2_dado3) ? $jugador2_dado1 : $jugador2_dado2);

        if ($maxPar1 > $maxPar2) {
            $mensaje = 'Jugador 1 gana con un par de ' . $maxPar1;
        } elseif ($maxPar1 < $maxPar2) {
            $mensaje = 'Jugador 2 gana con un par de ' . $maxPar2;
        } else {
            $mensaje = 'Empate, ambos jugadores tienen un par de ' . $maxPar1;
        }
    } elseif ($par1) {
        $maxPar1 = ($jugador1_dado1 == $jugador1_dado2) ? $jugador1_dado1 : (($jugador1_dado1 == $jugador1_dado3) ? $jugador1_dado1 : $jugador1_dado2);
        $mensaje = 'Jugador 1 gana con un par de ' . $maxPar1;
    } elseif ($par2) {
        $maxPar2 = ($jugador2_dado1 == $jugador2_dado2) ? $jugador2_dado1 : (($jugador2_dado1 == $jugador2_dado3) ? $jugador2_dado1 : $jugador2_dado2);
        $mensaje = 'Jugador 2 gana con un par de ' . $maxPar2;
    } else {
        if ($suma1 > $suma2) {
            $mensaje = 'Jugador 1 gana con una puntuación total de ' . $suma1;
        } elseif ($suma1 < $suma2) {
            $mensaje = 'Jugador 2 gana con una puntuación total de ' . $suma2;
        } else {
            $mensaje = 'Empate, ambos jugadores tienen la misma puntuación total de ' . $suma1;
        }
    }
    ?>

    <h1>Juego de Dados</h1>
    <p>Actualice la página para lanzar los dados nuevamente.</p>
    
    <h2>Jugador 1</h2>
    <img src="../dados/<?php echo $jugador1_dado1; ?>.svg" alt="Dado: <?php echo $jugador1_dado1; ?>">
    <img src="../dados/<?php echo $jugador1_dado2; ?>.svg" alt="Dado: <?php echo $jugador1_dado2; ?>">
    <img src="../dados/<?php echo $jugador1_dado3; ?>.svg" alt="Dado: <?php echo $jugador1_dado3; ?>">

    <h2>Jugador 2</h2>
    <img src="../dados/<?php echo $jugador2_dado1; ?>.svg" alt="Dado: <?php echo $jugador2_dado1; ?>">
    <img src="../dados/<?php echo $jugador2_dado2; ?>.svg" alt="Dado: <?php echo $jugador2_dado2; ?>">
    <img src="../dados/<?php echo $jugador2_dado3; ?>.svg" alt="Dado: <?php echo $jugador2_dado3; ?>">

    <p><?= $mensaje ?></p>
</body>
</html>
