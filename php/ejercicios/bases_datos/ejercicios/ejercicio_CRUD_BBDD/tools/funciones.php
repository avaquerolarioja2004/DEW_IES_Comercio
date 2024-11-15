<?php

function crearBBDD($nombre = 'ejercicio_crud', $pdo)
{
    try {
        $sql = "CREATE DATABASE IF NOT EXISTS $nombre";
        $pdo->exec($sql);

        echo "Base de datos creada exitosamente";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function conectar($host = 'localhost')
{
    try {
        $dsn = "mysql:host=$host;charset=utf8";
        $pdo = new PDO($dsn, 'root', 'mysql');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function conectarBD($baseDatos, $usuario, $contrasena)
{
    try {
        $dsn = "mysql:host=localhost;dbname=$baseDatos;charset=utf8";
        $pdo = new PDO($dsn, $usuario, $contrasena);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function crearTablaUsuario($pdo)
{
    try {
        $smt = $pdo->prepare("CREATE TABLE usuarios (
                            id INT PRIMARY KEY AUTO_INCREMENT,
                            nombre VARCHAR(50),
                            email VARCHAR(100) UNIQUE,
                            password VARCHAR(255),
                            rol ENUM('admin', 'usuario') DEFAULT 'usuario')");
        $smt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function crearTablaHabitaciones($pdo){
    try {
        $smt = $pdo->prepare("CREATE TABLE habitaciones (
                            id INT PRIMARY KEY AUTO_INCREMENT,
                            nombre VARCHAR(50),
                            descripcion TEXT,
                            precio DECIMAL(10, 2),
                            imagen VARCHAR(255))");
        $smt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function crearTablaReservas($pdo){
    try {
        $smt = $pdo->prepare("CREATE TABLE reservas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    usuario_id INT,
    habitacion_id INT,
    fecha_inicio DATE,
    fecha_fin DATE,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (habitacion_id) REFERENCES habitaciones(id),
    CONSTRAINT unique_reserva UNIQUE (habitacion_id, fecha_inicio, fecha_fin)
)");
        $smt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function getAllUsuarios(){
    try {
        $pdo=BBDD::getBBDD();
        $smt = $pdo->prepare("SELECT * FROM usuarios");
        $smt->execute();
        $usuarios = $smt->fetchAll(PDO::FETCH_ASSOC);

        return $usuarios;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function borrarUsuarioPorId($id){
    try {
        $pdo=BBDD::getBBDD();
        $smt = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
        $smt->execute([$id]);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function borrarUsuarioPorEmail($email){
    try {
        $pdo=BBDD::getBBDD();
        $smt = $pdo->prepare("DELETE FROM usuarios WHERE email = ?");
        $smt->execute([$email]);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function getAllHabitaciones(){
    try {
        $pdo=BBDD::getBBDD();
        $smt = $pdo->prepare("SELECT * FROM habitaciones");
        $smt->execute();
        $habitaciones = $smt->fetchAll(PDO::FETCH_ASSOC);

        return $habitaciones;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function getHabitacionesDisponibles($fechaInicio, $fechaFin){
    try {
        $pdo=BBDD::getBBDD();
        $smt = $pdo->prepare("SELECT * FROM habitaciones WHERE id NOT IN (SELECT habitacion_id FROM reservas WHERE fecha_inicio <= ? AND fecha_fin >= ?)");
        $smt->execute([$fechaInicio, $fechaFin]);
        $habitaciones = $smt->fetchAll(PDO::FETCH_ASSOC);

        return $habitaciones;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
