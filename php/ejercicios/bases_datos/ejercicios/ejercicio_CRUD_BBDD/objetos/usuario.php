<?php
require_once 'tools/funciones.php';
class Usuario{
    private $id;
    private $nombre;
    private $email;
    private $password;
    private $rol;

    public function __construct($nombre, $email, $password, $rol = 'usuario')
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->rol = $rol;
    }

    public function iniciarSesion()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        session_regenerate_id(true);

        $_SESSION['usuario'] = $this->id;
        $_SESSION['nombre'] = $this->nombre;
        $_SESSION['email'] = $this->email;
        $_SESSION['rol'] = $this->rol;
    }

    public static function cerrarSesion()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
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

    public function guardarUsuario()
    {
        try {
            $pdo=BBDD::getBBDD();
            $smt = $pdo->prepare("INSERT INTO usuarios (nombre, email, password, rol) VALUES (?, ?, ?, ?)");
            $smt->execute([$this->nombre, $this->email, $this->password, $this->rol]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function validarContrasena($email)
    {
        $pdo=BBDD::getBBDD();
        $smt = $pdo->prepare("SELECT password FROM usuarios WHERE email = ?");
        $smt->execute([$email]);
        $password = $smt->fetchColumn();
        return password_verify($password, $this->password);
    }

    public static function buscarUsuario($email)
    {
        try {
            $pdo=BBDD::getBBDD();
            $smt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
            $smt->execute([$email]);
            $usuario = $smt->fetch(PDO::FETCH_ASSOC);

            if($usuario){
                return new Usuario($usuario['nombre'], $usuario['email'], $usuario['password'], $usuario['rol']);
            }else{
                return null;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

}