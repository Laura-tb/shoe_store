<!-- BASE DE DATOS -->
<?php
// Configura MySQLi para lanzar excepciones y mostrar errores graves
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

//InfinityFree
$isInfinityFree = isset($_SERVER['HTTP_HOST']) && (
  str_contains($_SERVER['HTTP_HOST'], 'infinityfreeapp.com') 
);

$cfgFile = __DIR__ . ($isInfinityFree ? '/config.prod.php' : '/config.local.php');

if (!file_exists($cfgFile)) {
  die('Falta ' . basename($cfgFile));
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