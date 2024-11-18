<?php
require_once 'tools/funciones.php';

if(!isset($_SESSION['email'])){
    header('Location: login.php');
}

if($_SESSION['rol'] != 'admin'){
    header('Location: reservar.php');
}else{
    header('Location: admin.php');
}