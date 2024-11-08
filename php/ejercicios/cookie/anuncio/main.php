<?php
require_once './data/config.php';
$anuncios = json_decode(file_get_contents(RUTA_ANUNCIOS_JSON), true);
$articulos = json_decode(file_get_contents(RUTA_ARTICULOS_JSON), true);

print_r($anuncios);