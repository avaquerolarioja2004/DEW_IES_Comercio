<?php
// obliga a tipar las variables
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
    if(is_numeric($dia_mes_ano[0]) && is_numeric($dia_mes_ano[1]) && is_numeric($dia_mes_ano[2])){
        if (checkdate(intval($dia_mes_ano[0]),intval($dia_mes_ano[1]),intval($dia_mes_ano[2]))) {
            return str_replace('/','-',$fecha);
        } else {
            return 'null';
        }
    }else{
        return 'null';
    }
}

/*
sanitizar admite una cadena y nos la devuelve sin ningun caracter especial (espacios, /, \) 
retornará la cadena traducina a html
*/

function sanitizar(string $var) : string {
    return htmlentities(trim($var));
}

/*
crea una funciom que reciba un array y que saque el máximo valor
*/

function maxValueArray(...$var) : int {
    $max=PHP_INT_MIN;
    for ($i=0; $i < count($var); $i++) {
        if(is_array($var[$i])){
            $maxIterativo = maxValueArray(...$var[$i]);
            if ($maxIterativo > $max) {
                $max = $maxIterativo;
            }
        }elseif(is_numeric($var[$i])){
            if($var[$i]>$max){
                $max=$var[$i];
            }
        }
    }
    return intval($max);
}

/*
generar una función al que se le pasa un array asociativo, y el array será referencia => descripción
debe generar un nav con todas sus referencias y sus descripciones
*/

function genNav(array $asociativo): string {
    $var = '';
    foreach ($asociativo as $key => $value) {
        $var .= '<a href="' . $value . '">' . $key . '</a><br>';
    }
    return $var;
}


?>