<?php

require_once __DIR__ . '/objetos/alumno.php';
require_once __DIR__ . '/objetos/clase.php';
require_once __DIR__ . '/objetos/profesor.php';
require_once __DIR__ . '/validacion/validacion.php';

$alumnos = [];
$profesores = [];
$clases = [];
$finish = true;

do {
    echo "\n\n\n";
    echo "-------------------------\n
Menú de Gestión de Clases\n
1. Crear una Clase\n
2. Mostrar la información de la clase\n
3. Crear Alumno\n
4. Crear Profesor\n
5. Matricular Alumno\n
6. Asignar Profesor\n
7. Mostrar Información\n
8. Actualizar Alumno\n
9. Actualizar Profesor\n
10. Salir\n
-------------------------
Elige una opción: ";
    $entrada = (int)Validacion::validarEntrada("");
    echo "\n\n\n";
    switch ($entrada) {
        case 1: // Crear clase
            $nombre = Validacion::validarEntrada("Introduce el nombre de la clase: ");
            $capacidad = Validacion::validarInt("Introduce la capacidad máxima de alumnos: ", 1, 35);
            $clases[] = new Clase($nombre, $capacidad);
            echo "Clase creada correctamente.\n";
            break;

        case 2: // Mostrar información de una clase específica
            $nombreClase = Validacion::validarEntrada("Introduce el nombre de la clase: ");
            foreach ($clases as $clase) {
                if ($clase->getNombre() === $nombreClase) {
                    echo $clase->getInfo();
                }
            }
            break;

        case 3: // Crear un alumno
            $dni = Validacion::validarEntrada("Introduce el DNI del alumno: ");
            $nombre = Validacion::validarEntrada("Introduce el nombre del alumno: ");
            $apellido = Validacion::validarEntrada("Introduce el apellido del alumno: ");
            $edad = Validacion::validarInt("Introduce la edad del alumno: ", 3, 100);
            $alumnos[] = new Alumno($dni, $nombre, $apellido, $edad);
            echo "Alumno creado y almacenado.\n";
            break;

        case 4: // Crear un profesor
            $dni = Validacion::validarEntrada("Introduce el DNI del profesor: ");
            $nombre = Validacion::validarEntrada("Introduce el nombre del profesor: ");
            $apellido = Validacion::validarEntrada("Introduce el apellido del profesor: ");
            $edad = Validacion::validarInt("Introduce la edad del profesor: ", 23, 70);
            $salario = Validacion::validarInt("Introduce el salario del profesor: ", 300, 10000);
            $profesores[] = new Profesor($dni, $nombre, $apellido, $edad, $salario);
            echo "Profesor creado y almacenado.\n";
            break;

        case 5: // Matricular alumno
            $idAlumno = Validacion::validarInt("Introduce el ID del alumno a matricular: ");
            $nombreClase = Validacion::validarEntrada("Introduce el nombre de la clase: ");

            $alumno = null;
            $clase = null;
            foreach ($alumnos as $a) {
                if ($a->getId() === $idAlumno) {
                    $alumno = $a;
                    break;
                }
            }
            foreach ($clases as $c) {
                if ($c->getNombre() === $nombreClase) {
                    $clase = $c;
                    break;
                }
            }

            if ($alumno && $clase) {
                if (Validacion::validarCapacidad($clase->getAlumnos(), $clase->getCapacidad())) {
                    if ($clase->getAlumno($alumno->getId()) == null) {
                        $alumno->matricular($clase);
                        echo "Alumno matriculado en la clase $nombreClase.\n";
                    } else {
                        echo "Alumno ya matriculado\n";
                    }
                } else {
                    echo "La clase está llena.\n";
                }
            } else {
                echo "Alumno o clase no encontrada.\n";
            }
            break;

        case 6: // Asignar profesor a clase
            $idProfesor = Validacion::validarInt("Introduce el ID del profesor a asignar: ");
            $nombreClase = Validacion::validarEntrada("Introduce el nombre de la clase: ");

            $profesor = null;
            foreach ($profesores as $p) {
                if ($p->getId() === $idProfesor) {
                    $profesor = $p;
                    break;
                }
            }
            foreach ($clases as $c) {
                if ($c->getNombre() === $nombreClase && $profesor) {
                    $c->contratarProfesor($profesor);
                    echo "Profesor asignado a la clase $nombreClase.\n";
                    break;
                } else {
                    echo "Profesor no asignado a la clase.\n";
                }
            }
            break;

        case 7: // Mostrar información completa de alumnos y profesores en general
            echo "Alumnos:\n";
            foreach ($alumnos as $alumno) {
                echo $alumno->getInfo() . "\n";
            }
            echo "Profesores:\n";
            foreach ($profesores as $profesor) {
                echo $profesor->getInfo() . "\n";
            }
            break;

        case 8: //Update Alumno
            $idAlumno = Validacion::validarInt("Introduce el ID del alumno a actualizar: ");
            $alumnoEncontrado = false;

            foreach ($alumnos as $alumno) {
                if ($alumno->getId() === $idAlumno) {
                    $nombre = Validacion::validarEntrada("Introduce el nuevo nombre del alumno: ");
                    $apellido = Validacion::validarEntrada("Introduce el nuevo apellido del alumno: ");
                    $edad = Validacion::validarInt("Introduce la nueva edad del alumno: ", 3, 100);

                    $alumno->updateAlumno($nombre, $apellido, $edad);

                    foreach ($clases as $clase) {
                        if ($clase->getAlumno($alumno->getId()) !== null) {
                            $clase->updateAlumnoInfo($alumno);
                        }
                    }

                    echo "Alumno actualizado correctamente.\n";
                    $alumnoEncontrado = true;
                    break;
                }
            }

            if (!$alumnoEncontrado) {
                echo "Alumno no encontrado.\n";
            }
            break;

        case 9: //Update Profesor
            $idProfesor = Validacion::validarInt("Introduce el ID del profesor a actualizar: ");
            $profesorEncontrado = false;

            foreach ($profesores as $profesor) {
                if ($profesor->getId() === $idProfesor) {
                    $nombre = Validacion::validarEntrada("Introduce el nuevo nombre del profesor: ");
                    $apellido = Validacion::validarEntrada("Introduce el nuevo apellido del profesor: ");
                    $edad = Validacion::validarInt("Introduce la nueva edad del profesor: ", 23, 70);
                    $salario = Validacion::validarInt("Introduce el nuevo salario del profesor: ", 300, 10000);

                    $profesor->updateProfesor($nombre, $apellido, $edad, $salario);

                    foreach ($clases as $clase) {
                        if ($clase->getProfesor() !== null && $clase->getProfesor()->getId() === $idProfesor) {
                            $clase->updateProfesorInfo($profesor);
                        }
                    }

                    echo "Profesor actualizado correctamente.\n";
                    $profesorEncontrado = true;
                    break;
                }
            }

            if (!$profesorEncontrado) {
                echo "Profesor no encontrado.\n";
            }
            break;

        case 10: // Salir
            echo "Saliendo...\n";
            $finish = false;
            break;

        default:
            echo "Opción no válida. Por favor, elige una opción entre 1 y 8.\n";
            break;
    }
} while ($finish);
