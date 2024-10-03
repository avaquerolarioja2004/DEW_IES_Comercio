<?php
// este script hace uso de variables númericas
    $var = 5; 
    /*  defino una variable númerica, esto es como en python.
        No es necesario el uso de tipos.
    */
    $var2=4;
    $res=$var * $var2;
    // así se concatena con echos, una forma dentro del texto y otra fuera del texto
    echo "Resultado de $var * $var2: ", $res, "\n";
    // así se concatena con print
    print "Resultado de otra forma: ". "$res";
?>