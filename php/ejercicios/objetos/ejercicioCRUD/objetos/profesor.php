<?php
declare(strict_types=1);
include_once 'Persona.php';
class Profesor extends Persona{

    use EmpleadoTrait; //Herencia multiple de persona y empleado
    private static $contador = 0;
    private $id;

    public function __construct(string $dni, string $nombre, string $apellido, int $edad) //Constructor
    {
        self::$contador++;
        $this->id = self::$contador;
        $this->dni=$dni;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->edad = $edad;
    }

    public function updateProfesor(string $nombre, string $apellido, int $edad):Profesor{ //Update Profesor
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->edad = $edad;
        return $this;
    }

    public function contratar(Clase &$clase): bool //Añadir a la clase
    {
        if($clase[]=$this){
            return true;
        }
        return false;
    }

    public function getInfo(): string
    {
        return 'El profesor con ID: '.$this->id."\nCuyo nombre y apellido son: ".$this->nombre.' '.$this->apellido."\nSu edad es: ".$this->edad;
    }
}