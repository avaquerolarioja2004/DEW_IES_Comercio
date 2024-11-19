<?php
class Usuario{
    private $id;
    private $nombre;
    private $email;
    private $password;
    private $rol;

    public function __construct($id,$nombre, $email, $password, $rol)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password=$password;
        $this->rol = $rol;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRol()
    {
        return $this->rol;
    }

}