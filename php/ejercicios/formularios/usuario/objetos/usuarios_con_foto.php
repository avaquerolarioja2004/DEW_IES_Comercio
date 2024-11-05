<?php
require_once 'Usuario.php';

class UsuarioFoto extends Usuario {
    private $fotoPerfil;

    public function __construct($nombre, $email, $contrasena, $fotoPerfil = null) {
        parent::__construct($nombre, $email, $contrasena);
        $this->fotoPerfil = $fotoPerfil;
    }

    public function getFotoPerfil() {
        return $this->fotoPerfil;
    }

    public function setFotoPerfil($fotoPerfil) {
        $this->fotoPerfil = $fotoPerfil;
    }
}
?>
