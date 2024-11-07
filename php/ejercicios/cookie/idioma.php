<?php
$cookie = isset($_COOKIE['idioma']) ? unserialize($_COOKIE['idioma']) : 'Español';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idioma'])) {
    $cookie = $_POST['idioma'];
    setcookie(
        'idioma', serialize($cookie),
        [
            'expires' => time() + 60,
            'path' => '/',
            'domain' => 'localhost',
            'secure' => true,
            'httponly' => true,
            'samesite' => 'Strict'
        ]
    );
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cookie</title>
</head>
<body>
    <h1>Selecciona un idioma</h1>
    <form action="" method="POST">
        <input type="hidden" name="idioma" value="Inglés">
        <input type="submit" value="Ingles">
    </form>
    <br>
    <form action="" method="POST">
        <input type="hidden" name="idioma" value="Español">
        <input type="submit" value="Español">
    </form>

    <p>El idioma seleccionado era: <?=$cookie?>.</p>
</body>
</html>
