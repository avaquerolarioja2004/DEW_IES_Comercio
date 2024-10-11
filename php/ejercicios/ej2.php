<?php
/*
Crear un script de php que recoga la direccion del host que la invierta. Que muestre el numero
de caracteres que tiene, que sustituya los puntos por guiones y mque la direccion original
la introduzca en un array y muestra el nombre del fichero de ejecución
*/
$ip = $_SERVER['REMOTE_ADDR'];
$name = basename($_SERVER['PHP_SELF']);
$ipInversa = strrev($ip);
$ipLen = strlen($ip);
$ipReplace = str_replace('.','-',$ip);
$ipArray = str_split($ip, 4);
echo 'La ip es: ', $ip, "<br>";
echo 'La ip inversa es: ', $ipInversa, "<br>";
echo 'La longitud de la ip es: ', $ipLen, "<br>";
echo 'La ip remplazada es: ', $ipReplace, "<br>";
echo 'La ip en array es: ', $ipArray, "<br>";
echo $name;
?>