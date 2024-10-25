<?php
declare(strict_types=1);
namespace Ejercicio20;
/**
 * 20 - Operador instanceof.
 * Plantear una clase Trabajador. Crear un vector con 3 empleados y 2 gerentes.
 * Mostrar el nombre y sueldo del gerente que gana más en la empresa.
 */

class Trabajador {
    protected string $nombre;
    protected float $sueldo;

    public function __construct(string $nombre, float $sueldo) {
        $this->nombre = $nombre;
        $this->sueldo = $sueldo;
    }

    public function obtenerNombre(): string {
        return $this->nombre;
    }

    public function obtenerSueldo(): float {
        return $this->sueldo;
    }
}

class Empleado extends Trabajador {

}
class Gerente extends Trabajador {

}

$trabajadores = [
    new Empleado("Empleado1", 1000),
    new Empleado("Empleado2", 1500),
    new Gerente("Gerente1", 3000),
    new Gerente("Gerente2", 4000),
    new Empleado("Empleado3", 1200)
];

$gerenteMaxSueldo = null;

foreach ($trabajadores as $trabajador) {
    if ($trabajador instanceof Gerente) {
        if ($gerenteMaxSueldo === null || $trabajador->obtenerSueldo() > $gerenteMaxSueldo->obtenerSueldo()) {
            $gerenteMaxSueldo = $trabajador;
        }
    }
}

if ($gerenteMaxSueldo !== null) {
    echo "El gerente con mayor sueldo es: " . $gerenteMaxSueldo->obtenerNombre() . " con un sueldo de " . $gerenteMaxSueldo->obtenerSueldo() . "<br>";
}
?>
