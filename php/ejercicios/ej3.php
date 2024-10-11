<?php
/*
Dada una variable edad el programa mostrará si somos niños, jovenes, adultos o mayores.
Seremos niños hasta los 10 años, jovenes hasta 18 años, adultos hasta 35 años y mayores en adelante.
*/

$edad= 121;

if($edad<=0 | $edad>120){
    echo 'Error';
}elseif($edad >=0 & $edad<=10){
    echo 'Eres un niño.';
}elseif($edad<=18){
    echo 'Eres un joven.';
}elseif($edad <=35){
    echo 'Eres un adulto';
}elseif($edad>35 & $edad<120){
    echo 'Eres un mayor';
}
?>