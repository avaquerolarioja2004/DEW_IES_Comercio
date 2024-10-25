<?php
declare(strict_types=1);

/**
 * 10 - Parámetros opcionales.
 * Confeccionar una clase Empleado, definir como atributos su nombre y sueldo.
 * El constructor recibe como parámetros el nombre y el sueldo, en caso de no pasar el valor del sueldo inicializarlo con el valor 1000.
 * Confeccionar otro método que imprima el nombre y el sueldo.
 */

class Empleado {
    private string $nombre;
    private float $sueldo;

    public function __construct(string $nombre, float $sueldo = 1000.0) {
        $this->nombre = $nombre;
        $this->sueldo = $sueldo;
    }

    public function imprimir(): void {
        echo "Nombre: $this->nombre, Sueldo: $this->sueldo<br>";
    }
}

$empleado1 = new Empleado("Carlos");
$empleado2 = new Empleado("Ana", 1500.0);

$empleado1->imprimir();
$empleado2->imprimir();
?>
