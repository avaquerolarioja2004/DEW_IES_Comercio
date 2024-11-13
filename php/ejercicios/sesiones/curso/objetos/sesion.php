<?php
class Sesion {
    private $actividadFile = __DIR__ . '/../ficheros/actividad.json';

    public function iniciarSesion($usuario) {
        session_start();
        $_SESSION['usuario'] = $usuario;
        session_regenerate_id(true);
    }

    public function cerrarSesion() {
        $pagina = $_SESSION['pagina_actual'] ?? 'desconocida';
        $this->registrarActividad($pagina);

        session_start();
        session_unset();
        session_destroy();
    }

    public function registrarActividad($pagina) {
        // Establecer un valor por defecto si `pagina` está vacío o no definido
        if (empty($pagina)) {
            $pagina = 'desconocida';
        }

        $actividad = $this->leerActividad();
        $usuario = $_SESSION['usuario'] ?? 'anonimo';  // Para evitar errores si no hay usuario en la sesión
        $timestamp = time();

        $actividad[$usuario][] = [
            'pagina' => $pagina,
            'tiempo' => $timestamp,
            'fecha' => date('Y-m-d H:i:s', $timestamp)
        ];

        file_put_contents($this->actividadFile, json_encode($actividad, JSON_PRETTY_PRINT));
    }

    private function leerActividad() {
        if (!file_exists($this->actividadFile)) {
            return [];
        }
        return json_decode(file_get_contents($this->actividadFile), true);
    }
}
?>
