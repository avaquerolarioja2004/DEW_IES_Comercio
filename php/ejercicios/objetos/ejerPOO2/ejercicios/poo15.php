<?php
declare(strict_types=1);
namespace Ejercicio15;
/**
 * 15 - Clases abstractas y concretas.
 * Confeccionar una clase abstracta Persona que tenga como atributos el nombre y la edad.
 * Definir como responsabilidades un método que cargue los datos personales y otro que los imprima.
 * Plantear una segunda clase Empleado que herede de la clase Persona.
 * Añadir un atributo sueldo y los métodos de cargar el sueldo e imprimir su sueldo.
 */

abstract class Persona {
    protected string $nombre;
    protected int $edad;

    public function cargarDatos(string $nombre, int $edad): void {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    public function imprimirDatos(): void {
        echo "Nombre: $this->nombre, Edad: $this->edad<br>";
    }
}

class Empleado6 extends Persona {
    private float $sueldo;

    public function cargarSueldo(float $sueldo): void {
        $this->sueldo = $sueldo;
    }

    public function imprimirSueldo(): void {
        $this->imprimirDatos();
        echo "Sueldo: $this->sueldo<br>";
    }
}

//$persona = new Persona(); // Esto generaría un error, ya que Persona es abstracta.
$empleado = new Empleado6();
$empleado->cargarDatos("Ana", 30);
$empleado->cargarSueldo(2500.0);
$empleado->imprimirSueldo();
?>
