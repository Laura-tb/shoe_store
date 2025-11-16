<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$cfgFile = __DIR__ . '/config.local.php';
if (!file_exists($cfgFile)) {
    die('Falta config.local.php');
}
require $cfgFile;


$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$db->set_charset('utf8mb4');

//->Añadido nuevo 14.11.25
if ($db->connect_errno) {
    die('Error de conexión: ' . $db->connect_error);
}

return $db;
//<-Añadido nuevo 14.11.25
?>