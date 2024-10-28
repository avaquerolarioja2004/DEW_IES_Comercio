<?php
/*
dir C:\Windows\*.*
Un nav A-Z que se use para filtrar por la letra que empiece el archivo
Los devuelve así
['ruta'=>C:/windows/tem, ->ruta de la carpeta
'archivos'=>[archivo1,archivo2,...]
]->directorio y así con todos los directorios de C:/windows/*.*
*/

function busquedaContenido(): array
{
    $arrayDevuelto = [];
    $retShell = shell_exec('dir C:\Users\mrpox\OneDrive\Escritorio\*.* /s');
    $formateado = explode("\n", $retShell);
    $ruta = null;
    $ficheros = [];

    foreach ($formateado as $linea) {
        if (str_contains($linea, 'Directorio de ')) {
            if ($ruta && !empty($ficheros)) {
                $arrayDevuelto[] = ['ruta' => $ruta, 'archivos' => $ficheros];
            }
            $ruta = explode('Directorio de ', $linea)[1];
            $ficheros = [];
        } elseif (preg_match('/\d+\/\d+\/\d+\s+\d+:\d+\s+[^\d]+/', $linea) && !str_contains($linea, '<DIR>')) {
            if (preg_match('/\s+(\S+)$/', $linea, $nombreArchivo)) {
                $ficheros[] = trim($nombreArchivo[1]);
            }
        }
    }

    if ($ruta && !empty($ficheros)) {
        $arrayDevuelto[] = ['ruta' => $ruta, 'archivos' => $ficheros];
    }

    return $arrayDevuelto;
}

function filtrarPorLetra(array $contenido, ?string $letra): array
{
    if (!$letra) {
        return $contenido;
    }

    $letra = strtoupper($letra);
    foreach ($contenido as &$directorio) {
        $directorio['archivos'] = array_filter($directorio['archivos'], function ($archivo) use ($letra) {
            return strtoupper($archivo[0]) === $letra;
        });
    }

    return array_filter($contenido, function ($directorio) {
        return !empty($directorio['archivos']);
    });
}

function barraNav()
{
    $letras = range('A', 'Z');
    $contenido = '<a href="testEjercicio.php">Todos</a>           ';
    foreach ($letras as $letra) {
        $contenido .= '<a href="?letra=' . $letra . '">' . $letra . '</a>           ';
    }
    echo '<nav>' . $contenido . '</nav>';
}

function mostrarContenido()
{
    echo '<h1>Mostrar Contenido de: C:\Users\mrpox\OneDrive\Escritorio</h1>';
    echo '<nav>' . barraNav() . '</nav>';
    echo '<section>';

    $contenido = busquedaContenido();
    $letraSeleccionada = $_GET['letra'] ?? null;
    $resultadosFiltrados = filtrarPorLetra($contenido, $letraSeleccionada);

    echo '<ul>';
    
    foreach ($resultadosFiltrados as $directorio) {
        echo '<li><strong>Ruta:</strong> ' . htmlspecialchars($directorio['ruta']) . '</li>';
        echo '<ul>';
        foreach ($directorio['archivos'] as $archivo) {
            echo '<li>' . htmlspecialchars($archivo) . '</li>';
        }
        echo '</ul>';
    }
    
    echo '</ul>';
    echo '</section>';
}
?>
