<!DOCTYPE html>
<html>
    <head>
    <title>DWES Ángel</title>
    </head>
<body>
<h1>DWES</h1>
<?php
if(isset($_SERVER['HTTP_USER_AGENT'])){
    echo $_SERVER['HTTP_USER_AGENT'];
}else{
    echo $_SERVER['COMPUTERNAME'] . "\n";
    var_dump($_SERVER);
}
// print devuelve un 1 si se ejecutó correctamente
$x=print 'hola';
echo $x;

?>

</body>
</html>