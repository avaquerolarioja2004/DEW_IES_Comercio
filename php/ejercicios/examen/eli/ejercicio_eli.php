<?php
$dsn='mysql:host=localhost;';
$pdo=new PDO($dsn, 'root', 'mysql');
$pdo->exec('CREATE DATABASE IF NOT EXISTS examen1');
$pdo=new PDO($dsn.'dbname=examen1', 'root', 'mysql');
$pdo->exec("CREATE TABLE IF NOT EXISTS usuarios (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(100),
            email VARCHAR(100) UNIQUE,
            edad INT
        );");

$fichero=json_decode(file_get_contents('fichero.json'), true);
foreach ($fichero as $dato){
    $smt=$pdo->prepare('INSERT INTO usuarios(nombre,email,edad) values(?,?,?)');
    $smt->execute([$dato['nombre'], $dato['email'], $dato['edad']]);
}
?>