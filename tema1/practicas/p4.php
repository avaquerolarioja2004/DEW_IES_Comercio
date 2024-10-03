<?php
$sexo='H';
$peso=95;
$altura=1.87;
$altura=$altura ** $altura;
$imc=$peso / $altura;

if($sexo=='H'){
    if($imc<20){
        echo 'Falta de peso';
    }elseif($imc<25 & $imc>20){
        echo 'Peso normal';
    }elseif($imc>26 & $imc<30){
        echo 'Sobre peso';
    }elseif($imc>31 & $imc<40){
        echo 'Obesidad';
    }else{
        echo 'Fuerte Obesidad';
    }
}elseif($sexo=='M'){
    if($imc<19){
        echo 'Falta de peso';
    }elseif($imc<24 & $imc>19){
        echo 'Peso normal';
    }elseif($imc>25 & $imc<30){
        echo 'Sobre peso';
    }elseif($imc>31 & $imc<40){
        echo 'Obesidad';
    }else{
        echo 'Fuerte Obesidad';
    }
}else{
    echo 'Indefinido';
}
echo "\nImc: " . $imc;
?>