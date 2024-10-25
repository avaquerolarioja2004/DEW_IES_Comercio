<?php
declare(strict_types=1);

/**
 * 7 - Modificadores de acceso a atributos y métodos (public - private).
 * Confeccionar una clase Menu. Permitir añadir la cantidad de opciones que necesitemos.
 * Mostrar el menú en forma horizontal o vertical, pasar a este método como parámetro el texto "horizontal" o "vertical".
 * El método mostrar debe llamar alguno de los dos métodos privados mostrarHorizontal() o mostrarVertical().
 */

class Menu {
    private array $opciones = [];

    public function agregarOpcion(string $opcion): void {
        $this->opciones[] = $opcion;
    }

    public function mostrar(string $orientacion): void {
        if ($orientacion === "horizontal") {
            $this->mostrarHorizontal();
        } elseif ($orientacion === "vertical") {
            $this->mostrarVertical();
        }
    }

    private function mostrarHorizontal(): void {
        echo '<nav style="display: flex;">';
        foreach ($this->opciones as $opcion) {
            echo '<div style="margin: 0 10px;">' . $opcion . '</div>';
        }
        echo '</nav>';
    }

    private function mostrarVertical(): void {
        echo '<ul>';
        foreach ($this->opciones as $opcion) {
            echo '<li>' . $opcion . '</li>';
        }
        echo '</ul>';
    }
}

$menu = new Menu();
$menu->agregarOpcion("Inicio");
$menu->agregarOpcion("Servicios");
$menu->agregarOpcion("Contacto");
$menu->mostrar("horizontal");
?>
