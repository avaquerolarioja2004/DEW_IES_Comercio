<!DOCTYPE html>
<html>
    <?php
    $var=rand(50,150);
    $var2=rand(50,150);
    $var3=rand(50,150);
    $maxim=max($var,$var2,$var3);
    ?>

    <head><title>Ej 12</title></head>
    <body>
    <h1>CUADRADOS</h1>
    <p>Estos cuadrados tienen un lado de: <?=$var?>px, <?=$var2?>px y <?=$var3?>px.</p>
    <p>Actualice la página para mostrar tres nuevos cuadrados.</p>
    <svg width="<?=$maxim*3?>" height="<?=$maxim?>" xmlns="http://www.w3.org/2000/svg">
        <rect width="<?=$var?>" height="<?=$var?>" x="10" y="10" style="fill:rgb(255,0,255);" />
        <rect width="<?=$var2?>" height="<?=$var2?>" x="<?=($var+10)?>" y="10" style="fill:rgb(0,255,255);" />
        <rect width="<?=$var3?>" height="<?=$var3?>" x="<?=($var + $var2+10)?>" y="10" style="fill:rgb(255,0,0);" />
    </svg>
    </body>
</html>
