<?php
include 'producto.php';
define('PRODUCTOS_DIR', 'V:\\DWES_DAW2\\Ampps\\www\\dwes1\\php\\ejercicios\\ficheros\\crudFicheros\\');

function cargarProductos(int $cargar): array {
    $productos = [];
    $binarioFile = PRODUCTOS_DIR . 'productos.dat';
    $textFile = PRODUCTOS_DIR . 'productos.txt';

    if ($cargar===1 && file_exists($binarioFile) && filesize($binarioFile) > 0) {
        $productos = unserialize(file_get_contents($binarioFile));
    } elseif ($cargar===2 && file_exists($textFile) && filesize($textFile) > 0) {
        $file = fopen($textFile, 'r');
        while (($line = fgetcsv($file)) !== false) {
            $productos[] = new Producto($line[0], $line[1], floatval($line[2]));
        }
        fclose($file);

        // Guardar en archivo binario
        file_put_contents($binarioFile, serialize($productos));
    }

    return $productos;
}

function guardarProductosEnBinario($productos) {
    $binarioFile = PRODUCTOS_DIR . 'productos.dat';
    file_put_contents($binarioFile, serialize($productos));
}

function guardarProductosEnJSON($productos) {
    $jsonFile = PRODUCTOS_DIR . 'productos.json';
    $productosArray = array_map(function($producto) {
        return [
            'id' => $producto->getId(),
            'nombre' => $producto->getNombre(),
            'precio' => $producto->getPrecio()
        ];
    }, $productos);
    file_put_contents($jsonFile, json_encode($productosArray, JSON_PRETTY_PRINT));
}

function guardarProductosEnCSV($productos) {
    $csvFile = PRODUCTOS_DIR . 'productos.txt';
    $file = fopen($csvFile, 'w');
    foreach ($productos as $producto) {
        fputcsv($file, [$producto->getId(), $producto->getNombre(), $producto->getPrecio()]);
    }
    fclose($file);
}

function buscarProductoPorId($productos, $id) {
    foreach ($productos as $producto) {
        if ($producto->getId() === $id) {
            return $producto;
        }
    }
    return null;
}

function añadirProducto($productos, $id, $nombre, $precio): array {
    if (buscarProductoPorId($productos, $id)) {
        echo "ERROR: Ya existe un producto con ese ID.\n";
        return $productos;
    }
    $productos[] = new Producto($id, $nombre, $precio);
    echo "Producto añadido correctamente.\n";
    return $productos;
}

function modificarProducto($productos, $id, $nuevoNombre, $nuevoPrecio): array {
    $producto = buscarProductoPorId($productos, $id);
    if ($producto) {
        $producto->setNombre($nuevoNombre);
        $producto->setPrecio($nuevoPrecio);
        echo "Producto modificado correctamente.\n";
    } else {
        echo "ERROR: Producto no encontrado.\n";
    }
    return $productos;
}

function eliminarProducto($productos, $id): array {
    $encontrado = false;
    $productos = array_filter($productos, function($producto) use ($id, &$encontrado) {
        if ($producto->getId() === $id) {
            $encontrado = true;
            return false;
        }
        return true;
    });
    if ($encontrado) {
        echo "Producto eliminado correctamente.\n";
    } else {
        echo "ERROR: Producto no encontrado.\n";
    }
    return $productos;
}

function mostrarTodosLosProductos($productos) {
    foreach ($productos as $producto) {
        echo "ID: {$producto->getId()}, Nombre: {$producto->getNombre()}, Precio: {$producto->getPrecio()}\n";
    }
}

function mostrarTodosLosProductosOrdenado($productos) {
    usort($productos, function($a, $b) {
        return $b->getPrecio() <=> $a->getPrecio();
    });
    foreach ($productos as $producto) {
        echo "ID: {$producto->getId()}, Nombre: {$producto->getNombre()}, Precio: {$producto->getPrecio()}\n";
    }
}

function mostrarMenu() {
    echo "Menú CRUD:\n";
    echo "1. Añadir Producto\n";
    echo "2. Buscar Producto\n";
    echo "3. Mostrar Todos los Productos\n";
    echo "4. Mostrar Todos los Productos Ordenados\n";
    echo "5. Modificar Producto\n";
    echo "6. Eliminar Producto\n";
    echo "7. Guardar Productos en Archivo Binario\n";
    echo "8. Guardar Productos en JSON\n";
    echo "9. Guardar Productos en CSV\n";
    echo "10. Salir\n";
}