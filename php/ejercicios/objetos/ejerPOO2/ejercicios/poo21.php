<?php
declare(strict_types=1);

/**
 * 21 - Método destructor de una clase (__destruct).
 * Confeccionar una clase que contenga un constructor y un destructor.
 * Hacer que cada método imprima un mensaje en la página indicando que se ha ejecutado dicho método.
 */

class Ejemplo {
    public function __construct() {
        echo "El constructor ha sido ejecutado.<br>";
    }

    public function __destruct() {
        echo "El destructor ha sido ejecutado.<br>";
    }
}

$objeto = new Ejemplo();
// Al finalizar el script o al eliminar explícitamente el objeto, se ejecutará el destructor.
?>
