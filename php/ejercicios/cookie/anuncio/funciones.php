<?php
require_once './data/config.php';

$anuncios = json_decode(file_get_contents(RUTA_ANUNCIOS_JSON), true)['anuncios'] ?? [];
$articulos = json_decode(file_get_contents(RUTA_ARTICULOS_JSON), true)['articulos'] ?? [];

function mostrarAnuncios()
{
    $anuncios_elegidos = [];
    global $anuncios;

    if (isset($_COOKIE['gustos'])) {
        $gustos = unserialize($_COOKIE['gustos']);
        if (!is_array($gustos)) {
            $gustos = [$gustos];
        }

        foreach ($anuncios as $anuncio) {
            $categorias = is_array($anuncio['categorias']) ? $anuncio['categorias'] : [$anuncio['categorias']];

            if (array_intersect($gustos, $categorias) && count($anuncios_elegidos) < 3 && !in_array($anuncio, $anuncios_elegidos)) {
                $anuncios_elegidos[] = $anuncio;
            }
        }
    }

    if (count($anuncios_elegidos) < 2) {
        $faltantes = array_diff_key($anuncios, array_flip(array_column($anuncios_elegidos, 'id')));
        $random_keys = array_rand($faltantes, 2 - count($anuncios_elegidos));
        if (!is_array($random_keys)) {
            $random_keys = [$random_keys];
        }
        foreach ($random_keys as $key) {
            $anuncios_elegidos[] = $faltantes[$key];
        }
    }

    echo '<div class="anuncios">';
    foreach ($anuncios_elegidos as $anuncio) {
        echo '<a href="mostrar.php?anuncio=' . htmlspecialchars($anuncio["id"]) . '">';
        echo '<div class="anuncio">';
        echo '<h2>' . htmlspecialchars($anuncio['titulo']) . '</h2>';
        echo '<p>' . htmlspecialchars($anuncio['descripcion']) . '</p>';
        echo '<img src="' . htmlspecialchars($anuncio['imagen_url']) . '" alt="' . htmlspecialchars($anuncio['titulo']) . '" height="150px">';
        echo '</div>';
        echo '</a>';
    }
    echo '</div>';
}


function mostrarArticulos()
{
    if (isset($_COOKIE['inicio_visualizacion'])) {
        $ip_usuario = $_SERVER['REMOTE_ADDR'] ?? 'IP desconocida';
        $log_file = './logs/registros.log';
        $info = explode(',',$_COOKIE['inicio_visualizacion']);
        $inicio=(int)$info[0];
        $tiempo_transcurrido = time() - $inicio;
        $log_entry = date('Y-m-d H:i:s') . " - Anuncio ID: $info[1] - Tiempo de visualización: $tiempo_transcurrido segundos - IP: $ip_usuario\n";
        file_put_contents($log_file, $log_entry, FILE_APPEND);
        setcookie('inicio_visualizacion', time() - 3600, COOKIE_OPCIONES);
    }
    $articulos_elegidos = [];
    global $articulos;
    if (isset($_COOKIE['gustos'])) {
        $gustos = unserialize($_COOKIE['gustos']);

        if (!is_array($gustos)) {
            $gustos = [$gustos];
        }

        foreach ($articulos as $articulo) {
            $tematica = is_array($articulo['tematica']) ? $articulo['tematica'] : [$articulo['tematica']];

            if (array_intersect($gustos, $tematica) && count($articulos_elegidos) < 3 && !in_array($articulo, $articulos_elegidos)) {
                $articulos_elegidos[] = $articulo;
            }
        }
    }

    if (count($articulos_elegidos) < 3) {
        $articulos_faltantes = array_diff_key($articulos, array_flip(array_column($articulos_elegidos, 'id')));
        $articulos_random = array_rand($articulos_faltantes, 3 - count($articulos_elegidos));
        if (!is_array($articulos_random)) {
            $articulos_random = [$articulos_random];
        }
        foreach ($articulos_random as $key) {
            $articulos_elegidos[] = $articulos_faltantes[$key];
        }
    }

    echo '<div class="articulos">';
    foreach ($articulos_elegidos as $articulo) {
        echo '<a href="mostrar.php?articulo=' . htmlspecialchars($articulo["id"]) . '">';
        echo '<div class="articulo">';
        echo '<h2>' . htmlspecialchars($articulo['titulo']) . '</h2>';
        echo '<p>' . htmlspecialchars($articulo['resumen']) . '</p>';
        echo '<h3>' . htmlspecialchars($articulo['tematica']) . '</h3>';
        echo '</div>';
        echo '</a>';
    }
    echo '</div>';
}

function crearCookie($gustos)
{
    if (!is_array($gustos)) {
        $gustos = [$gustos];
    }

    if (!isset($_COOKIE['gustos'])) {
        setcookie('gustos', serialize($gustos), COOKIE_OPCIONES);
    } else {
        $gustosA = unserialize($_COOKIE['gustos']);
        if (!is_array($gustosA)) {
            $gustosA = [$gustosA];
        }
        if (count($gustosA) != 2) {
            $final = array_merge($gustosA, $gustos);
            setcookie('gustos', serialize($final), COOKIE_OPCIONES);
        }
    }
}


function mostrarAnuncio($id)
{
    contarTiempoVisualizacion($id);
    global $anuncios;
    foreach ($anuncios as $anuncio) {
        if ($anuncio['id'] == $id) {
            echo '<div class="anuncio">';
            echo '<h1>' . htmlspecialchars($anuncio['titulo']) . '</h1>';
            echo '<p>' . htmlspecialchars($anuncio['descripcion']) . '</p>';
            echo '<h2>' . htmlspecialchars($anuncio['categorias'][0]) . '</h2>';
            echo '<h2>' . htmlspecialchars($anuncio['categorias'][1]) . '</h2>';
            echo '<img src="' . htmlspecialchars($anuncio['imagen_url']) . '" alt="' . htmlspecialchars($anuncio['titulo']) . '" height="150px">';
            echo '</div>';
            break;
        }
    }
}

function mostrarArticulo($id)
{
    global $articulos;
    foreach ($articulos as $articulo) {
        if ($articulo['id'] == $id) {
            echo '<div class="articulo">';
            echo '<h1>' . htmlspecialchars($articulo['titulo']) . '</h1>';
            echo '<p>' . htmlspecialchars($articulo['resumen']) . '</p>';
            echo '<h3>' . htmlspecialchars($articulo['tematica']) . '</h3>';
            echo '</div>';
            break;
        }
    }
}

function getTema($id)
{
    global $articulos;
    foreach ($articulos as $articulo) {
        if ($articulo['id'] == $id) {
            return $articulo['tematica'];
        }
    }
}

function contarTiempoVisualizacion($anuncioId)
{
    setcookie('inicio_visualizacion', time().','.$anuncioId, COOKIE_OPCIONES);
}
