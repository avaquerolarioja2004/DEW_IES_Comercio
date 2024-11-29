<?php
$datos = json_decode(file_get_contents('./archivo.json'), true);
$totalVentasAnual = 0;
$totalVentasMensual = 0;
$filtroAnual = [];
$filtroMensual = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['ano']) && isset($_POST['producto'])) {
        $ano = $_POST['ano'];
        $producto = $_POST['producto'];
        $filtroAnual = array_filter($datos, function ($clave) use ($ano, $producto) {
            return $clave['ano'] == $ano && $clave['producto'] == $producto;
        });
        $totalVentasAnual = array_sum(array_column($filtroAnual, 'ventas'));
    }

    if (isset($_POST['ano_mes']) && isset($_POST['mes'])) {
        $ano = $_POST['ano_mes'];
        $mes = $_POST['mes'];
        $filtroMensual = array_filter($datos, function ($clave) use ($ano, $mes) {
            return $clave['ano'] == $ano && $clave['mes'] == $mes;
        });
        $totalVentasMensual = array_sum(array_column($filtroMensual, 'ventas'));
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Filtrar Ventas</title>
</head>

<body>
    <h1>Filtrar Ventas</h1>
    <form method="post" action="">
        <h2>Filtro Anual</h2>
        <label for="ano">Año:</label>
        <select name="ano" id="ano">
        <?php 
            $anos = array_unique(array_column($datos, 'ano'));
            usort($anos, function($a, $b) {
                return $a - $b;
            });
            foreach ($anos as $ano): ?>
                <option value="<?= $ano ?>"><?= $ano ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <label for="producto">Producto:</label>
        <input type="text" name="producto" id="producto" required>
        <br>
        <input type="submit" value="Filtrar Anual">
    </form>

    <?php if (!empty($filtroAnual)): ?>
        <h3>Resultados Anuales</h3>
        <table border="1">
            <tr>
                <th>Producto</th>
                <th>Año</th>
                <th>Mes</th>
                <th>Día</th>
                <th>Ventas</th>
            </tr>
            <?php foreach ($filtroAnual as $fila): ?>
                <tr>
                    <td><?= htmlspecialchars($fila['producto']) ?></td>
                    <td><?= htmlspecialchars($fila['ano']) ?></td>
                    <td><?= htmlspecialchars($fila['mes']) ?></td>
                    <td><?= htmlspecialchars($fila['dia']) ?></td>
                    <td><?= htmlspecialchars($fila['ventas']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <p>Total de ventas de <?= htmlspecialchars($producto) ?> en <?= htmlspecialchars($ano) ?>: <?= $totalVentasAnual ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <h2>Filtro Mensual</h2>
        <label for="ano_mes">Año:</label>
        <select name="ano_mes" id="ano">
            <?php 
            $anos = array_unique(array_column($datos, 'ano'));
            usort($anos, function($a, $b) {
                return $a - $b;
            });
            foreach ($anos as $ano): ?>
                <option value="<?= $ano ?>"><?= $ano ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <label for="mes">Mes:</label>
        <input type="number" name="mes" id="mes" required>
        <br>
        <input type="submit" value="Filtrar Mensual">
    </form>

    <?php if (!empty($filtroMensual)): ?>
        <h3>Resultados Mensuales</h3>
        <table border="1">
            <tr>
                <th>Producto</th>
                <th>Año</th>
                <th>Mes</th>
                <th>Día</th>
                <th>Ventas</th>
            </tr>
            <?php foreach ($filtroMensual as $fila): ?>
                <tr>
                    <td><?= htmlspecialchars($fila['producto']) ?></td>
                    <td><?= htmlspecialchars($fila['ano']) ?></td>
                    <td><?= htmlspecialchars($fila['mes']) ?></td>
                    <td><?= htmlspecialchars($fila['dia']) ?></td>
                    <td><?= htmlspecialchars($fila['ventas']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <p>Total de ventas en <?= htmlspecialchars($ano) ?>/<?= htmlspecialchars($mes) ?>: <?= $totalVentasMensual ?></p>
    <?php endif; ?>
</body>

</html>