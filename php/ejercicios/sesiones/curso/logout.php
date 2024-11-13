<?php
require_once 'objetos/sesion.php';

$sesion = new Sesion();
$sesion->cerrarSesion();
header("Location: login.php");
exit();
?>
