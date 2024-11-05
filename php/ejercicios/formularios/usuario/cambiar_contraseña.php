<?php
require_once './config/config.php';
require_once './objetos/usuario_manager.php';

$usuariosManager = new UsuariosManager();
$usuariosManager->cargarUsuarios();
$email = filter_input(INPUT_GET, 'email');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nuevaContrasena = filter_input(INPUT_POST, 'nueva_contrasena');
    
    if (!empty($nuevaContrasena) && strlen($nuevaContrasena) >= 3) {
        $hashedContrasena = password_hash($nuevaContrasena, PASSWORD_DEFAULT);
        foreach ($usuariosManager->getUsuarios() as $usuario) {
            if ($usuario->getEmail() === $email) {
                $usuario->setContraseña($hashedContrasena);
                $usuariosManager->guardarUsuarios();
                echo "Contraseña cambiada con éxito.";
                exit;
            }
        }
        echo "El correo electrónico no está registrado.";
    } else {
        echo "La nueva contraseña debe tener al menos 3 caracteres.";
    }
}
if ($email) {
?>

<!-- Formulario para cambiar contraseña -->
<form action="cambiar_contraseña.php?email=<?php echo urlencode($email); ?>" method="post">
    <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
    <input type="password" name="nueva_contrasena" required placeholder="Nueva Contraseña">
    <button type="submit">Cambiar Contraseña</button>
</form>

<?php
} else {
    echo "No se ha proporcionado un correo electrónico válido.";
}
?>
