<?php
declare(strict_types=1);
require_once __DIR__ . '/Empleado.php';

class Profesor extends Persona{

    use EmpleadoTrait; //Herencia multiple de persona y empleado
    private static int $contador = 0;
    private int $id;
    private ?Clase $clase=null;

    public function __construct(string $dni, string $nombre, string $apellido, int $edad, float $salario) //Constructor
    {
        self::$contador++;
        $this->id = self::$contador;
        $this->dni=$dni;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->edad = $edad;
        $this->salario=$salario;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getEdad(){
        return $this->edad;
    }

    public function getSalario()
    {
        return $this->salario;
    }

    public function updateProfesor(string $nombre, string $apellido, int $edad, float $salario):Profesor{ //Update Profesor
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->edad = $edad;
        $this->salario=$salario;
        return $this;
    }

    public function contratar(Clase &$clase) //Añadir a la clase
    {
        $this->clase=$clase;
    }

    public function setClaseNull(){
        $this->clase=null;
    }

    public function getId() : int {
        return $this->id;
    }

    public function getInfo(): string
    {
        return 'El profesor con ID: '.$this->id."\nCuyo nombre y apellido son: ".$this->nombre.' '.$this->apellido."\nSu edad es: ".$this->edad."\nSu salario es: {$this->salario}"."\nSu clase es: ".($this->clase ? $this->clase->getNombre() : 'No tiene Clase')."\n";;
    }
}