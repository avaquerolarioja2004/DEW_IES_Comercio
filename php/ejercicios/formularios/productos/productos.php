<?php
$error = '';
$productos = '';
$data = isset($_POST['data']) && !empty($_POST['data']) ? unserialize($_POST['data']) : [];
$productosPedidos = isset($_POST['productosPedidos']) && !empty($_POST['productosPedidos']) ? unserialize($_POST['productosPedidos']) : [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['comprar']) && sizeof($productosPedidos) > 0) {
        foreach ($productosPedidos as $pedido) {
            foreach ($data as $index => $line) {
                if ($line[0] === $pedido[0]) {
                    $data[$index][2] = max(0, $line[2] - $pedido[2]);
                    break;
                }
            }
        }

        $file = fopen('./data/productos.txt', 'w');
        if ($file) {
            foreach ($data as $line) {
                $lineText = implode(',', $line) . "\n"; 
                fwrite($file, $lineText);
            }
            fclose($file);
        } else {
            $error = 'No se pudo abrir el archivo para escribir los cambios.';
        }
        $productosPedidos = [];
    } elseif (isset($_POST['pedido'], $_POST['stock'], $_POST['nombre'], $_POST['precio']) && $_POST['pedido'] > $_POST['stock']) {
        $error = 'No hay suficiente stock del producto ' . $_POST['nombre'] . '.';
    } elseif (isset($_POST['pedido'], $_POST['nombre'], $_POST['precio'])) {
        $productosPedidos[] = [$_POST['nombre'], $_POST['precio'], $_POST['pedido'], $_POST['precio'] * $_POST['pedido']];
    }
}

$file = fopen('./data/productos.txt', 'r');
while (($line = fgetcsv($file)) !== false) {
    $data[] = $line;
    $productos .= '<form method="POST" action=""><label for="">Producto: ' . $line[0] . '<br>Precio: ' . $line[1] . '€/u<br>Stock: ' . $line[2] . ' unidades</label><input type="hidden" name="nombre" value="' . $line[0] . '">
    <input type="hidden" name="precio" value="' . $line[1] . '">
    <input type="hidden" name="stock" value="' . $line[2] . '"><input type="hidden" name="productosPedidos" value="' . htmlspecialchars(serialize($productosPedidos)) . '"><br><label>¿Cuantos quieres?</label>     <input type="number" name="pedido"><br><button type="submit">COMPRAR</button></form><br>';
}
fclose($file);

$cesta = '';
if (sizeof($productosPedidos) > 0) {
    $total = 0;
    foreach ($productosPedidos as $producto) {
        $cesta .= $producto[0] . '          ';
        $cesta .= $producto[1] . '€/u            ';
        $cesta .= $producto[2] . ' unidades';
        $cesta .= '<br>';
        $total += $producto[3];
    }
    $cesta .= 'Total: ' . $total . '€';
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Compras</title>
</head>

<body>
    <h1>Productos</h1>
    <?php if ($error): ?>
        <p><?= $error ?></p>
    <?php endif; ?>
    <?php echo $productos; ?>
    <p><?= $cesta ?></p>
    <form method="POST" action="">
        <input type="hidden" name="comprar" value="1">
        <input type="hidden" name="productosPedidos" value="<?= htmlspecialchars(serialize($productosPedidos)) ?>">
        <input type="hidden" name="data" value="<?= htmlspecialchars(serialize($data)) ?>">
        <button type="submit">COMPRAR LA CESTA</button>
    </form>
</body>

</html>