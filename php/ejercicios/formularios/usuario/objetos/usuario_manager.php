<?php
require_once 'usuario.php';
require_once 'usuarios_con_foto.php';
require_once __DIR__ . '/../config/config.php';

class UsuariosManager {
    private $usuarios = [];

    public function cargarUsuarios() {
        if (file_exists(USER_FILE_PATH)) {
            $this->usuarios = unserialize(file_get_contents(USER_FILE_PATH)) ?: [];
        }
    }

    public function guardarUsuarios() {
        file_put_contents(USER_FILE_PATH, serialize($this->usuarios));
    }

    public function agregarUsuario($nombre, $email, $contrasena, $fotoPerfil = null) {
        if ($this->emailExistente($email)) {
            return false;
        }
        $usuario = new UsuarioFoto($nombre, $email, $contrasena, $fotoPerfil);
        $this->usuarios[] = $usuario;
        $this->guardarUsuarios();
        return true;
    }

    public function emailExistente($email) {
        foreach ($this->usuarios as $usuario) {
            if ($usuario->getEmail() === $email) {
                return true;
            }
        }
        return false;
    }

    public function verificarAdministrador($email) {
        $administradores = file(ADMIN_FILE_PATH, FILE_IGNORE_NEW_LINES);
        return in_array($email, $administradores);
    }

    public function getUsuarios() {
        return $this->usuarios;
    }
}
