<?php
require_once 'tools/funciones.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $usuario = getUsuarioPorEmail($email);

    if($usuario && password_verify($password, $usuario['password'])){
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['rol'] = $usuario['rol'];
        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nombre'] = $usuario['nombre'];
        if(!isset($_COOKIE['email'])){
            setcookie('email', $email, time() + 3600);
        }
        header('Location: index.php');
    }else{
        echo "Usuario o contraseña incorrectos";
    }
}