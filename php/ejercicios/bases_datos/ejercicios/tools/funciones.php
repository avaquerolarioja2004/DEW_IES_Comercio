<?php

function crearBaseDatos()
{
    try {
        $dsn = "mysql:host=localhost;charset=utf8";
        $pdo = new PDO($dsn, 'root', 'mysql');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "CREATE DATABASE IF NOT EXISTS empresa";
        $pdo->exec($sql);

        echo "Base de datos creada exitosamente";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function crearTablaEmpleado()
{
    try {
        $dsn = "mysql:host=localhost;dbname=empresa;charset=utf8";
        $pdo = new PDO($dsn, 'root', 'mysql');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "CREATE TABLE IF NOT EXISTS empleados (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(50) NOT NULL,
            apellido VARCHAR(50) NOT NULL,
            departamento_id INT NOT NULL,
            salario DECIMAL(10, 2) CHECK(salario > 0),
            fecha_contrato TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (departamento_id) REFERENCES departamentos(id)
        )";
        $pdo->exec($sql);

        echo "Tabla empleados creada exitosamente";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function crearTablaDepartamento()
{
    try {
        $dsn = "mysql:host=localhost;dbname=empresa;charset=utf8";
        $pdo = new PDO($dsn, 'root', 'mysql');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE IF NOT EXISTS departamentos (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(50) NOT NULL
        )";

        $pdo->exec($sql);
        echo "Tabla departamentos creada exitosamente";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

crearBaseDatos();
crearTablaDepartamento();
crearTablaEmpleado();
