<?php

// Cargar la plantilla HTML
$plantilla = file_get_contents('plantilla.html');

// Datos a insertar en la plantilla
$datos = [
    '{{ titulo }}' => 'Hola, Plantilla HTML',
    '{{ mensaje }}' => 'Esta es una plantilla HTML renderizada desde PHP.'
];

// Reemplazar los placeholders con los datos reales
$contenido = str_replace(array_keys($datos), array_values($datos), $plantilla);

// Mostrar el contenido final
echo $contenido;

?>