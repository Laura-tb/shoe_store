<!-- PUNTO DE ENTRADA CONFIRMACIÓN DE PEDIDO-->
<?php
require __DIR__ . '/../app/helpers/session.php';
requireRole('client');

require __DIR__ . '/../app/config/db.php';
require __DIR__ . '/../app/controllers/ThankyouController.php';

ThankyouController::showOrder($db);
?>
