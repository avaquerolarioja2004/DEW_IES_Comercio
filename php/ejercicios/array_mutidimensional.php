<?php
$array1=[];
$array2=[$array1];
//declaración manual
$arrayManual=[
    [' ','*','*','*',' '],
    ['*',' ',' ',' ','*'],
    ['*',' ',' ',' ','*'],
    ['*','*','*','*','*'],
    ['*',' ',' ',' ','*'],
    ['*',' ',' ',' ','*'],
    ['*',' ',' ',' ','*'],
];

//creación
for ($i = 0; $i < 7; $i++) {
    for ($j = 0; $j < 5; $j++) {
        if (
            ($i != 0 & ($j == 0 | $j == 4)) ||
            ($i == 0 & $j != 0 & $j != 4) ||
            ($i == 3 & $j >= 0)
        ) {
            $array2[$i][$j]='*';
        } else {
            $array2[$i][$j]=' ';
        }
    }
}

//for
echo '<pre>';
for ($i=0; $i < 7; $i++) { 
    for ($j=0; $j < 5; $j++) { 
        echo $arrayManual[$i][$j];
    }
    echo "<br>";
}
echo '</pre>';

//foreach
echo '<pre>';
foreach($arrayManual as $linea){
    foreach ($linea as $value) {
        echo $value;
    }
    echo '<br>';
}
echo '</pre>';

//numeros
$numeros=[
    [1,2,3,4],
    [5,6,7,8],
    [9,10,11,12]
];
$tranformado=[[]];
for ($i=0; $i < 3; $i++) { 
    for ($j=0; $j < 4; $j++) { 
        $tranformado[$j][$i]=$numeros[$i][$j];
    }
}

echo '<pre>';
foreach($tranformado as $linea){
    foreach ($linea as $value) {
        echo $value;
    }
    echo '<br>';
}
echo '</pre>';
?>