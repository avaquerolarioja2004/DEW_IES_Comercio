<?php
require_once '../tools/funciones.php';
require_once '../objetos/bbdd.php';
session_start();
BBDD::startBBDD();
if(!isset($_SESSION['email'])){
    header('Location: login.php');
    return;
}

if($_SESSION['rol'] != 'admin'){
    header('Location: reservar.php');
}else{
    header('Location: admin.php');
}