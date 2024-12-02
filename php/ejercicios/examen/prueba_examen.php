<?php
session_start();
$fichero = 'fichero.txt';

if (file_exists($fichero)) {
    $contenido = file_get_contents($fichero);
    echo $contenido . "<br>";

    // Convertir el contenido en un array de líneas
    $lineas = explode("\n", $contenido);

    // Procesar cada línea como CSV
    $datos = [];
    foreach ($lineas as $linea) {
        if (!empty(trim($linea))) {
            $datos[] = str_getcsv($linea);
        }
    }

    // Mostrar el contenido procesado
    foreach ($datos as $fila) {
        echo implode(', ', $fila) . "<br>";
    }
} else {
    $con = fopen($fichero, 'w');
    fwrite($con, "Nombre,Edad,Email\nJuan,25,juan@example.com\nMaria,30,maria@example.com");
    fclose($con);
    echo 'Se ha creado el fichero';
}

$file='datos.bin';

if (file_exists($file)) {
    $datos = unserialize(file_get_contents($file));
    echo '<pre>';
    print_r($datos);
    echo '</pre>';
} else {
    $datos = ['angel', 25, 'angel@gmail.com'];
    file_put_contents($file, serialize($datos));
    echo 'Se ha creado el fichero';
}

$json='datos.json';
if(file_exists($json)){
    $datos = json_decode(file_get_contents($json), true);
    echo '<pre>';
    print_r($datos);
    echo '</pre>';
}else{
    $datos = ['nombre' => 'angel', 'edad' => 25, 'email' => 'angel@gmail.com'];
    file_put_contents($json, json_encode($datos, JSON_PRETTY_PRINT));
    echo 'Se ha creado el fichero';
}

$fichero='fichero.txt';
if(file_exists($fichero)){
    $con=fopen($fichero, 'r');
    while(($linea=fgets($con)) !== false){
        echo $linea . '<br>';
    }
}else{
    $con = fopen($fichero, 'w');
    fwrite($con, "Nombre,Edad,Email\nJuan,25,juan@gmail.com");
    fclose($con);
    echo 'Se ha creado el fichero';
}

setcookie('cookie', 'test', [
    'expires' => time() + 60,
    'path' => '/',
    'domain' => 'localhost',
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Strict'
]);

if(isset($_SESSION['test'])){
    echo $_SESSION['test'];
    session_unset();
    session_destroy();
}else{
    $_SESSION['test'] = 'Prueba de la sesion';
    session_regenerate_id(true);
    echo 'Se ha creado la sesión';
    echo $_COOKIE['cookie'];
}
$info='mysql:host=localhost;dbname=ejercicio_crud;charset=utf8';
$pdo=new PDO($info, 'root', 'mysql');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$smt=$pdo->prepare('SELECT * FROM usuarios WHERE id=?');
$smt->execute([133]);
$empleados=$smt->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($empleados);
echo '</pre>';
$table='';
if($_SERVER['REQUEST_METHOD']== 'POST'){
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $departamento_id=$_POST['departamento_id'];
    $salario=$_POST['salario'];
    $table= "<table border='1'><tr><th>Nombre</th><th>Apellido</th><th>Departamento</th><th>Salario</th></tr>";
    $table .= "<tr><td>$nombre</td><td>$apellido</td><td>$departamento_id</td><td>$salario</td></tr>";
    $table .= "</table>";
    filter_var($test, FILTER_VALIDATE_EMAIL);
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Prueba de examen</title>
</head>
<body>
    <form action="prueba_examen.php" method="POST">
        <input type="text" name="nombre" placeholder="Nombre" required><br>
        <input type="text" name="apellido" placeholder="Apellido" required><br>
        <input type="number" name="departamento_id" placeholder="Departamento" required><br>
        <input type="number" name="salario" placeholder="Salario" required><br>
        <input type="date" name="archivo" required><br>
        <button type="submit">Enviar</button>
    </form>
    <?php
        if(isset($table)){
            echo $table;
        }
    ?>
</body>