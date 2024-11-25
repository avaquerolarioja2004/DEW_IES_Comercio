<?php
$dsn= 'mysql:host=localhost;';
$pdo=new PDO($dsn,'root','mysql');
//$pdo->exec('CREATE DATABASE IF NOT EXISTS examen');
$pdo=new PDO($dsn.'dbname=examen','root','mysql');
/*$pdo->exec('CREATE TABLE IF NOT EXISTS examen(
    dni INT PRIMARY KEY,
    nombre VARCHAR(50),
    edad INT 
)');*/
$file=file_get_contents('fichero.csv');
$lineas=explode("\n",$file);
$headers = array_shift($lineas);
foreach($lineas as $linea){
    $campos=str_getcsv($linea);
    //$pdo->prepare('INSERT INTO examen(dni,nombre,edad) values(?,?,?)')->execute($campos);
}