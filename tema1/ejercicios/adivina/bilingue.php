<?php
/*
Tendre un array de palabras español e ingles, de entre las palabras en español saldra una al cargar 
la página y me apareceran todas las posibles palabras en ingles. Si el usuario selecciona la correcta se le da la enhorabuena sino intentelo de nuevo.
*/
$texto='calor:hot,gato:cat,valiente:brave,uno:one,exclavo:slave,ganar:win';
$palabras=[];
foreach(preg_split()){
    
}
$ingles='<p>';
foreach($palabras as $palabra){
    $ingles.='<a href="?palabra="'.$palabra.'>'.$palabra.'</a><br>';
}
$ingles.='</p>';
$palabraRand=rand(0,count($palabras)-1);
?>