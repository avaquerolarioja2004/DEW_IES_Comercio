<?php
declare(strict_types=1);

/**
 * 6 - Llamada de métodos dentro de la clase.
 * Confeccionar una clase Tabla que permita indicarle en el constructor la cantidad de filas y columnas.
 * Definir otra responsabilidad que podamos cargar un dato en una determinada fila y columna además de definir su color de fuente y fondo.
 * Finalmente debe mostrar los datos en una tabla HTML.
 */

class Tabla {
    private int $filas;
    private int $columnas;
    private array $datos;

    public function __construct(int $filas, int $columnas) {
        $this->filas = $filas;
        $this->columnas = $columnas;
        $this->datos = array_fill(0, $filas, array_fill(0, $columnas, ['texto' => '', 'colorFuente' => '', 'colorFondo' => '']));
    }

    public function cargarDato(int $fila, int $columna, string $texto, string $colorFuente, string $colorFondo): void {
        $this->datos[$fila][$columna] = [
            'texto' => $texto,
            'colorFuente' => $colorFuente,
            'colorFondo' => $colorFondo,
        ];
    }

    public function mostrar(): void {
        echo '<table border="1">';
        foreach ($this->datos as $fila) {
            echo '<tr>';
            foreach ($fila as $celda) {
                echo '<td style="color:' . $celda['colorFuente'] . '; background-color:' . $celda['colorFondo'] . ';">' . $celda['texto'] . '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    }
}

$tabla = new Tabla(3, 3);
$tabla->cargarDato(0, 0, 'A1', 'red', 'yellow');
$tabla->cargarDato(1, 1, 'B2', 'blue', 'green');
$tabla->mostrar();
?>
