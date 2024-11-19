<?php
require_once '../tools/funciones.php';
session_start();
session_destroy();
header('Location: login.php');
?>