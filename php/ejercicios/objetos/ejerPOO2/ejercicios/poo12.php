<?php
declare(strict_types=1);

/**
 * 12 - Modificadores de acceso a atributos y métodos (protected).
 * Confeccionar una clase Persona que tenga como atributos protegidos, el nombre y la edad.
 * Definir como responsabilidades un método que cargue los datos personales y otro que los imprima.
 * Plantear una segunda clase Empleado que herede de la clase Persona.
 * Añadir un atributo sueldo y los métodos de cargar el sueldo e imprimir su sueldo.
 * Definir un objeto de la clase Empleado y tratar de modificar el atributo edad.
 */

class Persona {
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

class Empleado3 extends Persona {
    private float $sueldo;

    public function cargarSueldo(float $sueldo): void {
        $this->sueldo = $sueldo;
    }

    public function imprimirSueldo(): void {
        $this->imprimirDatos();
        echo "Sueldo: $this->sueldo<br>";
    }
}

$empleado = new Empleado3();
$empleado->cargarDatos("Ana", 30);
$empleado->cargarSueldo(2500.0);
$empleado->imprimirSueldo();

// No se puede acceder ni modificar el atributo protegido $edad desde fuera de la clase o sus hijos.
?>
