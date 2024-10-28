<?php

declare(strict_types=1);

require_once __DIR__ . '/../crud/crudAlumno.php';

class Clase implements CrudAlumno
{ //Base de datos mediante arrays
    private string $nombreClase;
    private int $numMaxAlumnos;
    private array $alumnos;
    private ?Profesor $profesor = null;

    public function __construct(string $nombre, int $numMax)
    {
        $this->nombreClase = $nombre;
        $this->numMaxAlumnos = $numMax;
        $this->alumnos = [];
    }

    public function setAlumno(Alumno $alumno)
    {
        $this->alumnos[] = $alumno;
    }

    public function setProfesor(Profesor $profesor)
    {
        $this->profesor = $profesor;
    }

    public function getCapacidad(): int
    {
        return $this->numMaxAlumnos;
    }

    public function getNombre(): string
    {
        return $this->nombreClase;
    }

    public function getAlumno(int $id) //Get Alumno
    {
        foreach ($this->alumnos as $alumno) {
            if ($alumno->getId() == $id) {
                return $alumno;
            }
        }
        return null;
    }

    public function getAlumnos()
    {
        return $this->alumnos ?? [];
    }

    public function getAlumnosFormateado(): string //Get All Alumnos
    {
        $alumnos = '';
        foreach ($this->getAlumnos() as $alumno) {
            $alumnos .= $alumno->getInfo();
        }
        return $alumnos;
    }

    public function getProfesor()
    { //Get Profesor
        return $this->profesor;
    }

    public function contratarProfesor(Profesor $profesor)
    {
        $this->profesor = $profesor;
        $profesor->contratar($this);
    }

    public function expulsarAlumno(int $idAlumno): Alumno
    { //Borrar
        $alumnoRet = null;
        foreach ($this->getAlumnos() as $alumno) {
            if ($alumno->getId() == $idAlumno) {
                $alumnoRet = $alumno;
                unset($alumno, $this->alumnos);
            }
        }
        return $alumnoRet;
    }

    public function updateAlumnoInfo(Alumno $alumno): void
    {
        foreach ($this->alumnos as &$a) {
            if ($a->getId() === $alumno->getId()) {
                $a->updateAlumno($alumno->getNombre(), $alumno->getApellido(), $alumno->getEdad());
                break;
            }
        }
    }

    public function updateProfesorInfo(Profesor $profesor): void
    {
        if ($this->profesor !== null && $this->profesor->getId() === $profesor->getId()) {
            $this->profesor->updateProfesor($profesor->getNombre(), $profesor->getApellido(), $profesor->getEdad(), $profesor->getSalario());
        }
    }

    public function despedirProfesor(int $idProfesor): Profesor
    { //Borrar
        $profesor = $this->profesor;
        $profesor->setClaseNull();
        $this->profesor = null;
        return $profesor;
    }

    public function getInfo(): string
    {
        $alumnos = '';
        $profesor = '';
        if ($this->profesor == null) {
            $profesor = '----';
        } else {
            $profesor = $this->profesor->getInfo();
        }
        if (empty($this->getAlumnos())) {
            $alumnos = 'Sin Alumnos';
        } else {
            $alumnos = $this->getAlumnosFormateado();
        }
        return "La clase {$this->nombreClase}, de una capacidad de {$this->numMaxAlumnos} y al cargo de ella el profesor {$profesor}, tiene los siguientes alumnos:\n{$alumnos}\n";
    }
}
