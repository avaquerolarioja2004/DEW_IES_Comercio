<?php
$path='../recursos/productos.json';
function leerJson($path){
    if(file_exists($path)){
        return json_decode(file_get_contents($path), true);
    }
}

function obtenerCategorias($json){
    $categorias=[];
    foreach ($json as $key => $value) {
        foreach ($value as $key2 => $value2) {
            $categorias[]=$key2;
        }
    }
    return $categorias;
}

function obtenerSubcategoria($json, $categoria){
    $categoria=array_column($json,$categoria);
    $sub=[];
    if(empty($categoria)){
        return 'Error categoria no encontrada';
    }else{
        return $categoria;
    }
}

function obtenerProductos($json){
    $productos=[];
    foreach ($json as $cateoria => $producto) {
        foreach ($producto as $key) {
            foreach ($key as $p) {
                foreach ($p as $j) {
                    $productos[]=$j;
                }
            }
        }
    }
    return $productos;
}

function aplicarDescuento($json, $descuentos) {
    foreach ($json['categorias'] as $categoria => &$subcategorias) {
        foreach ($subcategorias as $subcategoria => &$items) {
            foreach ($items as &$producto) {
                foreach ($descuentos as $descuento) {
                    if ($descuento['nombre'] == $producto['nombre']) {
                        $producto['descuento'] = (100-$descuento['descuento']*100) . '%';
                        $producto['precio_con_descuento'] = $producto['precio'] * $descuento['descuento'];
                    }
                }
            }
        }
    }
    return $json;
}

function generarJsonConDescuentos($json, $descuentos){
    $json=aplicarDescuento($json,$descuentos);
    return json_encode($json, JSON_PRETTY_PRINT);
}