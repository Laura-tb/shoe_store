<!-- PUNTO DE ENTRADA HOME-->
<?php
//Sesión y control de acceso
require __DIR__ . '/../app/helpers/session.php';
startSession();

//Inicia conexión a BD
require __DIR__ . '/../app/config/db.php';
//Carga el controlador
require __DIR__ . '/../app/controllers/IndexController.php';

IndexController::index($db);
?>

