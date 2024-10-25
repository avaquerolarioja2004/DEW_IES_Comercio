<?php
declare(strict_types=1);
namespace Student;

class Student
{
    private int $id;
    private string $nombre;
    private int $edad;

    function __construct(int $id)
    {
        $this->id = $id;
    }

    function setNombre(string $nombre): bool
    {
        if ($this->nombre = $nombre) {
            return true;
        } else {
            return false;
        }
    }

    function setEdad(int $edad): bool
    {
        if ($this->edad = $edad) {
            return true;
        } else {
            return false;
        }
    }

    function getNombre(): string
    {
        return $this->nombre;
    }

    function getId(): int
    {
        return $this->id;
    }

    function getEdad(): int
    {
        return $this->edad;
    }

    function __destruct()
    {
        echo 'Bye Bye I was: ' . $this->id . ', ' . $this->nombre . ', ' . $this->edad . '.';
    }
}

$var = new Student(1);
$var->setNombre("Ángel");
$var->setEdad(20);