<?php
declare(strict_types=1);
class Coche{
    protected string $marca;
    protected string $modelo;
    protected int $ano;
    protected bool $encendido;

    function __construct(string $marca, string $modelo, int $ano)
    {
        $this->marca=$marca;
        $this->modelo=$modelo;
        $this->ano=$ano;
        $this->encendido=false;
    }

    public function setMarca(string $marca):bool{
        if($this->marca=$marca){
            return true;
        }else{
            return false;
        }
    }

    public function setModelo(string $modelo):bool{
        if($this->modelo=$modelo){
            return true;
        }else{
            return false;
        }
    }

    public function setAno(int $ano):bool{
        if($this->ano=$ano){
            return true;
        }else{
            return false;
        }
    }

    public function encender():bool{
        if(!$this->encendido){
            if($this->encendido=true){
                return true;
            }else{
                return false;
            }
        }else{
            $this->apagar();
        }
    }

    public function Apagar():bool{
        if($this->encendido=false){
            return true;
        }else{
            return false;
        }
    }

    public function GetModelo():string{
        return $this->modelo;
    }

    public function GetMarca():string{
        return $this->marca;
    }

    public function GetAno():int{
        return $this->ano;
    }

    public function GetEncendido():bool{
        return $this->encendido;
    }

    function __destruct()
    {
        echo "Este coche era un: {$this->GetMarca()}, {$this->GetModelo()} y del año {$this->GetAno()} y está {$this->GetEncendido()}";
    }
}
?>