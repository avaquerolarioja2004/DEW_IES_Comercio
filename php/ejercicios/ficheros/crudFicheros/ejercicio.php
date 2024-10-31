<?php
include('./producto.php');
$productos = [];
if (file_exists('productos.dat')) {
    $file = fopen('productos.dat', 'rb');
    while (!feof($file)) {
        $productos[] = unserialize(fread($file, filesize('productos.dat')));
    }
    fclose($file);
} elseif (file_exists('productos.txt')) {
    $file = fopen('productos.txt', 'r');
    while (($line = fgetcsv($file)) !== false) {
        $productos[] = new Producto($line[0], $line[1], $line[2]);
    }
    fclose($file);

    $file = fopen('productos.dat', 'wb');
    foreach ($productos as $producto) {
        fwrite($file, serialize($producto));
    }
    fclose($file);
}
