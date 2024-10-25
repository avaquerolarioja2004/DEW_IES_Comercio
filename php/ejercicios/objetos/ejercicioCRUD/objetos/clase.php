<?php
declare(strict_types=1);

require_once __DIR__ . '/../crud/crudAlumno.php';

class Clase implements CrudAlumno{ //Base de datos mediante arrays
    private string $nombreClase;
    private int $numMaxAlumnos;
    private array $alumnos;
    private Profesor $profesor;
    private static int $numAlumnos;

    public function __construct(string $nombre, int $numMax)
    {
        $this->nombreClase=$nombre;
        $this->numMaxAlumnos=$numMax;
        $this->numAlumnos=0;
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
                $this->numAlumnos-=1;
            }
        }
        return $alumnoRet;
    }

    public function despedirProfesor(int $idProfesor) : Profesor { //Borrar
        $profesor=$this->profesor;
        $this->profesor=null;
        return $profesor;
    }

    public function getInfo():string{
        return "La clase {$this->nombreClase}, de una capacidad de {$this->numMaxAlumnos} y al cargo de ella el profesor {$this->profesor->getInfo()}, tiene los siguientes alumnos:\n{$this->getAlumnosFormateado()}";
    }
}