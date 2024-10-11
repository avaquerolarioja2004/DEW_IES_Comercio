<?php

$d1 = file_get_contents('./dados/d1.svg');
$d2 = file_get_contents('./dados/d2.svg');
$d3 = file_get_contents('./dados/d3.svg');
$d4 = file_get_contents('./dados/d4.svg');
$d5 = file_get_contents('./dados/d5.svg');
$d6 = file_get_contents('./dados/d6.svg');

    $var = rand(1, 6);
    $var2 = rand(1, 6);
    echo $var == 1 ? $d1 : 
        ($var == 2 ? $d2 : 
        ($var == 3 ? $d3 : 
        ($var == 4 ? $d4 : 
        ($var == 5 ? $d5 : $d6))));

    echo $var2 == 1 ? $d1 : 
        ($var2 == 2 ? $d2 : 
        ($var2 == 3 ? $d3 : 
        ($var2 == 4 ? $d4 : 
        ($var2 == 5 ? $d5 : $d6))));

    if($var==6 && $var==$var2){
        echo '<br>';
        echo '<h2>&#128512</h2>';
    }
    echo '<br>';
    echo $var + $var2;

?>
