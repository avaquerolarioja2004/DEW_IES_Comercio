<?php
require_once '../tools/funciones.php';
require_once '../objetos/bbdd.php';
BBDD::startBBDD();
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit;
}

$habitaciones = getAllHabitaciones();
$reservas = getReservasPorUsuario($_SESSION['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['reservar'])) {
        $reserva = reservar($_POST['usuario_id'], $_POST['habitacion_id'], $_POST['fecha_entrada'], $_POST['fecha_salida']);
        if ($reserva) {
            header('Location: ver_reservas.php');
        } else {
            $error = "No se ha podido realizar la reserva en esa fecha";
        }
    } else {
        $id = $_POST['id'];
        cancelarReserva($id);
        header('Location: ver_reservas.php');
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<body>
    <h1>Reservas</h1>
    <table>
        <thead>
            <tr>
                <th>Fecha de entrada</th>
                <th>Fecha de salida</th>
                <th>Habitación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservas as $reserva) : ?>
                <tr>
                    <td><?= htmlspecialchars($reserva['fecha_inicio']) ?></td>
                    <td><?= htmlspecialchars($reserva['fecha_fin']) ?></td>
                    <td><?= htmlspecialchars($reserva['habitacion_id']) ?></td>
                    <td>
                        <form action="" method="POST">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($reserva['id']) ?>">
                            <input type="submit" value="Cancelar">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="reservar.php">Reservar</a>
    <?php if (isset($error)) : ?>
        <p><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
</body>
</html>