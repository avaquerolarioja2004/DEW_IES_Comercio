<?php
require_once './usuario.php';
require_once '../tools/funciones.php';
/*
Crear una pagina web que me permita el registro de objetos usuario, los usuarios tienen nombre, foto, email, rol y contraseña
la contraseña se debe encriptar (usando una función nativa de php)
solo se debe permitir el registro de usuarios que no esten en ficheros binarios
*/

if (validarUsuario($_POST['usuario'])) {
    $nombre = $_POST['usuario'];
} else {
    $nombre = 'n/a';
}
$email = validarEmail($_POST['email']);
$rol = sanitizar($_POST['rol']);
$contraseña = $_POST['contraseña'];

// Manejo de la foto
if (isset($_FILES['foto'])) {
    $foto=$_FILES['foto'];
    $fotoRuta = './uploads/' . basename($foto['name']);
    if (!move_uploaded_file($foto['tmp_name'], $fotoRuta)) {
        echo "Error al subir la foto.<br>";
        echo "Ruta de archivo temporal: " . $foto['tmp_name'] . "<br>";
        echo "Ruta de destino: " . $fotoRuta . "<br>";
        die("Verifica los permisos de la carpeta o la ruta del archivo.");
    }
}else{
    $foto=false;
}
if($foto==false){
    $nuevoUsuario = new Usuario($nombre, $email, $fotoRuta, $rol, $contraseña);
}else{
    //$nuevoUsuario = new UsuariosFoto();
}


$fichero = 'usuarios.dat';
$usuariosExistentes = [];
if (file_exists($fichero)) {
    $usuariosExistentes = unserialize(file_get_contents($fichero));
}

foreach ($usuariosExistentes as $u) {
    if ($u->getEmail() === $email) {
        die("El usuario ya está registrado.");
    }
}

$usuariosExistentes[] = $nuevoUsuario;
file_put_contents($fichero, serialize($usuariosExistentes));
echo "Usuario registrado con éxito.";
