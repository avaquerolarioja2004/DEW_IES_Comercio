<?php
require_once 'tools/funciones.php';

if (!isset($_SESSION['email']) && $_SESSION['rol'] != 'admin') {
    header('Location: login.php');
}

$habitaciones = getAllHabitaciones();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];
    registrarHabitacion($nombre, $descripcion, $precio, $imagen);
    header('Location: gestion_habitaciones.php');
}