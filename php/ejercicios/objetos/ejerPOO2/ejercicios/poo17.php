<?php
declare(strict_types=1);
namespace Ejercicio17;
/**
 * 17 - Métodos y clases final.
 * Confeccionar una clase Persona que tenga como atributos el nombre y la edad.
 * Definir como responsabilidades un método final que cargue los datos personales.
 */

final class Persona {
    private string $nombre;
    private int $edad;

    final public function cargarDatos(string $nombre, int $edad): void {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    public function imprimirDatos(): void {
        echo "Nombre: $this->nombre, Edad: $this->edad<br>";
    }
}

// No se puede heredar de una clase final
$persona = new Persona();
$persona->cargarDatos("Luis", 45);
$persona->imprimirDatos();
?>
