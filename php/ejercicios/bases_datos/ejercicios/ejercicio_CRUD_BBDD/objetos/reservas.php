<?php

class Reservas
{
    private $id;
    private $id_usuario;
    private $id_habitacion;
    private $fecha_inicio;
    private $fecha_fin;

    public function __construct($id, $id_usuario, $id_habitacion, $fecha_inicio, $fecha_fin)
    {
        $this->id = $id;
        $this->id_usuario = $id_usuario;
        $this->id_habitacion = $id_habitacion;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_fin = $fecha_fin;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }
    public function getIdHabitacion()
    {
        return $this->id_habitacion;
    }
    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }
    public function getFechaFin()
    {
        return $this->fecha_fin;
    }
}
