<?php
/*
    Solicita una variable y el programa indica el tipo de cada una usando operador ternario
    Entero/Booleano/Texto/Null/Float/Char
*/
$var = trim(fgets(STDIN));

$tipo = empty($var) ? 
    'null' : 
    (is_numeric($var) ? 
        (str_contains($var, '.') ? 'float' : 'int') : 
        (strtolower($var)==="false" || strtolower($var)==="true" ? 
            'bool' : 
            (strlen($var)===1 ? 
                'char' : 
                'cadena de texto')));
echo $tipo;
?>