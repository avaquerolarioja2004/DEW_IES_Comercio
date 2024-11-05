<?php
define('USER_FILE_PATH', __DIR__ . '/../data/usuarios.bin');
define('ADMIN_FILE_PATH', __DIR__ . '/../data/administradores.txt');

define('USERNAME_MIN_LENGTH', 2);
define('USERNAME_MAX_LENGTH', 30);
define('USERNAME_REGEX', '/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/');

define('MAX_PHOTO_SIZE', 1048576);
?>
