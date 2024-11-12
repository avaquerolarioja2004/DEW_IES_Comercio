<?php
require_once 'funciones.php';
if(isset($_GET['articulo'])){
    mostrarArticulo($_GET['articulo']);
    mostrarAnuncios();
    $tema=getTema($_GET['articulo']);
    crearCookie($tema);
}
elseif(isset($_GET['anuncio'])){
    mostrarAnuncio($_GET['anuncio']);
}