<?php
declare(strict_types=1);
class CocheDeportivo extends Coche{
    private int $velocidad_max;
    function __construct(string $marca, string $modelo, int $ano, int $velocidad_max)
    {
        $this->marca=$marca;
        $this->modelo=$modelo;
        $this->ano=$ano;
        $this->encendido=false;
        $this->velocidad_max=$velocidad_max;
    }

    function acelerar(){
        
    }
}


?>