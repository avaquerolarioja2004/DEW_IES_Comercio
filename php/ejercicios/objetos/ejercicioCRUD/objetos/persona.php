<?php
declare(strict_types=1);
class Persona{ //Padre de Profesor y Alumno
    protected string $dni;
    protected string $nombre, $apellido;
    protected int $edad;

    public function __construct(string $dni, string $nombre, string $apellido, int $edad)
    {
        $this->edad=$edad;
        $this->dni=$dni;
        $this->nombre=$nombre;
        $this->apellido=$apellido;
    }


    public function getInfo():string{
        return 'La persona con DNI: '.$this->dni."\nCuyo nombre y apellido son: ".$this->nombre.' '.$this->apellido."\nSu edad es: ".$this->edad;
    }
}

