<?php
declare(strict_types=1);
require_once 'persona.php';
class Alumno extends Persona
{
    private static $contador = 0;
    private $id;


    public function __construct(string $dni, string $nombre, string $apellido, int $edad) //Create Alumno
    {
        self::$contador++;
        $this->id = self::$contador;
        $this->dni=$dni;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->edad = $edad;
    }

    public function updateAlumno(string $nombre, string $apellido, int $edad):Alumno{ //Update Alumno
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->edad = $edad;
        return $this;
    }

    public function matricular(Clase &$clase): bool
    {
        if($clase[]=$this){
            return true;
        }
        return false;
    }

    public function getId():int{
        return $this->id;
    }

    public function getInfo(): string
    {
        return 'El alumno con ID: '.$this->id."\nCuyo nombre y apellido son: ".$this->nombre.' '.$this->apellido."\nSu edad es: ".$this->edad;
    }
}
