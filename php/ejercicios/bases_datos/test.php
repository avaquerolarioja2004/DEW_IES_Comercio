<?php
$host = 'localhost';
$dbname = 'pruebas';
$username = 'root';
$password = 'mysql';

try {
    // Crear una nueva instancia de PDO
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
    $pdo = new PDO($dsn, $username, $password);

    // Configurar atributos de PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $datos = $pdo->query('SELECT *  FROM t1');
    echo "Conexión exitosa";
} catch (PDOException $e) {
    // Manejar errores de conexión
    echo "Error de conexión: " . $e->getMessage();
}


// Ya se ha terminado; se cierra
$datos = null;
$pdo = null;
?>
// Select all data from a table
<?php
try {
    $dsn = "mysql:host=localhost;dbname=pruebas;charset=utf8";
    $pdo = new PDO($dsn, 'root', 'mysql');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Ejecutar una consulta SELECT
    $sql = "SELECT * FROM t1";
    $stmt = $pdo->query($sql);

    /*
    Si voy a utilizar parámetros en la consulta, debo usar prepare() en lugar de query().
    Y tendremos que vincular los parámetros con bindParam() o bindValue().
    // Ejecutar una consulta SELECT con parámetros
    $sql = "SELECT * FROM t1 WHERE nombre = :nombre";
    $stmt = $pdo->prepare($sql);

    // Vincular el parámetro :nombre
    $nombre = 'angel';
    $stmt->bindParam(':nombre', $nombre);
    // Ejecutar la consulta
    $stmt->execute();
    */


    // Obtener todos los resultados
    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Mostrar los resultados
    foreach ($contacts as $contact) {
        echo $contact['nombre'] . " - " . $contact['apellido'] . ' - ' .$contact['edad'] . "<br>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
// Insertar un nuevo contacto
<?php
try {
    $dsn = "mysql:host=localhost;dbname=pruebas;charset=utf8";
    $pdo = new PDO($dsn, 'root', 'mysql');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO t1 (id,nombre, apellido, edad) VALUES (:id , :nombre, :apellido, :edad)";
    $stmt = $pdo->prepare($sql);

    // Vincular los parámetros
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellido', $apellido);
    $stmt->bindParam(':edad', $edad);

    // Asignar valores a los parámetros
    $id = 3;
    $nombre = 'pedro';
    $apellido = 'martinez';
    $edad = '35';

    // Ejecutar la sentencia
    $stmt->execute();

    echo "Contacto añadido exitosamente";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
// Actualizar un contacto
<?php
try {
    $dsn = "mysql:host=localhost;dbname=pruebas;charset=utf8";
    $pdo = new PDO($dsn, 'root', 'mysql');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE t1 SET nombre = :nombre, apellido = :apellido, edad = :edad WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    // Vincular los parámetros
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellido', $apellido);
    $stmt->bindParam(':edad', $edad);
    $stmt->bindParam(':id', $id);

    // Asignar valores a los parámetros
    $nombre = 'carlos';
    $email = 'ceniceros';
    $edad = '19';
    $id = 3;

    // Ejecutar la sentencia
    $stmt->execute();

    echo "Contacto actualizado exitosamente";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
// Eliminar un contacto
<?php
try {
    $dsn = "mysql:host=localhost;dbname=pruebas;charset=utf8";
    $pdo = new PDO($dsn, 'root', 'mysql');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "DELETE FROM t1 WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    // Vincular el parámetro
    $stmt->bindParam(':id', $id);

    // Asignar valor al parámetro
    $id = 3;

    // Ejecutar la sentencia
    $stmt->execute();

    echo "Contacto eliminado exitosamente";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>