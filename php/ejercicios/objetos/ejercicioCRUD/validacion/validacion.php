<?php
declare(strict_types=1);
require_once __DIR__ . '/validacionABS.php';
class Validacion extends ValidacionABS{
    public static function validarEntrada(string $var) : string {
        return htmlentities(trim($var));
    }
}