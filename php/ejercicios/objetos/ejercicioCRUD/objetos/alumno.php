<?php

declare(strict_types=1);
class Alumno extends Persona
{
    private static $contador = 0;
    private $id;


    public function __construct(string $dni, string $nombre, string $apellido, int $edad)
    {
        self::$contador++;
        $this->id = self::$contador;
        $this->dni=$dni;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->edad = $edad;
    }

    public function updateAlumno(string $nombre, string $apellido, int $edad):Alumno{
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->edad = $edad;
        return $this;
    }

    public function matricular(IESComercio &$centro, Clase &$clase): bool
    {
        $clase[]=$this;
    }
}
