<?php
require_once '../tools/funciones.php';
require_once '../objetos/bbdd.php';
session_start();
BBDD::startBBDD();
if (isset($_SESSION['rol']) && $_SESSION['rol' == 'admin']) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $rol = 'admin';
        registrarUsuario($nombre, $email, $password, $rol);
        header('Location: gestion_usuarios.php');
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    registrarUsuario($nombre, $email, $password, 'usuario');

    header('Location: login.php');
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>

<body>
    <h1>Registro</h1>
    <form action="" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" required>
        <input type="submit" value="Registrarse">
    </form>
    <a href="login.php">Login</a>
</body>

</html>