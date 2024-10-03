<!DOCTYPE html>
<html>
    <head><title>Ej 14</title></head>
    <body>
        <h1>AVANCE DE LA FICHA</h1>
        <p>Actualice la página para mostrar una nueva tirada.</p>

        <?php
            $var = rand(1, 6);
        ?>

        <img src="../img/dados/<?php echo $var; ?>.svg" alt="Dado: <?php echo $var; ?>">
        
        <svg width="300" height="100">
            <rect x="0" y="20" width="50" height="50" fill="lightgray" stroke="black" />
            <text x="25" y="50" font-size="20" text-anchor="middle" fill="gray">1</text>

            <rect x="50" y="20" width="50" height="50" fill="lightgray" stroke="black" />
            <text x="75" y="50" font-size="20" text-anchor="middle" fill="gray">2</text>

            <rect x="100" y="20" width="50" height="50" fill="lightgray" stroke="black" />
            <text x="125" y="50" font-size="20" text-anchor="middle" fill="gray">3</text>

            <rect x="150" y="20" width="50" height="50" fill="lightgray" stroke="black" />
            <text x="175" y="50" font-size="20" text-anchor="middle" fill="gray">4</text>

            <rect x="200" y="20" width="50" height="50" fill="lightgray" stroke="black" />
            <text x="225" y="50" font-size="20" text-anchor="middle" fill="gray">5</text>

            <rect x="250" y="20" width="50" height="50" fill="lightgray" stroke="black" />
            <text x="275" y="50" font-size="20" text-anchor="middle" fill="gray">6</text>

            <?php if ($var == 1): ?>
                <circle cx="25" cy="45" r="15" fill="red" />
            <?php elseif ($var == 2): ?>
                <circle cx="75" cy="45" r="15" fill="red" />
            <?php elseif ($var == 3): ?>
                <circle cx="125" cy="45" r="15" fill="red" />
            <?php elseif ($var == 4): ?>
                <circle cx="175" cy="45" r="15" fill="red" />
            <?php elseif ($var == 5): ?>
                <circle cx="225" cy="45" r="15" fill="red" />
            <?php else: ?>
                <circle cx="275" cy="45" r="15" fill="red" />
            <?php endif; ?>
        </svg>
    </body>
</html>