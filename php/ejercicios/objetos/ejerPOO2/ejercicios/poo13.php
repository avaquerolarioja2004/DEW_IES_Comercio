<?php
declare(strict_types=1);

/**
 * 13 - Sobreescritura de métodos.
 * Confeccionar una clase Persona que tenga como atributos el nombre y la edad.
 * Definir como responsabilidades un método que cargue los datos personales y otro que los imprima.
 * Plantear una segunda clase Empleado que herede de la clase Persona.
 * Añadir un atributo sueldo y los métodos de cargar el sueldo e imprimir todos los datos del empleado (sobreescribir el método imprimir de la clase Persona).
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

class Empleado4 extends Persona {
    private float $sueldo;

    public function cargarSueldo(float $sueldo): void {
        $this->sueldo = $sueldo;
    }

    public function imprimirDatos(): void {
        parent::imprimirDatos();
        echo "Sueldo: $this->sueldo<br>";
    }
}

$persona = new Persona();
$persona->cargarDatos("Luis", 40);
$persona->imprimirDatos();

$empleado = new Empleado4();
$empleado->cargarDatos("Ana", 30);
$empleado->cargarSueldo(2500.0);
$empleado->imprimirDatos();
?>
