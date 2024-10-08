<!DOCTYPE html>
<html>
<?php
/*
contruye 3 arrays uno de ellos tendra 10 nums aleatorios entre el rango -50 y 100. no se pueden repetir.
el segundo array tendra **2 de los numeros obtenidos
el tercero contendra **3 de los numero obtenidos
mostrar los arrays en una tabla de  3 columnas con los titulos numero cuadrado y cubo
*/
$num1 = [];
$i = 0;
do {
    $numRand = rand(-50, 100);
    if (!in_array($numRand, $num1)) {
        $num1[$i] = $numRand;
    } else {
        continue;
    }
    $i++;
} while (count($num1) < 3);

function elevar($array, $valor)
{
    $newArray = [];
    foreach ($array as $value) {
        $newValue = $value ** $valor;
        $newArray[] = $newValue;
    }
    return $newArray;
}
$num2 = elevar($num1, 2);
$num3 = elevar($num1, 3);
$arrays = [$num1, $num2, $num3];
$tabla = '<table border="1"><tr><th>Número</th><th>Cuadrado</th><th>Cubo</th></tr>';
for ($i = 0; $i < 3; $i++) {
    $tabla .= '<tr>';
    for ($j = 0; $j < 3; $j++) {
        $tabla .= '<td>'.$arrays[$j][$i].'</td>';
    }
    $tabla .= '</tr>';
}
$tabla .= '</table>';
?>
<body>
    <p><?=$tabla?></p>
</body>
</html>