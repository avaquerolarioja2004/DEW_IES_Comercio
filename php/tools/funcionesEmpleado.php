<?php

declare(strict_types=1);
/*
sistema de mantenimiento de empleados cada empleado tendra un id, un nombre y edad.
el sistema deberá permitir busacar un empleado por id
añadir un empleado
modificar todos los datos excepto el id
listar todos los empleados en orden desc por edad
$listaEmpleados=[$empleado, ...]
$empelado=['id'=>id, 'nombre'=>nombre, 'edad'=>edad]
*/

function crearEmpleado(array &$listaEmpleados, string $nombre, int $edad): array
{
    if (!empty($listaEmpleados)) {
        $id = array_key_last($listaEmpleados) + 1;
    } else {
        $id = 0;
    }

    $empleado = ['id' => $id, 'nombre' => $nombre, 'edad' => $edad];
    $listaEmpleados[] = $empleado;
    return $empleado;
}


function getEmpleado(array &$listaEmpleados, int $id): string
{
    foreach ($listaEmpleados as $empleado) {
        if ($empleado['id'] == $id) {
            return "ID: $id, Nombre: " . $empleado['nombre'] . ", Edad: " . $empleado['edad'];
        }
    }
    return "Empleado no encontrado.";
}

function getEmpleadosOrderByEdad(array &$listaEmpleados): array
{
    usort($listaEmpleados, function ($a, $b) {
        return $b['edad'] <=> $a['edad'];
    });

    return $listaEmpleados;
}

function modificarEmpleadoNombre(array &$listaEmpleados, int $id, string $nombreNuevo): bool
{
    foreach ($listaEmpleados as &$empleado) {
        if ($empleado['id'] == $id) {
            $empleado['nombre'] = $nombreNuevo;
            return true;
        }
    }
    return false;
}

function modificarEmpleadoEdad(array &$listaEmpleados, int $id, int $edadNueva): bool
{
    foreach ($listaEmpleados as &$empleado) {
        if ($empleado['id'] == $id) {
            $empleado['edad'] = $edadNueva;
            return true;
        }
    }
    return false;
}

function mostrarEmpleados(&$listaEmpleados): void
{
    foreach ($listaEmpleados as $key) {
        echo getEmpleado($listaEmpleados, $key['id']);
        echo '<br>';
    }
}
