<?php

declare(strict_types=1);
/*
sistema de mantenimiento de empleados cada empleado tendra un id, un nombre y edad.
el sistema deberá permitir busacr un empleado por id
añadir un empleado
modificar todos los datos excepto el id
listar todos los empleados en orden desc por edad
$listaEmpleados=[$empleado, ...]
$empelado=[id=>['nombre'=>nombre, 'edad'=>edad]]
*/

function crearEmpleado(array &$listaEmpleados, int $id, string $nombre, int $edad): array
{
    $listaEmpleados[] = [$id => ['nombre' => $nombre, 'edad' => $edad]];
}

function getEmpleado(array &$listaEmpleados, int $id): string
{
    foreach ($listaEmpleados as $empleado) {
        if (array_key_exists($id, $empleado)) {
            return "ID: $id, Nombre: " . $empleado[$id]['nombre'] . ", Edad: " . $empleado[$id]['edad'];
        }
    }
    return "Empleado no encontrado.";
}

function getEmpleadosOrderByEdad(array &$listaEmpleados): array
{
    $devolver=[];
    foreach ($listaEmpleados as $empleado) {
        foreach ($empleado as $key => $value) {
            
        }
    }
}

function modificarEmpleadoNombre(array &$listaEmpleados, int $id, string $nombreNuevo)
{
    foreach ($listaEmpleados as $empelado) {
        foreach ($empelado as $key => $value) {
            if ($key == $id) {
                $key[0] = $nombreNuevo;
            }
        }
    }
}

function modificarEmpleadoEdad(array &$listaEmpleados, int $id, int $edadNueva)
{
    foreach ($listaEmpleados as $empelado) {
        foreach ($empelado as $key => $value) {
            if ($key == $id) {
                $key[1] = $edadNueva;
            }
        }
    }
}
