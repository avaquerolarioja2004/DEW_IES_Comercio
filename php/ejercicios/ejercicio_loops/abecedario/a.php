<?php
/*
    ***
   *   *
   *   *
   * * *
   *   *
   *   *
   *   *
*/
echo '<pre>';
for ($i = 0; $i < 7; $i++) {
    for ($j = 0; $j < 5; $j++) {
        if (
            ($i != 0 & ($j == 0 | $j == 4)) ||
            ($i == 0 & $j != 0 & $j != 4) ||
            ($i == 3 & $j >= 0)
        ) {
            echo '*';
        } else {
            echo ' ';
        }
    }
    echo '<br>';
}
echo '</pre>';
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A</title>
</head>

<body>
</body>

</html>