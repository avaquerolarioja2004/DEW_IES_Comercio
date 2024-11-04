<?php
include 'ejercicio.php';
$productos = cargarProductos(2);
do {
    mostrarMenu();
    $opcion = intval(trim(fgets(STDIN)));

    switch ($opcion) {
        case 0:
            echo "¿Cual cargar?\n1. Binario\n2. CSV\n";
            $cargar = trim(fgets(STDIN));
            $productos = cargarProductos($cargar);
            break;
        case 1:
            echo "Ingrese el ID del producto: ";
            $id = trim(fgets(STDIN));
            echo "Ingrese el nombre del producto: ";
            $nombre = trim(fgets(STDIN));
            echo "Ingrese el precio del producto: ";
            $precio = floatval(trim(fgets(STDIN)));
            $productos = añadirProducto($productos, $id, $nombre, $precio);
            break;
        case 2:
            echo "Ingrese el ID del producto a buscar: ";
            $id = trim(fgets(STDIN));
            $producto = buscarProductoPorId($productos, $id);
            if ($producto) {
                echo "Producto encontrado: ID: {$producto->getId()}, Nombre: {$producto->getNombre()}, Precio: {$producto->getPrecio()}\n";
            } else {
                echo "ERROR: Producto no encontrado.\n";
            }
            break;
        case 3:
            mostrarTodosLosProductos($productos);
            break;
        case 4:
            echo "Productos ordenados por precio de mayor a menor.\n";
            mostrarTodosLosProductosOrdenado($productos);
            break;
        case 5:
            echo "Ingrese el ID del producto a modificar: ";
            $id = trim(fgets(STDIN));
            echo "Ingrese el nuevo nombre: ";
            $nuevoNombre = trim(fgets(STDIN));
            echo "Ingrese el nuevo precio: ";
            $nuevoPrecio = floatval(trim(fgets(STDIN)));
            $productos = modificarProducto($productos, $id, $nuevoNombre, $nuevoPrecio);
            break;
        case 6:
            echo "Ingrese el ID del producto a eliminar: ";
            $id = trim(fgets(STDIN));
            $productos = eliminarProducto($productos, $id);
            break;
        case 7:
            guardarProductosEnBinario($productos);
            echo "Productos guardados en archivo binario.\n";
            break;
        case 8:
            guardarProductosEnJSON($productos);
            guardarProductosEnBinario($productos); 
            echo "Productos guardados en archivo JSON.\n";
            break;
        case 9:
            guardarProductosEnCSV($productos);
            guardarProductosEnBinario($productos);
            echo "Productos guardados en archivo CSV.\n";
            break;
        case 10:
            echo "Saliendo del programa...\n";
            break;
        default:
            echo "Opción no válida. Inténtelo de nuevo.\n";
    }
} while ($opcion !== 10);
