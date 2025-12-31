<!-- PUNTO DE ENTRADA REGISTRO-->
<?php
require __DIR__ . '/../app/helpers/session.php';
startSession();

require __DIR__ . '/../app/config/db.php';
require __DIR__ . '/../app/controllers/RegisterController.php';

RegisterController::register($db);
?>
