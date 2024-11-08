<?php
/*
Crear un sistema de autenticación en PHP donde el usuario ingresa su nombre de usuario y contraseña, y, 
si las credenciales son correctas, se guarda su información en la sesión. 
Utiliza medidas de seguridad para proteger las sesiones.
*/
session_start();

$valid_username = 'angel';
$valid_password = '123';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['username'] = $username;
        ini_set('session.cookie_secure', '1');
        ini_set('session.cookie_httponly', '1');
        ini_set('session.use_only_cookies', '1');
        session_regenerate_id(true);
        header("Location: welcome.php");
        exit();
    } else {
        echo "Credenciales incorrectas.";
    }
}
?>

<form method="POST">
    Usuario: <input type="text" name="username" required><br>
    Contraseña: <input type="password" name="password" required><br>
    <button type="submit">Iniciar sesión</button>
</form>
