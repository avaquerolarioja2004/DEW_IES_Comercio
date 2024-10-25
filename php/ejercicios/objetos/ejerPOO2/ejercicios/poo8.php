<?php
declare(strict_types=1);

/**
 * 8 - Colaboración de objetos.
 * Confeccionar la clase Tabla vista en conceptos anteriores.
 * Plantear una clase Celda que colabore con la clase Tabla.
 * La clase Tabla debe definir una matriz de objetos de la clase Celda.
 */

class Celda {
    public string $texto;
    public string $colorFuente;
    public string $colorFondo;

    public function __construct(string $texto = '', string $colorFuente = '', string $colorFondo = '') {
        $this->texto = $texto;
        $this->colorFuente = $colorFuente;
        $this->colorFondo = $colorFondo;
    }
}

class Tabla {
    private int $filas;
    private int $columnas;
    private array $celdas;

    public function __construct(int $filas, int $columnas) {
        $this->filas = $filas;
        $this->columnas = $columnas;
        $this->celdas = [];
        for ($i = 0; $i < $filas; $i++) {
            for ($j = 0; $j < $columnas; $j++) {
                $this->celdas[$i][$j] = new Celda();
            }
        }
    }

    public function cargarCelda(int $fila, int $columna, Celda $celda): void {
        $this->celdas[$fila][$columna] = $celda;
    }

    public function mostrar(): void {
        echo '<table border="1">';
        foreach ($this->celdas as $fila) {
            echo '<tr>';
            foreach ($fila as $celda) {
                echo '<td style="color:' . $celda->colorFuente . '; background-color:' . $celda->colorFondo . ';">' . $celda->texto . '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    }
}

$tabla = new Tabla(3, 3);
$celda1 = new Celda('Texto A1', 'red', 'yellow');
$tabla->cargarCelda(0, 0, $celda1);
$tabla->mostrar();
?>
