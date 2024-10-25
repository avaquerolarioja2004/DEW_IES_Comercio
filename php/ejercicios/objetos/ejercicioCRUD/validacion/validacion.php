<?php
declare(strict_types=1);

class Validacion implements ValidacionABS{
    public static function validarEntrada(string $var) : string {
        return htmlentities(trim($var));
    }
}