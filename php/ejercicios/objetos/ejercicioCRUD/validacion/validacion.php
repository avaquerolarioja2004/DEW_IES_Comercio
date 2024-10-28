<?php
declare(strict_types=1);

require_once __DIR__ . '/validacionABS.php';

class Validacion extends ValidacionABS {
    public static function validarEntrada(string $mensaje): string {
        echo $mensaje;
        return htmlentities(trim(fgets(STDIN)));
    }

    public static function validarInt(string $mensaje, int $min = null, int $max = null): int {
        do {
            $entrada = (int)self::validarEntrada($mensaje);
            if (($min !== null && $entrada < $min) || ($max !== null && $entrada > $max)) {
                echo "El valor debe estar entre $min y $max.\n";
            } else {
                return $entrada;
            }
        } while (true);
    }

    public static function validarCapacidad(array $alumnos, int $maxCapacidad): bool {
        return count($alumnos) < $maxCapacidad;
    }

    public static function existeEnArray(array $array, int $id): bool {
        foreach ($array as $elemento) {
            if ($elemento->getId() === $id) {
                return true;
            }
        }
        return false;
    }
}
