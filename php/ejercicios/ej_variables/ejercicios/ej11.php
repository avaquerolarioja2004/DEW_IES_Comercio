<!DOCTYPE html>
<html>
    <?php
    $var=rand(50,150);
    ?>

    <head><title>Ej 11</title></head>
    <body>
    <h1>CÍRCULOS DE COLOR</h1>
    <p>Estos circulos tienen un radio de: <?=$var?>px.</p>
    <p>Actualice la página para mostrar cuatro nuevos círculos.</p>
        <svg height="<?=$var*10?>" width="<?=$var*10?>" xmlns="http://www.w3.org/2000/svg">
            <circle r="<?=$var?>" cx="<?=$var+20?>" cy="<?=$var*2?>" fill="rgb(255,0,0)" stroke="black" stroke-width="1" />
            <circle r="<?=$var?>" cx="<?=$var*3+20?>" cy="<?=$var*2?>" fill="rgb(0,255,0)" stroke="black" stroke-width="1" />
            <circle r="<?=$var?>" cx="<?=$var*5+20?>" cy="<?=$var*2?>" fill="rgb(0, 0,255)" stroke="black" stroke-width="1" />
            <circle r="<?=$var?>" cx="<?=$var*7+20?>" cy="<?=$var*2?>" fill="rgb(255, 0,255)" stroke="black" stroke-width="1" />
        </svg>
    </body>
</html>