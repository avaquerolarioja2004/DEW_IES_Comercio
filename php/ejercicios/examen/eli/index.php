<?php
$pdo=new PDO('mysql:host=localhost;dbname=examen1', 'root', 'mysql');
session_start();
$result=$pdo->query('SELECT * FROM usuarios;')->fetchAll(PDO::FETCH_ASSOC);
$filtro='';
$checked=$_SESSION['checked']??true;
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(!isset($_POST['limpiar'])){
        if(isset($_POST['filtrar'])){
            $filtro=$_POST['filtrar'];
            $result=$pdo->query('SELECT * FROM usuarios WHERE nombre LIKE "%'.$_POST['filtrar'].'%";')->fetchAll(PDO::FETCH_ASSOC);
        }
        if($_POST['orden']=='asc'){
            usort($result, function ($a,$b){
                return $a['edad']<=>$b['edad'];
            });
            $checked=true;
            $_SESSION['checked']=true;
        }elseif($_POST['orden']=='des'){
            usort($result, function ($a,$b){
                return $b['edad']<=>$a['edad'];
            });
            $checked=false;
            $_SESSION['checked']=false;
        }

        if(isset($_POST['guardar'])){
            $file=fopen('./fichero.bin','w');
            fwrite($file,serialize($result));
            fclose($file);
        }
    }
}

$tabla= '<table border=1>
        <tr><th>ID</th><th>Nombre</th><th>Email</th><th>Edad</th></tr>';
foreach ($result as $dato){
    $tabla.='<tr><td>'.$dato["id"].'</td><td>'.$dato["nombre"].'</td><td>'.$dato["email"].'</td><td>'.$dato["edad"].'</td></tr>';
}
$tabla.='</table>';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Examen</title>
</head>
<body>
    <form action="" method="post">
        <label for="filtrar">Filtrar por nombre:</label>
        <input type="text" name="filtrar" id="filtrar" value="<?=$filtro?>"><br><br>

        <label for="des">Ordenar de forma descendiente</label>
        <input id="des" type="radio" value="des" name="orden" <?php if(!$checked)echo 'checked' ?>>
        <label for="asc">Ordenar de forma ascendiente</label>
        <input id="asc" type="radio" value="asc" name="orden" <?php if($checked)echo 'checked' ?>><br><br>
        <input type="submit" value="Buscar">
        <input type="submit" value="Limpiar" name="limpiar">
        <input type="submit" value="Guardar" name="guardar">
    </form><br>
    <?php echo $tabla; ?>
</body>
</html>