<?php
declare(strict_types=1);

interface crudAlumno{
    public function getAlumno(int $id):Alumno;
    public function getAlumnos():array;
    public function matricular(Clase &$clase):bool;
}