<?php
require_once '../tools/funciones.php';
require_once '../objetos/bbdd.php';
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
} else if (!isset($_SESSION['email']) && $_SESSION['rol'] != 'admin') {
    header('Location: reservar.php');
}
$mensaje = "Bienvenido " . $_SESSION['nombre'];
?>

<!DOCTYPE html>
<html lang="es">
    <h1>Panel de administración</h1>
    <h2><?php echo $mensaje; ?></h2>
    <a href="gestion_usuarios.php">Gestionar Usuarios</a>
    <a href="gestion_habitaciones.php">Gestionar Habitaciones</a>
    <a href="gestion_bbdd.php">Gestionar BBDD</a>
    <a href="cerrar_sesion.php">Cerrar Sesion</a>
</html>