<!DOCTYPE html>
<html>
<?php
$longitud=rand(10,1000);
?>
<head>
<title>Ej 1</title>
</head>
<body>

<h1>LÍNEA</h1>
<p>Actualice la página para mostrar una nueva línea.</p>
<p>Longitud: <?=$longitud ;?></p>
<svg width='1000' xmlns="http://www.w3.org/2000/svg">
  <line x1="0" y1="10" x2="<?=$longitud ;?>" y2="10" style="stroke:black;stroke-width:5" />
</svg>
</body>
</html>