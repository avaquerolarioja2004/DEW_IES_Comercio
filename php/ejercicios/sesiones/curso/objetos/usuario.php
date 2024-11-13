<?php
 class Usuario_Curso{
    private $filePath = __DIR__ . '/../ficheros/usuarios.json';

    private function leerUsuarios() {
        $usuarios = file_get_contents($this->filePath) ?? [];
        return json_decode($usuarios, true);
    }

    public function registrar($nombre, $password) {
        $usuarios = $this->leerUsuarios();
        
        foreach ($usuarios as $usuario) {
            if ($usuario['nombre'] === $nombre) {
                return "El nombre de usuario ya está registrado.";
            }
        }

        $usuarios[] = [
            'nombre' => $nombre,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'ultimaPagina' => 'pagina_1.php'
        ];

        file_put_contents($this->filePath, json_encode($usuarios));
        return "Registro exitoso.";
    }

    public function autenticar($nombre, $password) {
        $usuarios = $this->leerUsuarios();
        
        foreach ($usuarios as $usuario) {
            if ($usuario['nombre'] === $nombre && password_verify($password, $usuario['password'])) {
                return $usuario['ultimaPagina'];
            }
        }
        return false;
    }
 }