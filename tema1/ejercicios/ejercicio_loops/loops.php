<?php
/**
 * Haciendo uso de loops.php el programa debera de funcionar de la siguiente manera al clicar
 * sobre el elemento for debe llamar a un archivo llamado for.php en el que se deben presentar
 * la lista de las letras de la a-z todas en una fila sin uso de css, al clicar sobre 
 * cualquiera de las letras se debe de llamar a un fichero con el mismo nombre de la letra con
 * extension de php, ese archivo debe ejecutar un script para mostrar la letra con asteriscos y
 * tamaño de 7 filas, 5 columnas.
 * */

$tipos=['doWhile','while','for','foreach'];
$lista='';
foreach($tipos as $opcion){
    $lista.= '<li><a href="./bucles/'.$opcion.'.php">'.$opcion.'</a></li>';

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
        <?php echo $lista ?>
    </ul>
</body>
</html>