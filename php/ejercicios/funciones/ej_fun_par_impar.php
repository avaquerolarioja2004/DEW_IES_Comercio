<?php
// aprender de include
include '../../tools/functions.php';
echo "\n";
echo 'Test';
echo "\n";
if(isPar(10)){
    echo 'Par';
}else{
    echo 'Impar';
}
echo "\n";


/*
10 numeros aleatorios entre 0-20 en un array y quiero recorrer el array y que me diga si cada uno de ellos es par o impar
*/

//forma1
echo "\n";
echo 'Forma 1';
echo "\n";
$arrayNumero=[];
for ($i=0; $i < 10; $i++) { 
    $arrayNumero[$i]=rand(0,20);
}
$num=count($arrayNumero);
for ($i=0; $i < $num; $i++) { 
    if(isPar($arrayNumero[$i])){
        echo 'Par';
    }else{
        echo 'Impar';
    }
    echo "\n";
}
echo "\n";
echo 'Forma 2';
echo "\n";

//forma2
$num=count($arrayNumero);
for ($i=0; $i < $num; $i++) { 
    if(array_map('isPar', $arrayNumero)){
        echo 'Par';
    }else{
        echo 'Impar';
    }
    echo "\n";
}
?>