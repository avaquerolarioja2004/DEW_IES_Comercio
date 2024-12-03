<?php

require_once 'ej.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $titulo=$_POST['titulo'];
    $descripcion=$_POST['descripcion'];
    $estado=$_POST['estado'];
    $fecha_creacion=time();

    if(isset($_POST['crear'])){
        $tarea=new Tarea($titulo,$descripcion,$estado,$fecha_creacion);
        $tarea->agregar();
    }elseif(isset($_POST['borrar'])){
        //borrar
    }else{
        //editar
    }
}
$pdo=Conexion::iniciar();
$tareas=$pdo->query('SELECT * from tareas;')->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <p><?=$tareas?></p>
</body>
</html>