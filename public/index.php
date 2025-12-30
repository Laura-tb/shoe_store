<!--  http://localhost/clases_desarrollo_servidor/trabajo_enfoque/public/index.php -->
<?php
require __DIR__ . '/../app/helpers/session.php';
startSession();

// Cargar conexión y modelo (ajusta las rutas si no coinciden)
require __DIR__ . '/../app/config/db.php';
require __DIR__ . '/../app/controllers/IndexController.php';

IndexController::index($db);
?>

