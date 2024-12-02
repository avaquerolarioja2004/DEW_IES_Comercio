<?php
$err = '';
$archivos_dir = [];
$carpetas = array_diff(scandir('./carpetas'), ['.', '..']);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $directorio = '.\\carpetas\\' . $_POST['directorio'];
    if (is_dir($directorio)) {
        $archivos_dir = escanearDirectorio($directorio);
    } else {
        $err = 'No se ha encontrado el directorio especificado.';
    }
}

function escanearDirectorio($path)
{
    $ficheros = scandir($path);
    $archivos_dir = [];
    if ($ficheros) {
        foreach ($ficheros as $fichero) {
            if ($fichero != '.' && $fichero != '..') {
                if (is_dir($path . DIRECTORY_SEPARATOR . $fichero)) {
                    $archivos_dir[] = $path . DIRECTORY_SEPARATOR . $fichero . '\\';
                    $archivos_dir = array_merge($archivos_dir, escanearDirectorio($path . DIRECTORY_SEPARATOR . $fichero));
                } else {
                    $archivos_dir[] = $path . DIRECTORY_SEPARATOR . $fichero;
                }
            }
        }
    }
    return $archivos_dir;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Explorador de Directorios</title>
</head>

<body>
    <h1>Explorador de Directorios</h1>
    <form method="post" action="">
        <label for="directorio">Directorio:</label>
        <select name="directorio" id="directorio" required>
            <?php foreach ($carpetas as $carpeta): ?>
                <option value="<?= htmlspecialchars($carpeta) ?>"><?= htmlspecialchars($carpeta) ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Explorar">
    </form>

    <?php if ($err): ?>
        <p style="color: red;"><?= htmlspecialchars($err) ?></p>
    <?php endif; ?>

    <h2>Contenido del Directorio</h2>
    <ul>
        <?php foreach ($archivos_dir as $archivo): ?>
            <li><?= htmlspecialchars($archivo) ?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>