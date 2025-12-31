<!-- BASE DE DATOS -->
<?php
// Configura MySQLi para lanzar excepciones y mostrar errores graves
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$cfgFile = __DIR__ . '/config.local.php';

if (!file_exists($cfgFile)) {
    die('Falta config.local.php');
}
require $cfgFile;

// Crea la conexión a la base de datos MySQL
$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$db->set_charset('utf8mb4');

if ($db->connect_errno) {
    die('Error de conexión: ' . $db->connect_error);
}
// Devuelve la conexión para su uso en otros archivos
return $db;
?>