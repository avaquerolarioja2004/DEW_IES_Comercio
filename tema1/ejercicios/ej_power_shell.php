<?php
$netstat_output = shell_exec("netstat -ano");

$lines = explode("\n", $netstat_output);

foreach ($lines as $line) {
    $line_splited = preg_split('/\s+/', trim($line));

    $pid = trim($line_splited[count($line_splited)-1]);

    echo implode(" ", $line_splited);

    if (is_numeric($pid)) {
        $pid_info = shell_exec('powershell -Command get-Process -Id '.$pid.' -FileVersionInfo');

        if (trim($pid_info)) {
            echo "\n   Proceso: " . trim($pid_info);
        } else {
            echo "\n   Proceso no encontrado para el PID: $pid";
        }
    }

    echo "\n\n";
}
?>
