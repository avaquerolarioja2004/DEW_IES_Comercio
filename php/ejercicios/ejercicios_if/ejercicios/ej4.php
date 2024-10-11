<!DOCTYPE html>
<html>

<head>
    <title>Dado más alto</title>
</head>
<?php
$var1 = rand(1, 6);
$var2 = rand(1, 6);
$var3 = rand(1, 6);
$mensaje = '';
if ($var1 == $var2 && $var2 = $var3 && $var1==$var3) {
    $mensaje = 'Has sacado un trio de ' . $var2;
} elseif ($var1 == $var2) {
    $mensaje = 'Has sacado un par de ' . $var2;
} elseif ($var1 == $var3) {
    $mensaje = 'Has sacado un par de ' . $var1;
} elseif ($var2 == $var3) {
    $mensaje = 'Has sacado un par de ' . $var2;
} else {
    $mensaje = 'No has sacado ningun par ó trio, pero el dado más alto su valor es: ' . max($var1, $var2, $var3);
}
?>
<h1>Tres dados</h1>
<p>Actualice la pagina para sacar una nueva tirada</p>
<img src="../dados/<?php echo $var1; ?>.svg" alt="Dado: <?php echo $var1; ?>">
<img src="../dados/<?php echo $var2; ?>.svg" alt="Dado: <?php echo $var2; ?>">
<img src="../dados/<?php echo $var3; ?>.svg" alt="Dado: <?php echo $var3; ?>">
<p><?= $mensaje ?></p>

</html>