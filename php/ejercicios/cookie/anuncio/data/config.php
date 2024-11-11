<?php
define('RUTA_ANUNCIOS_JSON', 'V:/DWES_DAW2/Ampps/www/dwes1/php/ejercicios/cookie/anuncio/data/anuncios.json');
define('RUTA_ARTICULOS_JSON', 'V:/DWES_DAW2/Ampps/www/dwes1/php/ejercicios/cookie/anuncio/data/articulos.json');

define('TIEMPO_EXPIRACION_COOKIES', 3600);

define('COOKIE_OPCIONES', [
    'expires' => time() + TIEMPO_EXPIRACION_COOKIES,
    'path' => '/',
    'domain' => '',
    'secure' => true,
    'httponly' => true, 
    'samesite' => 'Strict'
]);
?>
