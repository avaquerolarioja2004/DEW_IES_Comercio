<!DOCTYPE html>
<html>
<?php
$var = rand(1, 6);
$var2 = rand(1, 6);
/*$d1 = file_get_contents('../img/dados/1.svg');
$d2 = file_get_contents('../img/dados/2.svg');
$d3 = file_get_contents('../img/dados/3.svg');
$d4 = file_get_contents('../img/dados/4.svg');
$d5 = file_get_contents('../img/dados/5.svg');
$d6 = file_get_contents('../img/dados/6.svg');*/
?>
<head>
<title>Ej 3</title>
</head>
<body>
<h1>DADOS</h1>
<p>Actualice la página para mostrar una nueva tirada.</p>
<?php
echo '<img src="../img/dados/'. $var .'.svg" alt="'. $var .'">';
echo '<img src="../img/dados/'. $var2 .'.svg" alt="'. $var2 .'">';
?>
<p>El total es: </p>
    <svg width="150" height="150">
        <rect x="25" y="25" width="100" height="100" fill="none" stroke="black" stroke-width="2"/>
        <text x="75" y="85" font-size="30" text-anchor="middle" fill="black"><?=$var+$var2;?></text>
    </svg>
</body>
</html>
