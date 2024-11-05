<?php
require_once './objetos/usuario_manager.php';

$usuariosManager = new UsuariosManager();
$usuariosManager->cargarUsuarios();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $contrasena = trim($_POST['contrasena']);
    
    foreach ($usuariosManager->getUsuarios() as $usuario) {
        if ($usuario->getEmail() === $email && $usuario->verificarContraseña($contrasena)) {
            header('Location: welcome.php?email=' . urlencode($email));
            exit;
        }
    }
    $error = 'Credenciales incorrectas.';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <form method="POST" action="">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="contrasena" placeholder="Contraseña" required>
        <button type="submit">Iniciar Sesión</button>
    </form>
    <?php if ($error): ?>
        <p><?= $error ?></p>
    <?php endif; ?>
    <p><a href="registro.php">Registrarse</a></p>
</body>
</html>
