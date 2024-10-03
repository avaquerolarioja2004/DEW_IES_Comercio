<!DOCTYPE html>
<html>
    <head><title>Ej 13</title></head>
    <?php
        $var1=rand(50,150);
        $var2=rand(50,150);
        $var3=rand(50,150);
        $maxim=max($var1,$var2,$var3);
    ?>
    <body>
    <h1>TRES CÍRCULOS</h1>
    <p>Estos circulos tienen un radio de: <?=$var1?>px, <?=$var2?>px y <?=$var3?>px.</p>
    <p>Actualice la página para mostrar tres nuevos círculos.</p>
        <svg height="<?=$maxim*10?>" width="<?=$maxim*10?>" xmlns="http://www.w3.org/2000/svg">
            <circle r="<?=$var1?>" cx="<?=$var1+20?>" cy="<?=$maxim*2?>" fill="rgb(255,0,0)" stroke="black" stroke-width="1" />
            <circle r="<?=$var2?>" cx="<?=$var1*2+$var2+20?>" cy="<?=$maxim*2?>" fill="rgb(0,255,0)" stroke="black" stroke-width="1" />
            <circle r="<?=$var3?>" cx="<?=$var1*2+$var2*2+$var3+20?>" cy="<?=$maxim*2?>" fill="rgb(0, 0,255)" stroke="black" stroke-width="1" />
        </svg>
    </body>
</html>