<!DOCTYPE html>
<html>
<body>
<?php
$var = rand(1,6);
$emoji=rand(128568,	128576);
while(true){
    if($emoji!=128575 && $emoji!=128512){
        break;
    }
    $emoji=rand(128512,	129324);
}
?>
<h1>Dado aleatorio</h1>
<svg version="1.1" xmlns="http://www.w3.org/2000/svg"
     width="120" height="100" viewBox="0 0 120 100">
  <rect x="10" y="10" width="100" height="80"
        fill="RoyalBlue" />
        <text x="60" y="50" fill="white"><?=$var?></text>
</svg>
<?php
if($var==6){
    
    echo '<svg width="300" height="200" >
    <polygon points="100,10 40,198 190,78 10,78 160,198"
    style="fill:lime;stroke:purple;stroke-width:5;fill-rule:evenodd;" />
    tu navegador no soporta SVG.
</svg>';
echo '<h2>&#128512</h2>';
}elseif($var==1){
     echo '<h2>&#128575</h2>';
}else{
    echo '<h2>&#'.$emoji.'</h2>';
}
?>
</body>
</html>