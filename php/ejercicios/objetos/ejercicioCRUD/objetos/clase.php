<?php
declare(strict_types=1);
include_once '../crud/crudAlumno.php';
class Clase implements crudAlumno{ //Base de datos mediante arrays
    private string $nombreClase;
    private int $numMaxAlumnos;
    private array $alumnos;
    private Profesor $profesor;

    public function __construct(string $nombre, int $numMax)
    {
        $this->nombreClase=$nombre;
        $this->numMaxAlumnos=$numMax;
    }

    public function getAlumno(int $id): Alumno //Get Alumno
    {
        foreach ($this->alumnos as $alumno) {
            if($alumno->getId()==$id){
                return $alumno;
            }
        }
        return null;
    }

    public function getAlumnos(): array
    {
        return $this->alumnos;
    }

    public function getAlumnosFormateado(): string //Get All Alumnos
    {
        $alumnos='';
        foreach ($this->getAlumnos() as $alumno) {
            $alumnos.=$alumno->getInfo();
        }
        return $alumnos;
    }

    public function getProfesor():Profesor{ //Get Profesor
        return $this->profesor;
    }

    public function expulsarAlumno(int $idAlumno) : Alumno { //Borrar
        $alumnoRet=null;
        foreach($this->getAlumnos() as $alumno){
            if($alumno->getId()==$idAlumno){
                $alumnoRet=$alumno;
                unset($alumno,$this->alumnos);
            }
        }
        return $alumnoRet;
    }

    public function getInfo():string{
        return "La clase {$this->nombreClase}, de una capacidad de {$this->numMaxAlumnos} y al cargo de ella el profesor {$this->profesor->getInfo()}, tiene los siguientes alumnos:\n{$this->getAlumnosFormateado()}";
    }
}