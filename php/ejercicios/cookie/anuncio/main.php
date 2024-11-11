<?php
require_once 'funciones.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anuncios y Artículos</title>
    <style>
        body {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            gap: 20px;
        }
        .contenido {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            width: 100%;
        }
        .articulos {
            flex: 0 0 70%; /* 70% del ancho para artículos */
        }
        .anuncios {
            flex: 0 0 28%; /* 28% del ancho para anuncios */
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .articulo, .anuncio {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }
        img {
            width: 40%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="contenido">
        <div class="articulos">
            <h1>Artículos</h1>
            <?php mostrarArticulos(); ?>
        </div>
        <div class="anuncios">
            <?php mostrarAnuncios(); ?>
        </div>
    </div>
</body>
</html>
