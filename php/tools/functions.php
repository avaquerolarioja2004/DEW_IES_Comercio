<?php

declare(strict_types=1);

/*
Admite un entero y nos devuelve si es par y se llama isPar
*/

function isPar(int $var): bool
{

    if ($var % 2 == 0) {
        return True;
    } else {
        return False;
    }
}

/*
función que admite un valores fecha de formato fecha y devolvera una fecha formateada como dia/mes/año
*/
function fechaFormateada(string $fecha): string
{
    $dia_mes_ano=explode('/',$fecha);
    if (checkdate(intval($dia_mes_ano[0]),intval($dia_mes_ano[1]),intval($dia_mes_ano[2]))) {
        return str_replace('/','-',$fecha);
    } else {
        return null;
    }
}

/*
sanitizar admite una cadena y nos la devuelve sin ningun caracter especial (espacios, /, \) 
retornará la cadena traducina a html
*/

function sanitizar(string $var){
    echo htmlspecialchars($var);

    echo preg_replace('/[^a-zA-Z0-9]/', '', $var);
}

?>