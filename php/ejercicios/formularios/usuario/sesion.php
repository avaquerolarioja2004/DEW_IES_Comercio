<?php
require_once './usuario.php';
require_once '../tools/funciones.php';
/*
iniciar sesión con email y con contraseña
si el usuario esta en el fichero administradores se mostraran todos los usuarios que existen
si no muestra toda la información del usuario que inició sesión
*/
$archivo = 'usuarios.dat';
if (isset($_POST['email']) && isset($_POST['contraseña'])) {
    $email = validarEmail($_POST['email']);
    $contraseña = $_POST['contraseña'];
    if (file_exists($archivo)) {
        $usuarios = unserialize(file_get_contents($archivo));
    }else{
        $usuarios=[];
        die('No existen usuarios');
    }

    foreach ($usuarios as $usuario) {
        if ($usuario->getEmail() === $email && $usuario->verificarContraseña($contraseña)) {
            if ($usuario->getRol() === 'admin') {
                echo "Eres administrador. Aquí están todos los usuarios:<br>";
                foreach ($usuarios as $u) {
                    echo "Nombre: {$u->getNombre()}, Email: {$u->getEmail()}, Rol: {$u->getRol()}<br>";
                }
            } else {
                echo "Bienvenido, {$usuario->getNombre()}<br>";
                echo "Email: {$usuario->getEmail()}<br>";
                echo "<img src='{$usuario->getImagen()}' alt='Foto de {$usuario->getNombre()}'><br>";
            }
            exit;
        }
    }

    echo "Credenciales incorrectas.";
}
