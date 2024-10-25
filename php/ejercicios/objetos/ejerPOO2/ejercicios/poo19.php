<?php
declare(strict_types=1);

/**
 * 19 - función __clone().
 * Crear la clase Persona y cuando se clone un objeto de dicha clase almacenar en el atributo edad la edad actual más uno.
 */

class Persona {
    public int $edad;

    public function __construct(int $edad) {
        $this->edad = $edad;
    }

    public function __clone() {
        $this->edad += 1;
    }
}

$persona1 = new Persona(20);
$persona2 = clone $persona1;

echo "Edad original: " . $persona1->edad . "<br>";
echo "Edad clonada: " . $persona2->edad . "<br>";
?>
