<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$cfgFile = __DIR__ . '/../config/config.local.php';
if (!file_exists($cfgFile)) {
    die('Falta config.local.php');
}
require $cfgFile;

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$mysqli->set_charset('utf8mb4');

//->Añadido nuevo 14.11.25
if ($mysqli->connect_errno) {
    die('Error de conexión: ' . $mysqli->connect_error);
}

return $mysqli;
//<-Añadido nuevo 14.11.25
?>