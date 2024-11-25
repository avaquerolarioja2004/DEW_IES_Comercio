<?php
session_start();
$ip = $_SERVER['REMOTE_ADDR'];
$imagen = '';
$vistas = $_SESSION['vistas'] + 1 ?? 1;
$_SESSION['vistas'] = $vistas;
$imagenes = scandir('./imagenes');
$imagenes = array_diff($imagenes, ['.', '..']);
do {
    $imagen = $imagenes[array_rand($imagenes, 1)];
} while (
    str_contains($_SESSION['imagenes'], $imagen) &&
    sizeof($imagenes) > sizeof(explode(',', $_SESSION['imagenes']))
);
if (sizeof(explode(',', $_SESSION['imagenes']))>sizeof($imagenes)) {
    $_SESSION['imagenes'] = '';
    $style = '<style>header{background-color: black; color: white;}</style>';
} else {
    $_SESSION['imagenes'] .= $imagen . ',';
    $style = '<style>header{background-image: url("imagenes/' . $imagen . '");}</style>';
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Prueba de examen</title>
    <?= $style ?>
</head>

<body>
    <header>
        <h1>Imagen aleatoria</h1>
    </header>

    <p>Lista de imagenes: </p>
    <ul>
        <?php
        $imagenesS = explode(',', $_SESSION['imagenes']);
        foreach ($imagenesS as $imagen) {
            echo "<li>$imagen</li>";
        }
        ?>
    </ul>
    <p>Veces que has visitado la pagina <?= $vistas ?> y la Ip es <?= $ip ?></p>
</body>

</html>