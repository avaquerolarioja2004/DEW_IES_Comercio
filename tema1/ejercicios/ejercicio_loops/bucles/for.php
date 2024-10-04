<?php

$tipos=range('a','z');
$lista='';
for ($i = 0; $i < count($tipos); $i++) {
    $opcion=$tipos[$i];
    echo $lista.= '<li><a href="../abecedario/'.$opcion.'.php">'.$opcion.'</a></li>';

}

?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loops</title>
</head>
<body>
    <ul>
        <?php $lista ?>
    </ul>
</body>
</html>