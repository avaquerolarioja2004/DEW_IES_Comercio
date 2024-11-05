<?php
require_once './objetos/usuario_manager.php';

$usuariosManager = new UsuariosManager();
$usuariosManager->cargarUsuarios();

$email = $_GET['email'] ?? '';
$usuarioActual = null;

foreach ($usuariosManager->getUsuarios() as $usuario) {
    if ($usuario->getEmail() === $email) {
        $usuarioActual = $usuario;
        break;
    }
}

if (!$usuarioActual) {
    header('Location: sesion.php');
    exit;
}

$isAdmin = $usuariosManager->verificarAdministrador($email);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
</head>
<body>
    <h1>Bienvenido, <?= htmlspecialchars($usuarioActual->getNombre()) ?></h1>
    <p>Email: <?= htmlspecialchars($usuarioActual->getEmail()) ?></p>
    <?php if ($usuarioActual instanceof UsuarioFoto && $usuarioActual->getFotoPerfil()): ?>
        <img src="<?= htmlspecialchars($usuarioActual->getFotoPerfil()) ?>" alt="Foto de perfil" style="width:100px;height:auto;">
    <?php endif; ?>
    
    <p><a href="cambiar_contraseña.php?email=<?= urlencode($email) ?>">Cambiar Contraseña</a></p>
    <p><a href="sesion.php">Cerrar Sesión</a></p>
    
    <?php if ($isAdmin): ?>
        <h2>Usuarios Registrados</h2>
        <ul>
            <?php foreach ($usuariosManager->getUsuarios() as $usuario): ?>
                <li>
                    <?= htmlspecialchars($usuario->getNombre()) ?> (<?= htmlspecialchars($usuario->getEmail()) ?>)
                    <?php if ($usuario instanceof UsuarioFoto && $usuario->getFotoPerfil()): ?>
                        <img src="<?= htmlspecialchars($usuario->getFotoPerfil()) ?>" alt="Foto de perfil" style="width:50px;height:auto;">
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>
