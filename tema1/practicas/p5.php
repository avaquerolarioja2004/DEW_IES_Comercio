<?php
echo "introduce nombre y apellido\n";
$nombreapellido = trim(fgets(STDIN));
$posespacio=strpos($nombreapellido, ' ');
$nombre= substr($nombreapellido, 0, $posespacio);
$apellido = substr($nombreapellido, $posespacio+1);
$inicialnom=strtoupper(substr($nombre,0,1));
$inicialape=strtoupper(substr($apellido,0,1));
echo 'Tus iniciales son: ', $inicialnom, '.' , $inicialape, '.';
?>