<?php

$finish = true;

require_once __DIR__ . '/objetos/alumno.php';
require_once __DIR__ . '/objetos/clase.php';
require_once __DIR__ . '/objetos/profesor.php';
require_once __DIR__ . '/validacion/validacion.php';
static $clase = null;
do {
    echo "-------------------------\n
Menú de Gestión de Clases\n
1. Crear una Clase\n
2. Mostrar la información de la clase\n
3. Crear Alumno\n
4. Crear Profesor\n
5. Modificar Alumno\n
6. Modificar Profesor\n
6. Modificar Alumno\n
6. Contratar Profesor\n
6. Matricular Alumno\n
6. Despedir Profesor\n
6. Expuslsar Alumno\n
6. Mostrar Alumno\n
6. Mostrar Alumnos\n
6. Mostrar Profesor\n
-------------------------
Elige una opción: ";
    if (!$entrada = (int)Validacion::validarEntrada(readline())) {
        $entrada = 14;
    }

    switch ($entrada) {
        case 1:
            $nombre = Validacion::validarEntrada("Introduce el nombre de la clase: ");
            $capacidad = (int)Validacion::validarEntrada("Introduce la capacidad máxima de alumnos: ");
            $clase = new Clase($nombre, $capacidad);
            echo "Clase creada correctamente.\n";
            break;

        case 2:
            if ($clase) {
                echo $clase->getInfo();
            } else {
                echo "Primero debes crear una clase.\n";
            }
            break;

        case 3:
            if ($clase) {
                $dniAlumno = Validacion::validarEntrada("Introduce el DNI del alumno: ");
                $nombreAlumno = Validacion::validarEntrada("Introduce el nombre del alumno: ");
                $apellidoAlumno = Validacion::validarEntrada("Introduce el apellido del alumno: ");
                $edad = (int)Validacion::validarEntrada("Introduce la edad del alumno: ");
                $alumno = new Alumno($dniAlumno,$nombreAlumno,$apellidoAlumno, $edad);
                echo "Alumno creado.\n";
            } else {
                echo "Primero debes crear una clase.\n";
            }
            break;

        case 4:
            if ($clase) {
                $nombreProfesor = Validacion::validarEntrada("Introduce el nombre del profesor: ");
                $profesor = new Profesor($nombreProfesor);
                $clase->contratarProfesor($profesor);
                echo "Profesor creado y asignado a la clase.\n";
            } else {
                echo "Primero debes crear una clase.\n";
            }
            break;

        case 5:
            $idAlumno = (int)Validacion::validarEntrada("Introduce el ID del alumno a modificar: ");
            if ($clase && $clase->getAlumno($idAlumno)) {
                $nuevoNombre = Validacion::validarEntrada("Introduce el nuevo nombre del alumno: ");
                $clase->getAlumno($idAlumno)->setNombre($nuevoNombre);
                echo "Alumno modificado correctamente.\n";
            } else {
                echo "Alumno no encontrado o clase inexistente.\n";
            }
            break;

        case 6:
            if ($clase && $clase->getProfesor()) {
                $nuevoNombre = Validacion::validarEntrada("Introduce el nuevo nombre del profesor: ");
                $clase->getProfesor()->setNombre($nuevoNombre);
                echo "Profesor modificado correctamente.\n";
            } else {
                echo "Primero debes asignar un profesor a la clase.\n";
            }
            break;

        case 7:
            // Contratar profesor (ya implementado en el caso 4)
            break;

        case 8:
            if($clase ){
                $clase->matricularAlumno($alumno);
            }else{
                echo "Primero debes crear una clase.\n";
            }
            break;

        case 9:
            if ($clase && $clase->getProfesor()) {
                $clase->despedirProfesor();
                echo "Profesor despedido de la clase.\n";
            } else {
                echo "No hay profesor asignado para despedir.\n";
            }
            break;

        case 10:
            $idAlumno = (int)Validacion::validarEntrada("Introduce el ID del alumno a expulsar: ");
            if ($clase && $clase->expulsarAlumno($idAlumno)) {
                echo "Alumno expulsado de la clase.\n";
            } else {
                echo "Alumno no encontrado o clase inexistente.\n";
            }
            break;

        case 11:
            $idAlumno = (int)Validacion::validarEntrada("Introduce el ID del alumno a mostrar: ");
            $alumno = $clase ? $clase->getAlumno($idAlumno) : null;
            echo $alumno ? $alumno->getInfo() : "Alumno no encontrado.\n";
            break;

        case 12:
            if ($clase) {
                echo $clase->getAlumnosFormateado();
            } else {
                echo "Primero debes crear una clase.\n";
            }
            break;

        case 13:
            if ($clase && $clase->getProfesor()) {
                echo $clase->getProfesor()->getInfo();
            } else {
                echo "Primero debes asignar un profesor a la clase.\n";
            }
            break;

        case 14:
            $finish = false;
            echo "Saliendo del sistema...\n";
            break;

        default:
            echo "Opción no válida. Por favor elige una opción entre 1 y 14.\n";
            break;
    }
} while ($finish);
