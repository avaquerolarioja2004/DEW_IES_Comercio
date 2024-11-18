<?php
require_once 'tools/funciones.php';

if (!isset($_SESSION['email']) && $_SESSION['rol'] != 'admin') {
    header('Location: login.php');
}

$usuarios = getAllUsuarios();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['borrar'])) {
        borrarUsuarioPorId($_POST['id']);
        header('Location: usuarios.php');
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Usuarios</title>
</head>

<body>
    <h1>Usuarios</h1>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($usuarios as $usuario) : ?>
            <tr>
                <td><?= $usuario->getId() ?></td>
                <td><?= $usuario->getNombre() ?></td>
                <td><?= $usuario->getEmail() ?></td>
                <td><?= $usuario->getRol() ?></td>
                <td>
                    <form action="usuarios.php" method="post">
                        <input type="hidden" name="id" value="<?= $usuario->getId() ?>">
                        <input type="submit" name="borrar" value="Borrar">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>