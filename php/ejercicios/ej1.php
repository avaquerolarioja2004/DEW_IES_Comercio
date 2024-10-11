<?php
/*
crea un script de php que recoja la dirección del host
*/

if(isset($_SERVER['HTTP_USER_AGENT'])){
    $ip = $_SERVER['HTTP_USER_AGENT'];
}else{
    $resultado='desde terminal';
}

?>