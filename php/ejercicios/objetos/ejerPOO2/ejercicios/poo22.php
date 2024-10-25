<?php
declare(strict_types=1);

/**
 * 22 - Métodos estáticos de una clase (static).
 * Plantear una clase Calculadora que contenga cuatro métodos estáticos (sumar, restar, multiplicar y dividir).
 * Estos métodos reciben dos valores.
 */

class Calculadora {
    public static function sumar(float $a, float $b): float {
        return $a + $b;
    }

    public static function restar(float $a, float $b): float {
        return $a - $b;
    }

    public static function multiplicar(float $a, float $b): float {
        return $a * $b;
    }

    public static function dividir(float $a, float $b) {
        if ($b === 0.0) {
            return 'ERROR NO SE PUEDE DIVIDIR ENTRE 0';
        }
        return $a / $b;
    }
}

// Ejemplo de uso de los métodos estáticos
echo "Suma: " . Calculadora::sumar(10, 5) . "<br>";
echo "Resta: " . Calculadora::restar(10, 5) . "<br>";
echo "Multiplicación: " . Calculadora::multiplicar(10, 5) . "<br>";
echo "División: " . Calculadora::dividir(10, 5) . "<br>";
echo "División: " . Calculadora::dividir(10, 0) . "<br>";
?>
