<!DOCTYPE html>
<html>
<?php
$lista='';
$ejercicios = [
    2 => [
        'descripcion' => 'Declaración de una clase y creación de un objeto.',
        'problema' => 'poo2.php',
    ],
    3 => [
        'descripcion' => 'Atributos de una clase.',
        'problema' => 'poo3.php',
    ],
    4 => [
        'descripcion' => 'Métodos de una clase.',
        'problema' => 'poo4.php',
    ],
    5 => [
        'descripcion' => 'Método constructor de una clase (__construct).',
        'problema' => 'poo5.php',
    ],
    6 => [
        'descripcion' => 'Llamada de métodos dentro de la clase.',
        'problema' => 'poo6.php',
    ],
    7 => [
        'descripcion' => 'Modificadores de acceso a atributos y métodos (public - private).',
        'problema' => 'poo7.php',
    ],
    8 => [
        'descripcion' => 'Colaboración de objetos.',
        'problema' => 'poo8.php',
    ],
    9 => [
        'descripcion' => 'Parámetros de tipo objeto.',
        'problema' => 'poo9.php',
    ],
    10 => [
        'descripcion' => 'Parámetros opcionales.',
        'problema' => 'poo10.php',
    ],
    11 => [
        'descripcion' => 'Herencia.',
        'problema' => 'poo11.php',
    ],
    12 => [
        'descripcion' => 'Modificadores de acceso a atributos y métodos (protected).',
        'problema' => 'poo12.php',
    ],
    13 => [
        'descripcion' => 'Sobreescritura de métodos.',
        'problema' => 'poo13.php',
    ],
    14 => [
        'descripcion' => 'Sobreescritura del constructor.',
        'problema' => 'poo14.php',
    ],
    15 => [
        'descripcion' => 'Clases abstractas y concretas.',
        'problema' => 'poo15.php',
    ],
    16 => [
        'descripcion' => 'Métodos abstractos.',
        'problema' => 'poo16.php',
    ],
    17 => [
        'descripcion' => 'Métodos y clases final.',
        'problema' => 'poo17.php',
    ],
    18 => [
        'descripcion' => 'Referencia y clonación de objetos.',
        'problema' => 'poo18.php',
    ],
    19 => [
        'descripcion' => 'Función __clone().',
        'problema' => 'poo19.php',
    ],
    20 => [
        'descripcion' => 'Operador instanceof.',
        'problema' => 'poo20.php',
    ],
    21 => [
        'descripcion' => 'Método destructor de una clase (__destruct).',
        'problema' => 'poo21.php',
    ],
    22 => [
        'descripcion' => 'Métodos estáticos de una clase (static).',
        'problema' => 'poo22.php',
    ],
];
foreach ($ejercicios as $index=>$ejercicio) {
    $lista .= "<tr>
                        <td>$index</td>
                        <td>".$ejercicio['descripcion']."</td>
                        <td><a href='ejercicios/".$ejercicio['problema']."'>".$ejercicio['problema']."</a></td>
                   </tr>";
}
?>

<head>
    <title>Index de los ejercicios</title>
</head>

<body>
    <table border="1">
        <thead>
            <tr>
                <th>Orden del Concepto</th>
                <th>Descripción</th>
                <th>Problema Resuelto</th>
            </tr>
        </thead>
        <tbody>
            <?php echo $lista; ?>
        </tbody>
    </table>
</body>

</html>