<?php
/*
Partiendo de un texto extrae la palabra que comience con la letra aleatoria generada.
Como extra contad las palabras repetidas.
*/
$var = <<<TEXTO
Lorem ipsum odor amet, consectetuer adipiscing elit. Sem nisl commodo ridiculus montes per, viverra quisque placerat. Eros velit eleifend faucibus hac faucibus magna primis habitasse. Ante et torquent nec ullamcorper tempus quis malesuada. Interdum mollis volutpat hendrerit bibendum habitant netus nulla pulvinar. Eget taciti varius tempor porta ut curae in mus. Malesuada magna aenean per elementum sit turpis proin. Viverra venenatis luctus magna pharetra neque mi pharetra adipiscing? Integer himenaeos per nisl dictum facilisis duis sed. Torquent eros consectetur neque in quam finibus. Elementum dapibus ultrices vel nisl praesent. Semper id placerat ex hendrerit phasellus elit. Anisi sodales consectetur eu litora curae ante accumsan laoreet. Nullam a at tristique habitasse cras ut. Blandit luctus praesent velit; ullamcorper felis egestas nostra curabitur. Senectus purus et ipsum aptent duis ornare nullam. Alacus sit metus accumsan consectetur duis elit. In tincidunt praesent dictum eu pulvinar porta vestibulum. Donec suspendisse hendrerit id; porta conubia quisque ut. Ornare habitasse consequat tempus elit quisque nec pulvinar. Nec luctus placerat nam hendrerit interdum sapien in. Nisi lacus mauris tellus aliquet integer urna urna. Montes feugiat sociosqu faucibus donec eget montes diam nunc. Elit vestibulum morbi quis non vitae ultrices. Curabitur leo mollis enim cras netus. Vel vivamus felis porta sodales vitae. Convallis eu nunc ultricies quam; erat primis. Convallis curabitur nulla maximus potenti ligula porta luctus penatibus pretium. Iaculis facilisi facilisis ullamcorper consequat fermentum adipiscing. At ligula nisl natoque sociosqu dictumst porta torquent. Fusce natoque ac; conubia senectus eu rutrum vivamus netus. Placerat id ullamcorper aliquam praesent sociosqu lacinia etiam dis. Donec primis curae metus viverra curae morbi elementum orci sed. Ipsum neque hac urna suspendisse; volutpat vitae volutpat. Cubilia nunc duis leo litora nostra ipsum quis elementum. Venenatis tristique gravida at porttitor gravida primis cras eros blandit. Feugiat congue pretium lorem aptent duis. Parturient molestie in pharetra metus sociosqu; sit sollicitudin ac. Malesuada morbi arcu facilisi suscipit montes id, id integer? Pharetra massa litora maecenas tortor eget egestas proin vitae pharetra.
TEXTO;
$letra=chr(rand(ord('a'), ord('z')));
$letraMayus=strtoupper($letra);
$palabra='';
$var=str_replace('.','',$var);
$var=str_replace(',','',$var);
$var=str_replace('\n','',$var);
$palabras=explode(' ',$var);
$mapa=[];
foreach ($palabras as $palabra) {
    if(str_starts_with($palabra, $letra) || str_starts_with($palabra, $letraMayus)){
        if(array_key_exists($palabra, $mapa)){
            $value=$mapa[$palabra];
            $mapa[$palabra]=$value+1;
        }else{
            $mapa[$palabra]=1;
        }
    }
}
echo $letra;
echo '<br>';
print_r($mapa);

?>

