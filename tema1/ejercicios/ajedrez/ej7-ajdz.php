<!DOCTYPE html>
<html>
    <head>
        <title>Ej Ajedrez</title>
        <link rel="stylesheet" href="./ajedrez.css">
    </head>
    <?php
    $letras=array('a','b','c','d','e','f','g','h');
        echo '<table border="1">';
        for($i=8;$i>=1;$i--){
            echo '<tr>';
            echo '<td class=>'.$i.'</td>';
            for($j=8;$j>=1;$j--) {
                
                if(($j+$i)%2!=0){
                    //impar
                    echo '<td class="impar"></td>';
                }else{
                    //par
                    echo '<td class="par"></td>';
                }
            }
            
            echo '</tr>';
            if($i==1){
                echo '<td></td>';
                for($k=0;$k<8;$k++){
                    $var=strtoupper($letras[$k]);
                    echo '<td>'.$var.'</td>';
                }
            }
        }
        echo '</table>';
    ?>
</html>