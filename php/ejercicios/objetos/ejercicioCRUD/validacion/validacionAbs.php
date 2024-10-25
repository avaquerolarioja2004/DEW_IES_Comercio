<?php
declare(strict_types=1);
abstract class ValidacionABS{ //Base para crear la validación
    // sanitizar entradas que introduzca el usuario
    public static abstract function validarEntrada(string $var):string;
}