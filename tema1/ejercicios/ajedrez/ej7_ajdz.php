<!DOCTYPE html>
<html>

<head>
    <title>Ej Ajedrez</title>
    <link rel="stylesheet" href="./ajedrez.css">
</head>
<?php
echo '<table border="1">';
for ($i = 8; $i >= 1; $i--) {
    echo '<tr>';
    echo '<td class="side">' . $i . '</td>';
    for ($j = 8; $j >= 1; $j--) {

        if (($j + $i) % 2 != 0) {
            //impar
            echo '<td class="impar"></td>';
        } else {
            //par
            echo '<td class="par"></td>';
        }
    }

    echo '</tr>';
    if ($i == 1) {
        echo '<td></td>';
        foreach (range('A', 'H') as $letra) {
            echo '<td class="side">' . $letra . '</td>';
        }
    }
}
echo '</table>';
?>

</html>