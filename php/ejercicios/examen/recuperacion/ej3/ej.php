<?php
class Conexion{
    public static $pdo=null;

    private function __construct() {
        $pdo=new PDO('mysql:host=localhost;dbname=gestion_tareas;', 'root', 'mysql');
    }

    public static function iniciar(){
        if(self::$pdo==null){
            new Conexion();
            return self::$pdo;
        }else{
            return self::$pdo;
        }
    }
}

class Tarea{
    private $titulo, $descripcion, $estado, $fecha_creacion, $pdo;
    


    public function __construct($titulo, $descripcion, $estado, $fecha_creacion) {
        $this->titulo=$titulo;
        $this->descripcion=$descripcion;
        $this->estado=$estado;
        $this->fecha_creacion=$fecha_creacion;
        $this->pdo=Conexion::iniciar();
    }

    public function getInfo(){
        return [$this->titulo,$this->descripcion,$this->estado, $this->fecha_creacion];
    }

    function agregar(){
        $pdo->prepare('INSERT INTO tareas 
        (titulo, descripcion, estado,fecha_creacion) VALUES (?,?,?,?);')->excute(getInfo());

    }

    function borrar($id){
        $pdo->prepare('DELETE FROM tareas WHERE id=?')->excute([$id]);
    }
}