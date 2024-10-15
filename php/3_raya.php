<?php
session_start();

// Inicializar el tablero si no existe
if (!isset($_SESSION['board'])) {
    $_SESSION['board'] = array_fill(0, 9, '');
    $_SESSION['current_player'] = 'X'; // X comienza
}

// Manejo del clic en una celda
if (isset($_POST['cell'])) {
    $cell = (int)$_POST['cell'];
    
    // Si la celda está vacía, hacer el movimiento
    if ($_SESSION['board'][$cell] == '') {
        $_SESSION['board'][$cell] = $_SESSION['current_player'];
        
        // Cambiar el turno al otro jugador
        $_SESSION['current_player'] = $_SESSION['current_player'] == 'X' ? 'O' : 'X';
    }
}

// Función para dibujar el tablero
function draw_board() {
    $board = $_SESSION['board'];
    
    echo '<svg width="300" height="300">';
    
    // Dibujar las líneas del tablero
    echo '<line x1="100" y1="0" x2="100" y2="300" stroke="black" stroke-width="2"/>';
    echo '<line x1="200" y1="0" x2="200" y2="300" stroke="black" stroke-width="2"/>';
    echo '<line x1="0" y1="100" x2="300" y2="100" stroke="black" stroke-width="2"/>';
    echo '<line x1="0" y1="200" x2="300" y2="200" stroke="black" stroke-width="2"/>';

    // Dibujar las X y O en las celdas
    for ($i = 0; $i < 9; $i++) {
        $x = ($i % 3) * 100;
        $y = floor($i / 3) * 100;

        if ($board[$i] == 'X') {
            // Dibujar X
            echo '<line x1="' . ($x + 10) . '" y1="' . ($y + 10) . '" x2="' . ($x + 90) . '" y2="' . ($y + 90) . '" stroke="red" stroke-width="4"/>';
            echo '<line x1="' . ($x + 90) . '" y1="' . ($y + 10) . '" x2="' . ($x + 10) . '" y2="' . ($y + 90) . '" stroke="red" stroke-width="4"/>';
        } elseif ($board[$i] == 'O') {
            // Dibujar O
            echo '<circle cx="' . ($x + 50) . '" cy="' . ($y + 50) . '" r="40" stroke="blue" stroke-width="4" fill="none"/>';
        }

        // Dibujar los cuadros clicables
        echo '<rect x="' . $x . '" y="' . $y . '" width="100" height="100" fill="transparent" onclick="makeMove(' . $i . ')"/>';
    }

    echo '</svg>';
}

// Función para verificar el ganador
function check_winner() {
    $board = $_SESSION['board'];
    $winning_combinations = [
        [0, 1, 2], [3, 4, 5], [6, 7, 8], // Filas
        [0, 3, 6], [1, 4, 7], [2, 5, 8], // Columnas
        [0, 4, 8], [2, 4, 6]             // Diagonales
    ];

    foreach ($winning_combinations as $combo) {
        if ($board[$combo[0]] !== '' && $board[$combo[0]] === $board[$combo[1]] && $board[$combo[1]] === $board[$combo[2]]) {
            return $board[$combo[0]]; // Retorna el ganador (X o O)
        }
    }

    // Verificar si hay empate
    if (!in_array('', $board)) {
        return 'Draw';
    }

    return null;
}

$winner = check_winner();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tres en Raya</title>
    <script>
        function makeMove(cell) {
            document.getElementById('cell').value = cell;
            document.getElementById('gameForm').submit();
        }
    </script>
</head>
<body>

<h1>Tres en Raya</h1>

<!-- Mostrar el ganador si lo hay -->
<?php if ($winner): ?>
    <h2>Ganador: <?php echo $winner; ?></h2>
    <form method="post">
        <button type="submit" name="reset">Reiniciar juego</button>
    </form>
    <?php
    // Reiniciar el juego si se ha presionado el botón de reinicio
    if (isset($_POST['reset'])) {
        session_destroy();
        header("Location: " . $_SERVER['PHP_SELF']);
    }
    ?>
<?php else: ?>
    <h2>Turno de: <?php echo $_SESSION['current_player']; ?></h2>
    <form id="gameForm" method="post">
        <input type="hidden" name="cell" id="cell">
    </form>

    <?php draw_board(); ?>

<?php endif; ?>

</body>
</html>
