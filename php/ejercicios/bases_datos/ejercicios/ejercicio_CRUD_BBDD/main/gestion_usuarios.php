<?php
require_once '../tools/funciones.php';
require_once '../objetos/bbdd.php';
session_start();
BBDD::startBBDD();
if (!isset($_SESSION['email']) || $_SESSION['rol'] != 'admin') {
    header('Location: login.php');
    exit;
}

$usuarios = getAllUsuarios();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    if (borrarUsuarioPorId($id)) {
        header('Location: gestion_usuarios.php');
    } else {
        $error = 'No se ha podido borrar el usuario';
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Acción</th>
        </tr>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?= htmlspecialchars($usuario['id']) ?></td>
                <td><?= htmlspecialchars($usuario['nombre']) ?></td>
                <td><?= htmlspecialchars($usuario['email']) ?></td>
                <td><?= htmlspecialchars($usuario['rol']) ?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($usuario['id']) ?>">
                        <input type="submit" value="Borrar">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>