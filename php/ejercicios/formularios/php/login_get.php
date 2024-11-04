<?php
require_once '../tools/funciones.php';
if (isset($_GET['usuario'])) {
    $usuario = sanitizar($_GET['usuario']);
    $validarUsuario = validarUsuario($usuario);
    if ($validarUsuario != false) {
        echo $validarUsuario;
        echo '<br>';
    }
}

if (isset($_GET['email'])) {
    $email = sanitizar($_GET['email']);
    $validarEmail = validarEmail($email);
    if ($validarEmail != false) {
        echo $validarEmail;
        echo '<br>';
    }
}
