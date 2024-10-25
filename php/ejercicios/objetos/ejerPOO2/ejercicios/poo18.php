<?php
declare(strict_types=1);

/**
 * 18 - Referencia y clonación de objetos.
 * Confeccionar una clase Cuadrado. Definir como atributo su lado.
 * Implementar un método que cargue el lado, otro que retorne su perímetro y otro que retorne su superficie.
 */

class Cuadrado {
    private float $lado;

    public function cargarLado(float $lado): void {
        $this->lado = $lado;
    }

    public function obtenerPerimetro(): float {
        return $this->lado * 4;
    }

    public function obtenerSuperficie(): float {
        return $this->lado ** 2;
    }
}

$cuadrado1 = new Cuadrado();
$cuadrado1->cargarLado(5);
$cuadrado2 = $cuadrado1;

echo "Perímetro: " . $cuadrado2->obtenerPerimetro() . "<br>";
echo "Superficie: " . $cuadrado2->obtenerSuperficie() . "<br>";
?>
