<!DOCTYPE html>
<html>
    <?php
        $c1=rand(1,10);
        $c2=rand(1,10);
        $c3=rand(1,10);
        while($c2==$c1){
            $c2=rand(1,10);
        }
        while($c3==$c2 || $c3==$c1){
            $c3=rand(1,10);
        }
        $maxim=max($c1,$c2,$c3);
    ?>
<head>
<title>Ej 4</title>
</head>
<body>
<h1>CARTA</h1>
<p>Actualice la página para mostrar una nueva mano de cartas.</p>
<?php
echo '<img src="../img/cartas/c'. $c1 .'.svg" alt="'. $c1 .'">';
echo '<img src="../img/cartas/c'. $c2 .'.svg" alt="'. $c2 .'">';
echo '<img src="../img/cartas/c'. $c3 .'.svg" alt="'. $c3 .'">';
?>
<p>La carta más alta es un: <?=$maxim?></p>
</html>