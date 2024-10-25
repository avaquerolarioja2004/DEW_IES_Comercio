<?php
declare(strict_types=1);

/**
 * 14 - Sobreescritura del constructor.
 * Confeccionar una clase Persona que tenga como atributos el nombre y la edad.
 * El constructor recibe los datos para inicializar dichos atributos.
 * Otro método imprime los datos.
 * Plantear una segunda clase Empleado que herede de la clase Persona.
 * Añadir un atributo sueldo. El constructor recibe los tres atributos de la clase Empleado.
 * Llamar al constructor de la clase padre para inicializar los atributos nombre y edad del Empleado.
 */

class Persona {
    protected string $nombre;
    protected int $edad;

    public function __construct(string $nombre, int $edad) {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    public function imprimirDatos(): void {
        echo "Nombre: $this->nombre, Edad: $this->edad<br>";
    }
}

class Empleado5 extends Persona {
    private float $sueldo;

    public function __construct(string $nombre, int $edad, float $sueldo) {
        parent::__construct($nombre, $edad);
        $this->sueldo = $sueldo;
    }

    public function imprimirDatos(): void {
        parent::imprimirDatos();
        echo "Sueldo: $this->sueldo<br>";
    }
}

$persona = new Persona("Luis", 40);
$persona->imprimirDatos();

$empleado = new Empleado5("Ana", 30, 3000.0);
$empleado->imprimirDatos();
?>
