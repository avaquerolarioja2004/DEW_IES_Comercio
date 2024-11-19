<?php
require_once '../tools/funciones.php';
require_once '../objetos/bbdd.php';
BBDD::startBBDD();
session_start();

if(isset($_SESSION['email']) && $_SESSION['rol'] == 'admin') {
    if(isset($_POST['crear'])) {
        BBDD::insertarDatosAleatorios();
        header('Location: index.php');
    } else if(isset($_POST['borrar'])) {
        BBDD::borrarDatos();
        header('Location: index.php');
    }
    
} else {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de la base de datos</title>
</head>
<body>
    <h1>Gestión de la base de datos</h1>
    <form action="" method="post">
        <input type="submit" name="crear" value="Crear datos aleatorios">
        <input type="submit" name="borrar" value="Borrar todos los datos">
    </form>