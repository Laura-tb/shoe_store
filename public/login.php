<!-- PUNTO DE ENTRADA LOGIN -->
<?php
require __DIR__ . '/../app/helpers/session.php';
isSessionInit();

require __DIR__ . '/../app/config/db.php';
require __DIR__ . '/../app/controllers/LoginController.php';

LoginController::login($db);
