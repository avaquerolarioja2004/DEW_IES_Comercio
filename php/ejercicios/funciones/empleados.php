<!DOCTYPE html>
<html>

<body>
    <?php
    include '../../tools/funcionesEmpleado.php';
    $listaEmpleados = [];
    for ($i = 0; $i < 20; $i++) {
        $letras = range('A', 'Z');
        $nombreAleatorio = $letras[array_rand($letras)] . '.' . $letras[array_rand($letras)];
        $edadAleatoria = rand(18, 65);
        crearEmpleado($listaEmpleados, $nombreAleatorio, $edadAleatoria);
    }
    echo getEmpleado($listaEmpleados, 0);
    echo '<br>';
    echo '<br>';
    mostrarEmpleados($listaEmpleados);
    echo '<br>';echo '<br>';
    $nuevaListaOrdenadaPorEdad=getEmpleadosOrderByEdad($listaEmpleados);
    mostrarEmpleados($nuevaListaOrdenadaPorEdad);
    echo '<br>';echo '<br>';
    modificarEmpleadoNombre($listaEmpleados, 1, 'Alfonso');
    echo getEmpleado($listaEmpleados, 1);
    echo '<br>';echo '<br>';
    modificarEmpleadoEdad($listaEmpleados, 2, 150);
    echo getEmpleado($listaEmpleados, 2);
    echo '<br>';echo '<br>';
    mostrarEmpleados($listaEmpleados);

    ?>
</body>

</html>