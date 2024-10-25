<?php
declare(strict_types=1);

/**
 * 16 - Métodos abstractos.
 * Plantear una clase abstracta Trabajador. Definir como atributo su nombre y sueldo.
 * Declarar un método abstracto: calcularSueldo.
 * Definir otro método para imprimir el nombre y su sueldo.
 * Plantear una subclase Empleado y otra clase Gerente.
 */

abstract class Trabajador {
    protected string $nombre;
    protected float $sueldo;

    public function __construct(string $nombre) {
        $this->nombre = $nombre;
    }

    abstract public function calcularSueldo(): void;

    public function imprimirDatos(): void {
        echo "Nombre: $this->nombre, Sueldo: $this->sueldo<br>";
    }
}

class Empleado extends Trabajador {
    private int $horasTrabajadas;
    private float $valorHora = 3.50;

    public function __construct(string $nombre, int $horasTrabajadas) {
        parent::__construct($nombre);
        $this->horasTrabajadas = $horasTrabajadas;
    }

    public function calcularSueldo(): void {
        $this->sueldo = $this->horasTrabajadas * $this->valorHora;
    }
}

class Gerente extends Trabajador {
    private float $utilidades;

    public function __construct(string $nombre, float $utilidades) {
        parent::__construct($nombre);
        $this->utilidades = $utilidades;
    }

    public function calcularSueldo(): void {
        $this->sueldo = $this->utilidades * 0.10;
    }
}

$empleado = new Empleado("Juan", 40);
$empleado->calcularSueldo();
$empleado->imprimirDatos();

$gerente = new Gerente("Ana", 50000);
$gerente->calcularSueldo();
$gerente->imprimirDatos();
?>
