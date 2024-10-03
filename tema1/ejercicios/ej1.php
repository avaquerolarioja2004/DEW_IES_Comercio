<?php
/*
crea un script de php que recoja la dirección del host
que la invierta 
que muestre el número de caracteres que tiene 
que sustituya los . por -
y que la dirección original la introduzca en un array.
*/

if(isset($_SERVER['HTTP_USER_AGENT'])){
    $ip = $_SERVER['HTTP_USER_AGENT'];
}else{
    $resultado='desde terminal';
}

?>