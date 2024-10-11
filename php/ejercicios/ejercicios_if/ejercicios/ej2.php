<!DOCTYPE html>
<html>
<?php
$jugador1 = rand(1, 6);
$jugador2 = rand(1, 6);
$mensaje = ($jugador1 == $jugador2) ? 'Empate, ambos jugadores sacaron ' . $jugador1 : 
          (($jugador1 > $jugador2) ? 'Ha ganado el jugador 1' : 'Ha ganado el jugador 2');
?>
<head>
    <title>Juego: Dado más alto</title>
</head>
<body>
    <h1>Juego: Dado más alto</h1>
    <p>Actualice la página para mostrar una nueva tirada</p>
    
    <h2>Jugador 1</h2>
    <img src="../dados/<?php echo $jugador1; ?>.svg" alt="Dado Jugador 1">
    
    <h2>Jugador 2</h2>
    <img src="../dados/<?php echo $jugador2; ?>.svg" alt="Dado Jugador 2">
    
    <h2>Resultado</h2>
    <p><?php echo $mensaje; ?></p>
</body>
</html>
