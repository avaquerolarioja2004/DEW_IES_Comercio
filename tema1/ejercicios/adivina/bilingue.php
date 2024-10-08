<!DOCTYPE html>
<html>
<?php
/*
Tendre un array de palabras español e ingles, de entre las palabras en español saldra una al cargar 
la página y me apareceran todas las posibles palabras en ingles. Si el usuario selecciona la correcta se le da la enhorabuena sino intentelo de nuevo.
*/
$texto='calor:hot,gato:cat,valiente:brave,uno:one,exclavo:slave,ganar:win';
$pares = explode(',', $texto);
$palabras = [];
foreach ($pares as $par) {
    $clave = explode(':', $par)[0];
    $valor = explode(':', $par)[1];
    $palabras[$clave] = $valor;
}

$ingles='<p>';
$palabraRand = array_rand($palabras);
foreach($palabras as $palabra){
    $ingles.='<a href="?palabra='.$palabraRand.'&valor='.$palabra.'">'.$palabra.'</a>&nbsp';
}
$ingles.='</p>';
$victoria='';
$mensaje='';
if(isset($_GET['palabra']) && isset($_GET['valor'])) {
    if($palabras[$_GET['palabra']] === $_GET['valor']) {
        $victoria = '¡Ganaste!';
    } else {
        $victoria = 'Vuelve a intentarlo';
    }
} else {
    $mensaje = 'Selecciona la traducción a inglés';
}
?>
<body>
    <h1><?=$palabraRand?></h1>
    <p><?=$ingles?></p>
    <p><?=$mensaje?></p>
    <p><?=$victoria?></p>
</body>
</html>