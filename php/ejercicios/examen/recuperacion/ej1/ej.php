<?php
$mensaje='';
if(isset($_COOKIE['sesion'])){
    $mensaje= 'No puedes acceder aun a la pagina, tieien que pasar 30 segundos';
}else{
    setcookie('sesion','inicio', time()+30);
}
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
    <h1>Bienvenido usuario</h1>
    <p><?=$mensaje?></p>
</body>
</html>