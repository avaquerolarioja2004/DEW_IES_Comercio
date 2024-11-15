<?php
require_once 'tools/funciones.php';

class BBDD{
    private static $pdo=null;

    private function __construct()
    {
        $pdo = conectar();
        crearBBDD('ejercicio_crud', $pdo);
        $this->pdo = conectarBD('ejercicio', 'root', 'mysql');
        crearTablaUsuario($this->pdo);
        crearTablaHabitaciones($this->pdo);
        crearTablaReservas($this->pdo);
    }

    public static function startBBDD(){
        if(self::$pdo == null){
            new BBDD();
        }
        return self::$pdo;
    }

    public static function getBBDD(){
        return self::$pdo;
    }
}