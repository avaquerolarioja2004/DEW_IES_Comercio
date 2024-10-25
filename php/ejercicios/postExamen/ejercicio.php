<?php
/*
dir C:\Windows\*.*
Un nav A-Z que se use para filtrar por la letra que empiece el archivo
Los devuelve así
['ruta'=>C:/windows/tem, ->ruta de la carpeta
'archivos'=>[archivo1,archivo2,...]
]->directorio y así con todos los directorios de C:/windows/*.*
*/

function busquedaContenido():array
{
    $arrayDevuelto=[];
    $retShell = shell_exec('dir C:\Users\mrpox\OneDrive\Escritorio\*.* /s');
    $formateado = explode("\n", trim($retShell));
    $ficheros=[];
    foreach ($formateado as $linea) {
        $archivos=[];
        if (str_contains($linea, 'Directorio de ')) {
            $ruta=explode('Directorio de ' , $linea)[1];
        }elseif(!str_contains($linea, 'DIR')){
            if(preg_match("/[0-9]{1,2}\/[0-9]{1,2}\/([0-9][0-9]){1,2}/", $linea)){
                $arc=explode('/^([0-9]+(/[0-9]+)+)\\s+[0-9]+:[0-9]+$/i',$linea);
                $arc=explode(" ", trim($arc[0]));
                print_r($arc);
            }
        }
        $archivos[]=['ruta'=>$ruta,'archivos'=>$ficheros];
        $ruta=null;
    }
    return $arrayDevuelto;
}

function barraNav()
{
    $letras = range('A', 'Z');
    $contenido = '';
    foreach ($letras as $letra) {
        $contenido .= '<a href="?letra=' . $letra . '">' . $letra . '</a><&emsp>';
    }
    echo '<nav>' . $contenido . '</nav>';
}

print_r(busquedaContenido());
