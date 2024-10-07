<!DOCTYPE html>
<html>
<?php

$aleatorio = rand(1, 10);
$numerosPosibles = "<p>";
$mensaje='';
$victoria='';
for ($i = 1; $i < 11; $i++) {
    $numerosPosibles .= '<a href="?numero=' . $i . '">' . $i . '</a><br>';
}
$numerosPosibles .= '</p>';
if (isset($_GET['numero'])) {
    if($_GET['numero'] == $aleatorio){
        $victoria.='Ganaste';
    }else{
        $victoria.='Vuelve a intentarlo';
    }
}else{
    $mensaje.='Selecciona un número';
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adivina</title>
</head>

<body>
    <p><?=$numerosPosibles?></p>
    <p><?=$mensaje?></p>
    <p><?=$victoria?></p>
</body>

</html>