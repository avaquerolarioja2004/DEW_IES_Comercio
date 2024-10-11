<?php
$sistema = $_SERVER['HTTP_SEC_CH_UA_PLATFORM'];
if(str_contains($sistema, "Windows")){
    echo 'El sistema operativo es Windows';
}else{
    echo 'Otro';
}
echo "<br>";
echo $_SERVER['SERVER_PROTOCOL'];
echo "<br>";
echo $_SERVER['SERVER_NAME'];
?>