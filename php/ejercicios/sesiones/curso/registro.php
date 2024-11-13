<?php
require_once 'objetos/usuario.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];

    $usuario = new Usuario_Curso();
    $mensaje = $usuario->registrar($nombre, $password);
    echo $mensaje;
}
?>

<form method="post">
    Nombre: <input type="text" name="nombre" required>
    Contraseña: <input type="password" name="password" required>
    <button type="submit">Registrar</button>
</form>

<a href="./login.php">¿Tiene una cuenta creada? Inicie sesión</a>
