<?php
declare(strict_types=1);

/**
 * 9 - Parámetros de tipo objeto.
 * Confeccionar la clase Tabla vista en conceptos anteriores.
 * Plantear una clase Celda que colabore con la clase Tabla.
 * La clase Tabla debe definir una matriz de objetos de la clase Celda.
 * En la clase Tabla definir un método insertar que reciba un objeto de la clase Celda y además dos enteros que indiquen que posición debe tomar dicha celda en la tabla.
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
        $this->celdas = array_fill(0, $filas, array_fill(0, $columnas, new Celda()));
    }

    public function insertarCelda(Celda $celda, int $fila, int $columna): void {
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
$celda = new Celda('Texto C1', 'green', 'lightblue');
$tabla->insertarCelda($celda, 0, 0);
$tabla->mostrar();
?>
