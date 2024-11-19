<?php
require_once '../tools/funciones.php';
require_once '../objetos/bbdd.php';
session_start();
BBDD::startBBDD();
if (!isset($_SESSION['email']) || $_SESSION['rol'] != 'admin') {
    header('Location: login.php');
    exit;
}

$habitaciones = getAllHabitaciones();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['accion'] == 'crear') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];
    registrarHabitacion($nombre, $descripcion, $precio, $imagen);
    header('Location: gestion_habitaciones.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['accion'] == 'borrar') {
    $id = $_POST['id'];
    borrarHabitacion($id);
    header('Location: gestion_habitaciones.php');
}

?>

<!DOCTYPE html>
<html lang="es">

<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($habitaciones as $habitacion) : ?>
                <tr>
                    <td><?= htmlspecialchars($habitacion['id']) ?></td>
                    <td><?= htmlspecialchars($habitacion['nombre']) ?></td>
                    <td><?= htmlspecialchars($habitacion['descripcion']) ?></td>
                    <td><?= htmlspecialchars($habitacion['precio']) ?></td>
                    <td><?= htmlspecialchars($habitacion['imagen']) ?></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($habitacion['id']) ?>">
                            <input type="submit" value="Borrar">
                            <input type="hidden" name="accion" value="borrar">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <form action="" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required>
        <label for="descripcion">Descripción</label>
        <input type="text" name="descripcion" id="descripcion" required>
        <label for="precio">Precio</label>
        <input type="number" name="precio" id="precio" required>
        <label for="imagen">Imagen</label>
        <input type="text" name="imagen" id="imagen" required>
        <input type="submit" value="Crear">
        <input type="hidden" name="accion" value="crear">
    </form>
</body>

</html>