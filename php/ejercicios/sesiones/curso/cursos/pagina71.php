<?php
        session_start();
        
        // Asegurarse de que la sesión está iniciada
        if (!isset($_SESSION['usuario'])) {
            header('Location: ../login.php');
            exit();
        }

        // Variables
        $usuario = $_SESSION['usuario'];
        $pagina = 'pagina' . 71 . '.php';  // La página actual

        // Ruta del archivo de usuarios
        $usuarioFile = 'V:\\DWES_DAW2\\Ampps\\www\\dwes1\\php\\ejercicios\\sesiones\\curso\\ficheros\\usuarios.json';

        // Cargar los usuarios
        if (file_exists($usuarioFile)) {
            $usuarios = json_decode(file_get_contents($usuarioFile), true);
        } else {
            $usuarios = [];
        }

        // Actualizar la última página visitada solo si el usuario existe
        actualizarUltimaPagina($usuario, 71, $usuarios, $usuarioFile);

        echo '<h2>Bienvenido a la página 71 del curso</h2>';
        echo '<a href="../logout.php">Cerrar sesión</a>';

        // Enlaces de navegación
        echo '<p>';
        if (71 > 1) {
            echo '<a href="pagina' . (71 - 1) . '.php">Página anterior</a>';
        }
        if (71 < 100) {
            echo ' | <a href="pagina' . (71 + 1) . '.php">Página siguiente</a>';
        }
        echo '</p>';

        // Función para actualizar la última página visitada
        function actualizarUltimaPagina($usuario, $pagina, &$usuarios, $usuarioFile)
        {
            // Buscar al usuario y actualizar solo la última página visitada
            foreach ($usuarios as &$usuarioData) {
                if ($usuarioData['nombre'] == $usuario) {
                    // Solo actualizamos la última página, no la contraseña ni otros datos
                    $usuarioData['ultimaPagina'] = 'pagina' . $pagina . '.php';

                    // Guardamos el archivo con la actualización de la última página
                    file_put_contents($usuarioFile, json_encode($usuarios, JSON_PRETTY_PRINT));
                    break;
                }
            }
        }
        ?>
        