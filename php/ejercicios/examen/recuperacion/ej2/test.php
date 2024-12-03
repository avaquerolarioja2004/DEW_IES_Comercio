<?php
require_once 'ej.php';
$pathI='../recursos/productos.json';
$pathO='./out/out.json';
echo '<pre>';
echo 'leer json:';
$json=leerJson($path);
print_r($json);

echo 'obetener categorias:';
$categorias=obtenerCategorias($json);
print_r($categorias);

echo 'subcategorias:';

foreach ($categorias as $categoria) {
    print_r(obtenerSubcategoria($json,$categoria));
}

echo 'obtener productos';
$productos=obtenerProductos($json);
print_r($productos);

echo 'generar json con descuento:';
$jsonConDescuentos = generarJsonConDescuentos($json, [['nombre' => 'iPhone 14', 'descuento' => 0.80]]);
file_put_contents($pathO, $jsonConDescuentos);
echo $jsonConDescuentos;

echo '</pre>';