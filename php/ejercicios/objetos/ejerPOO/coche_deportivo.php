<?php
declare(strict_types=1);
class CocheDeportivo extends Coche{
    protected int $velocidad_max;
    function __construct(string $marca, string $modelo, int $ano, int $velocidad_max)
    {
        $this->marca=$marca;
        $this->modelo=$modelo;
        $this->ano=$ano;
        $this->encendido=false;
        $this->velocidad_max=$velocidad_max;
    }

    public function acelerar(){
        echo 'Acelerooooooooo';
    }

    public function getVelocidadMax():int{
        return $this->velocidad_max;
    }

    public function setVelocidadMax(int $velocidad_max):bool{
        if($this->velocidad_max=$velocidad_max){
            return true;
        }else{
            return false;
        }
    }

    function __destruct()
    {
        echo "Este coche era un: {$this->GetMarca()}, {$this->GetModelo()}, del año {$this->GetAno()}, tiene una velocidad máxima de {$this->GetVelocidadMax()} y está {$this->GetEncendido()}";
    }
}


?>