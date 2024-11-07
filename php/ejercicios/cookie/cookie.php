<?php
$cookie = isset($_COOKIE['tema']) ? unserialize($_COOKIE['tema']) : ['white', 'black'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cookie'])) {
    $cookie = unserialize($_POST['cookie']);

    setcookie(
        'tema', serialize($cookie),
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
    <style>
        body {
            background-color: <?= htmlspecialchars($cookie[0]) ?>;
            color: <?= htmlspecialchars($cookie[1]) ?>;
        }
    </style>
</head>
<body>
    <h1>Cookie</h1>
    <form action="" method="POST">
        <input type="hidden" name="cookie" value="<?= htmlspecialchars(serialize(['black', 'white'])) ?>">
        <label>Oscuro</label>
        <input type="submit" value="Cambiar a Oscuro">
    </form>
    <form action="" method="POST">
        <input type="hidden" name="cookie" value="<?= htmlspecialchars(serialize(['white', 'black'])) ?>">
        <label>Claro</label>
        <input type="submit" value="Cambiar a Claro">
    </form>
</body>
</html>
