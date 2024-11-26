<?php
$pdo = new PDO('mysql:host=localhost;dbname=examen', 'root', 'mysql');
$result = null;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['edad_min']) && isset($_POST['edad_max'])) {
        $stmt = $pdo->prepare('SELECT * FROM examen WHERE edad>=? AND edad<=?');
        $stmt->execute([$_POST['edad_min'], $_POST['edad_max']]);
        $result = $stmt->fetchAll();
    } elseif (isset($_POST['edad_min'])) {
        $stmt = $pdo->prepare('SELECT * FROM examen WHERE edad>=?');
        $stmt->execute([$_POST['edad_min']]);
        $result = $stmt->fetchAll();
    } elseif (isset($_POST['edad_max'])) {
        $smt = $pdo->prepare('SELECT * FROM examen WHERE edad<=?')->execute([$_POST['edad_max']]);
        $result = $stmt->fetchAll();
    } else {
        $stmt = $pdo->query('SELECT * FROM examen');
        $stmt->execute();
        $result = $stmt->fetchAll();
    }
}

if ($result) {
    $style = '<style>body{background-color:green;}</style>';
    $tabla = '<table border=1>
    <tr>
        <th>DNI</th>
        <th>Nombre</th>
        <th>Edad</th>
    </tr>';
    if(isset($_POST['orden']) && $_POST['orden']=='asc'){
        usort($result, function($a, $b){
            return $a['edad'] <=> $b['edad'];
        });
    }elseif(isset($_POST['orden']) && $_POST['orden']=='des'){
        usort($result, function($a, $b){
            return $b['edad'] <=> $a['edad'];
        });
    }
    foreach ($result as $row) {
        $tabla .= '<tr>
        <td>' . $row['dni'] . '</td>
        <td>' . $row['nombre'] . '</td>
        <td>' . $row['edad'] . '</td>
        </tr>';
    }
    $tabla .= '</table>';
} else {
    $style = '<style>body{background-color:red;}</style>';
    $tabla = '<h1>No hay resultados</h1>';
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Formulario con Radio Buttons</title>
    <?php if ($style) {
        echo $style;
    } ?>
</head>

<body>
    <form action="" method="post">
        <label for="edad_min">Edad mínima:</label>
        <input type="number" name="edad_min" id="edad_min">
        <br>
        <label for="edad_max">Edad máxima:</label>
        <input type="number" name="edad_max" id="edad_max">
        <br>
        <label>Selecciona el orden:</label>
        <br>
        <input type="radio" name="orden" value="asc" id="opcion1" checked>
        <label for="opcion1">Ascendiente</label>
        <br>
        <input type="radio" name="orden" value="des" id="opcion2">
        <label for="opcion2">Descendiente</label>
        <br>
        <input type="submit" value="Filtrar">
    </form>
    <?php if ($tabla) {
        echo $tabla;
    } ?>
</body>

</html>