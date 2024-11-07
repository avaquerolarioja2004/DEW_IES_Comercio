<?php
require_once './objetos/usuario_manager.php';

$usuariosManager = new UsuariosManager();
$usuariosManager->cargarUsuarios();

$nombre = $email = $contrasena = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $contrasena = trim($_POST['contrasena']);

    if (!$usuariosManager->emailExistente($email)) {
        if ($_FILES['fotoPerfil']['error'] === UPLOAD_ERR_OK && $_FILES['fotoPerfil']['size'] <= MAX_PHOTO_SIZE) {
            $rutaFoto = './uploads/' . basename($_FILES['fotoPerfil']['name']);
            move_uploaded_file($_FILES['fotoPerfil']['tmp_name'], $rutaFoto);
            $usuariosManager->agregarUsuario($nombre, $email, $contrasena, $rutaFoto);
            header('Location: welcome.php?email=' . urlencode($email));
            exit;
        } elseif ($_FILES['fotoPerfil']['error'] === UPLOAD_ERR_NO_FILE) {
            $usuariosManager->agregarUsuario($nombre, $email, $contrasena);
            header('Location: welcome.php?email=' . urlencode($email));
            exit;
        } else {
            $error = 'Error al subir la imagen o la imagen excede el tamaño permitido.';
        }
    } else {
        $error = 'El email ya está registrado.';
    }
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
    <form method="POST" action="" enctype="multipart/form-data">
        <input type="text" name="nombre" placeholder="Nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚÑñ ]{2,64}" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="contrasena" placeholder="Contraseña" required>
        <input type="file" name="fotoPerfil">
        <button type="submit">Registrarse</button>
    </form>
    <?php if ($error): ?>
        <p><?= $error ?></p>
    <?php endif; ?>
    <p><a href="sesion.php">Iniciar Sesión</a></p>
</body>
</html>
