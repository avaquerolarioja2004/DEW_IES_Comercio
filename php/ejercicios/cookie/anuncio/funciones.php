<?php
require_once './data/config.php';

$anuncios = json_decode(file_get_contents(RUTA_ANUNCIOS_JSON), true)['anuncios'] ?? [];
$articulos = json_decode(file_get_contents(RUTA_ARTICULOS_JSON), true)['articulos'] ?? [];

function mostrarAnuncios()
{
    $anuncios_elegidos = [];
    global $anuncios;

    if (isset($_COOKIE['gustos'])) {
        // Deserializar la cookie y garantizar que $gustos sea un array
        $gustos = unserialize($_COOKIE['gustos']);
        if (!is_array($gustos)) {
            $gustos = [$gustos]; // Convierte a array si $gustos es un solo valor
        }

        foreach ($anuncios as $anuncio) {
            // Asegúrate de que categorías es un array
            $categorias = is_array($anuncio['categorias']) ? $anuncio['categorias'] : [$anuncio['categorias']];

            // Verifica si alguna categoría coincide con los gustos
            if (array_intersect($gustos, $categorias) && count($anuncios_elegidos) < 3 && !in_array($anuncio, $anuncios_elegidos)) {
                $anuncios_elegidos[] = $anuncio;
            }
        }
    }

    // Si no hay suficientes anuncios seleccionados, elige 3 al azar
    if (count($anuncios_elegidos) < 3) {
        $faltantes = array_diff_key($anuncios, array_flip(array_column($anuncios_elegidos, 'id')));
        $random_keys = array_rand($faltantes, 3 - count($anuncios_elegidos));
        foreach ($random_keys as $key) {
            $anuncios_elegidos[] = $faltantes[$key];
        }
    }

    // Mostrar los anuncios seleccionados
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
    $articulos_elegidos = [];
    global $articulos;
    if (isset($_COOKIE['gustos'])) {
        $gustos = unserialize($_COOKIE['gustos']);

        // Asegurarse de que $gustos es un array
        if (!is_array($gustos)) {
            $gustos = [$gustos]; // Convierte a array si es un solo gusto
        }

        foreach ($articulos as $articulo) {
            // Asegúrate de que tematica sea tratada como un array
            $tematica = is_array($articulo['tematica']) ? $articulo['tematica'] : [$articulo['tematica']];

            if (array_intersect($gustos, $tematica) && count($articulos_elegidos) < 3 && !in_array($articulo, $articulos_elegidos)) {
                $articulos_elegidos[] = $articulo;
            }
        }
    }

    // Asegura que haya al menos 3 artículos seleccionados
    if (count($articulos_elegidos) < 3) {
        $articulos_faltantes = array_diff_key($articulos, array_flip(array_column($articulos_elegidos, 'id')));
        $articulos_random = array_rand($articulos_faltantes, 3 - count($articulos_elegidos));
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
    // Asegurarse de que $gustos es un array
    if (!is_array($gustos)) {
        $gustos = [$gustos]; // Convierte $gustos en un array si es una cadena u otro tipo
    }

    if (!isset($_COOKIE['gustos'])) {
        // Serializa y establece la cookie por primera vez
        setcookie('gustos', serialize($gustos), COOKIE_OPCIONES);
    } else {
        // Deserializa la cookie existente
        $gustosA = unserialize($_COOKIE['gustos']);

        // Asegura que $gustosA sea un array
        if (!is_array($gustosA)) {
            $gustosA = [$gustosA];
        }

        // Combina los gustos antiguos con los nuevos, si es necesario
        if (count($gustos) != 2) {
            $final = array_merge($gustosA, $gustos);
            setcookie('gustos', serialize($final), COOKIE_OPCIONES);
        }
    }
}


function mostrarAnuncio($id)
{
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

function contarTiempoVisualizacion() {}
