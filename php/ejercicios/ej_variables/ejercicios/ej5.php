<!DOCTYPE html>
<html>
    <?php
        $r=rand(64,255);
        $g=rand(64,255);
        $b=rand(64,255);
    ?>
    <head><title>Ej 5</title></head>
    <body>
        <h1>CIRCULOS DE COLOR</h1>
        <p>Actualice la página para mostrar tres nuevos circulos.</p>
        <div class="color-label">
            <p>Rojo: <?php echo $r; ?></p>
            <p>Verde: <?php echo $g; ?></p>
            <p>Azul: <?php echo $b; ?></p>
        </div>
        <svg height="300" width="300" xmlns="http://www.w3.org/2000/svg">
            <circle r="45" cx="150" cy="150" fill="rgba(<?=$r;?>, 0,0,0.6)" stroke="black" stroke-width="1" />
            <circle r="45" cx="190" cy="150" fill="rgba(0, <?=$g;?>,0,0.6)" stroke="black" stroke-width="1" />
            <circle r="45" cx="170" cy="190" fill="rgba(0, 0,<?=$b;?>,0.6)" stroke="black" stroke-width="1" />
        </svg>
    </body>
</html>