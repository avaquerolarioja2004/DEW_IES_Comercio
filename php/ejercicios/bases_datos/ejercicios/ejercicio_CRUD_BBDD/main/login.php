<?php
require_once '../tools/funciones.php';
require_once '../objetos/bbdd.php';
BBDD::startBBDD();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $usuario = getUsuarioPorEmail($email);

    if ($usuario && password_verify($password, $usuario['password'])) {
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['rol'] = $usuario['rol'];
        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nombre'] = $usuario['nombre'];
        setcookie('email', $email, time() + 3600);

        session_regenerate_id();
        header('Location: index.php');
    } else {
        echo "Usuario o contraseña incorrectos";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>
    <form action="" method="post">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">Entrar</button>
    </form>
    <a href="registrar.php">Registrarse</a>
</body>

</html>