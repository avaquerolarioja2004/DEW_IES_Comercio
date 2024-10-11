<!DOCTYPE html>
<html>
<?php
$jugador1 = rand(1, 6);
$jugador2 = rand(1, 6);
$jugador11 = rand(1, 6);
$jugador22 = rand(1, 6);
$mensaje='';
if($jugador1==$jugador11){
    if($jugador2==$jugador22){
        if($jugador1>$jugador2){
            $mensaje='Gana Jugador 1';
        }elseif($jugador1<$jugador2){
            $mensaje='Gana Jugador 2';
        }else{
            $mensaje='Empate';
        }
    }else{
        $mensaje='Gana Jugador 1';
    }
}else{
    if($jugador2==$jugador22){
        $mensaje='Gana Jugador 2';
    }else{
        if(max($jugador1, $jugador11)>max($jugador2, $jugador22)){
            $mensaje='Gana Jugador 1';
        }elseif(max($jugador1, $jugador11)<max($jugador2, $jugador22)){
            $mensaje='Gana Jugador 2';
        }else{
            $mensaje='Empate';
        }
    }
}
?>
<head>
    <title>Juego: Dado más alto por parejas</title>
</head>
<body>
    <h1>Juego: Dado más alto por parejas</h1>
    <p>Actualice la página para mostrar una nueva tirada</p>
    
    <h2>Jugador 1</h2>
    <img src="../dados/<?php echo $jugador1; ?>.svg" alt="Dado Jugador 1-1">
    <img src="../dados/<?php echo $jugador11; ?>.svg" alt="Dado Jugador 1-2">
    
    <h2>Jugador 2</h2>
    <img src="../dados/<?php echo $jugador2; ?>.svg" alt="Dado Jugador 2-1">
    <img src="../dados/<?php echo $jugador22; ?>.svg" alt="Dado Jugador 2-2">
    
    <h2>Resultado</h2>
    <p><?php echo $mensaje; ?></p>
</body>
</html>
