<?php
require_once 'tools/funciones.php';

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
}

$reservas = getReservasPorUsuario($id);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    cancelarReserva($id);
    header('Location: ver_reservas.php');
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
                    <td><?= $reserva->getFechaInicio() ?></td>
                    <td><?= $reserva->getFechaFin() ?></td>
                    <td><?= $reserva->getIdgetIdHabitacion() ?></td>
                    <td>
                        <form action="" method="POST">
                            <input type="hidden" name="id" value="<?= $reserva->getId() ?>">
                            <input type="submit" value="Cancelar">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <a href="reservar.php">Reservar</a>
</body>