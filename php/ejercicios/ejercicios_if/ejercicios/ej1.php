<!DOCTYPE html>
<html>
    <head><title>Dado más alto</title></head>
<?php
$var1=rand(1,6);
$var2=rand(1,6);
$mensaje='';
if($var1==$var2){
    $mensaje='Has sacado un par de ' . $var2;
}else{
    if($var1>$var2){
        $mensaje='No has sacado ningun par, pero el dado más alto su valor es: '. $var1;
    }elseif($var1<$var2){
        $mensaje='No has sacado ningun par, pero el dado más alto su valor es: '. $var2;
    }
}
?>
<h1>Dos dados</h1>
<p>Actualice la pagina para sacar una nueva tirada</p>
<img src="../dados/<?php echo $var1; ?>.svg" alt="Dado: <?php echo $var1; ?>">
<img src="../dados/<?php echo $var2; ?>.svg" alt="Dado: <?php echo $var2; ?>">
<p><?=$mensaje?></p>
</html>