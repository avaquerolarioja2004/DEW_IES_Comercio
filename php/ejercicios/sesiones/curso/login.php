<?php
require_once 'objetos/usuario.php';
require_once 'objetos/sesion.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];

    $usuario = new Usuario_Curso();
    $pagina = $usuario->autenticar($nombre, $password);

    if ($pagina) {
        session_start();
        $_SESSION['usuario'] = $nombre;
        $_SESSION['ultimaPagina'] = $pagina;
        header("Location: cursos/$pagina");
        exit();
    } else {
        echo "Credenciales incorrectas.";
    }
}
?>

<form method="post">
    Nombre: <input type="text" name="nombre" required>
    Contraseña: <input type="password" name="password" required>
    <button type="submit">Iniciar sesión</button>
</form>
<p>¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a></p>
