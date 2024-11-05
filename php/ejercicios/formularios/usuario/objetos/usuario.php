<?php
class Usuario
{
    private $nombre;
    private $email;
    private $rol;
    private $contraseña;

    public function __construct($nombre, $email, $rol, $contraseña)
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->rol = $rol;
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
            'rol' => $this->rol,
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

    public function getRol()
    {
        return $this->rol;
    }

    public function getContraseña()
    {
        return $this->contraseña;
    }
}
