<!DOCTYPE html>
<html>
<?php
$r=rand(0,255);
$g=rand(0,255);
$b=rand(0,255);
?>
<head>
<title>Ej 2</title>
</head>
<body>

<h1>LÍNEA</h1>
<p>Actualice la página para mostrar un nuevo círculo.</p>
<p>RGB: (<?=$r ;?>, <?=$g ;?>, <?=$b ;?>)</p>
<svg height="100" width="100" xmlns="http://www.w3.org/2000/svg">
  <circle r="50" cx="50" cy="50" fill="rgb(<?=$r ;?>, <?=$g ;?>, <?=$b ;?>)" />
</svg>
</body>
</html>