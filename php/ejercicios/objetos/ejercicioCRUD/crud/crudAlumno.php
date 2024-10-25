<?php
declare(strict_types=1);

interface crudAlumno{ //Interface
    public function getAlumno(int $id):Alumno;
    public function getAlumnos():array;
}