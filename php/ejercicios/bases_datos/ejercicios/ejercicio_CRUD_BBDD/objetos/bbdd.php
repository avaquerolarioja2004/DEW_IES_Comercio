<?php
require_once '../tools/funciones.php';

class BBDD {
    private static $pdo = null;

    private function __construct() {
        $pdo = conectar();
        crearBBDD('ejercicio_crud', $pdo);
        self::$pdo = conectarBD('ejercicio_crud', 'root', 'mysql');
        crearTablaUsuario(self::$pdo);
        crearTablaHabitaciones(self::$pdo);
        crearTablaReservas(self::$pdo);
    }

    public static function startBBDD() {
        if (self::$pdo == null) {
            new BBDD();
        }
        return self::$pdo;
    }

    public static function getBBDD() {
        return self::$pdo;
    }

    public static function insertarDatosAleatorios() {
        // Insertar usuarios aleatorios
        for ($i = 1; $i < 10; $i++) {
            $nombre = 'Usuario' . $i;
            $email = 'usuario' . $i . '@example.com';
            $password = $i;
            $rol = ($i % 2 == 0) ? 'admin' : 'usuario';
            registrarUsuario($nombre, $email, $password, $rol);
        }
        registrarUsuario('Ángel', 'angel@gmail.com', 1234, 'admin');

        // Insertar habitaciones aleatorias
        for ($i = 1; $i < 10; $i++) {
            $nombre = 'Habitacion' . $i;
            $descripcion = 'Descripcion de la habitacion ' . $i;
            $precio = rand(50, 500);
            $imagen = 'imagen' . $i . '.jpg';
            registrarHabitacion($nombre, $descripcion, $precio, $imagen);
        }

        // Obtener el ID mínimo y máximo de los usuarios
        $pdo = self::$pdo;
        $smt = $pdo->prepare("SELECT MIN(id) as min_id, MAX(id) as max_id FROM usuarios");
        $smt->execute();
        $result = $smt->fetch(PDO::FETCH_ASSOC);
        $minId = $result['min_id'];
        $maxId = $result['max_id'];

        // Obtener el ID mínimo y máximo de las habitaciones
        $pdo = self::$pdo;
        $smt = $pdo->prepare("SELECT MIN(id) as min_id, MAX(id) as max_id FROM habitaciones");
        $smt->execute();
        $result = $smt->fetch(PDO::FETCH_ASSOC);
        $minIdH = $result['min_id'];
        $maxIdH = $result['max_id'];

        // Insertar reservas aleatorias
        for ($i = 1; $i <= 10; $i++) {
            $usuarioId = rand($minId, $maxId);
            $habitacionId = rand($minIdH, $maxIdH);
            $fechaInicio = date('Y-m-d', strtotime('+' . rand(1, 30) . ' days'));
            $fechaFin = date('Y-m-d', strtotime($fechaInicio . ' + ' . rand(1, 7) . ' days'));
            reservar($usuarioId, $habitacionId, $fechaInicio, $fechaFin);
        }
    }

    public static function borrarDatos() {
        $pdo = self::$pdo;
        $smt = $pdo->prepare("DELETE FROM reservas");
        $smt->execute();
        $smt = $pdo->prepare("DELETE FROM habitaciones");
        $smt->execute();
        $smt = $pdo->prepare("DELETE FROM usuarios");
        $smt->execute();
    }
}