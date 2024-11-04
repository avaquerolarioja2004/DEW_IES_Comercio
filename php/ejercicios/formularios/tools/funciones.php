<?php
function sanitizar($var){
    return htmlentities(trim($var));
}

/*
    Permite:
        letras de a-Z 
        vocales acentuadas á-Ú
        espacios
        minimo 2 caracteres
*/
function validarUsuario($var): string|false {
    $regex = '/^[A-Za-zÁÉÍÓÚáéíóúñÑ\s]{2,}$/';
    if (preg_match($regex, $var)) {
        return $var;
    } else {
        return false;
    }
}


function validarEmail($var): string|false {
    if (filter_var($var, FILTER_VALIDATE_EMAIL)) {
        return $var;
    } else {
        return false;
    }
}