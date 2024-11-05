<?php
class Usuario
{
    private $nombre;
    private $email;
    private $contraseña;

    public function __construct($nombre, $email, $contraseña)
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->contraseña = password_hash($contraseña, PASSWORD_DEFAULT);
    }

    public function verificarContraseña($contraseña)
    {
        return password_verify($contraseña, $this->contraseña);
    }

    public function obtenerDatos()
    {
        return [
            'nombre' => $this->nombre,
            'email' => $this->email,
            'contraseña' => $this->contraseña
        ];
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function getContraseña()
    {
        return $this->contraseña;
    }

    public function setContraseña($contraseña){
        $this->contraseña=$contraseña;
    }
}
