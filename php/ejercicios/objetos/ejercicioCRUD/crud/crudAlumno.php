<?php
declare(strict_types=1);
require_once __DIR__ . '/../objetos/alumno.php';

interface CrudAlumno{ //Interface
    public function getAlumno(int $id):Alumno;
    public function getAlumnos():array;
}