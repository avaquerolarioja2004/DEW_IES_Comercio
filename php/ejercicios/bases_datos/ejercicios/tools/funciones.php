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

function conectar($baseDatos, $usuario, $contrasena)
{
    try {
        $dsn = "mysql:host=localhost;dbname=$baseDatos;charset=utf8";
        $pdo = new PDO($dsn, $usuario, $contrasena);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function getInfoTabla($tabla)
{
    $pdo = conectar('empresa', 'root', 'mysql');
    $sql = "SELECT * FROM $tabla";
    try {
        $resultado = $pdo->query($sql);
        $resultado->setFetchMode(PDO::FETCH_ASSOC);
        $info = $resultado->fetchAll();
        return $info;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function buscarEmpleadoPorDepartamento($departamento_id)
{
    $pdo = conectar('empresa', 'root', 'mysql');
    $sql = "SELECT * FROM empleados WHERE departamento_id = ?";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$departamento_id]);
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function insertarEmpleado($nombre, $apellido, $departamento_id, $salario)
{
    $pdo = conectar('empresa', 'root', 'mysql');
    $sql = "INSERT INTO empleados (nombre, apellido, departamento_id, salario) VALUES (?, ?, ?, ?)";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nombre, $apellido, $departamento_id, $salario]);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function insertarDepartamento($nombre)
{
    $pdo = conectar('empresa', 'root', 'mysql');
    try {
        $sql = "INSERT INTO departamentos (nombre) VALUES (?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nombre]);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function actualizarSalario($id, $salario)
{
    $pdo = conectar('empresa', 'root', 'mysql');
    $sql = "UPDATE empleados SET salario = ? WHERE id = ?";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$salario, $id]);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function borrarEmpleado($id)
{
    $pdo = conectar('empresa', 'root', 'mysql');
    try {
        $sql = "DELETE FROM empleados WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function transaccion($salario, $id)
{
    $pdo = conectar('empresa', 'root', 'mysql');
    $pdo->beginTransaction();
    try {
        $sql = "UPDATE empleados SET salario = salario + ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$salario, $id]);
        $pdo->commit();
    } catch (PDOException $e) {
        $pdo->rollBack();
        echo "Error: " . $e->getMessage();
    }
}

function obetener_empleados_departamentos()
{
    $pdo = conectar('empresa', 'root', 'mysql');
    $sql = "SELECT empleados.nombre, empleados.apellido, departamentos.nombre as departamento FROM empleados JOIN departamentos ON empleados.departamento_id = departamentos.id";
    try {
        $resultado = $pdo->query($sql);
        $resultado->setFetchMode(PDO::FETCH_ASSOC);
        $info = $resultado->fetchAll();
        return $info;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}