<?php
require_once 'tools/funciones.php';

if (!isset($_SESSION['email']) && $_SESSION['rol'] != 'admin') {
    header('Location: login.php');
}

$usuarios = getAllUsuarios();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    if(borrarUsuarioPorId($id)) {
        header('Location: gestion_usuarios.php');
    }else{
        $error= 'No se ha podido borrar el usuario';
    }
}

?>

<!DOCTYPE html>
<html lang="es">
    <body>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acción</th>
            </tr>
            <?php foreach($usuarios as $usuario): ?>
            <tr>
                <td><?= $usuario->getNombre() ?></td>
                <td><?= $usuario->getEmail() ?></td>
                <td><?= $usuario->getRol() ?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $usuario->getId() ?>">
                        <input type="submit" value="Borrar">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>