<!-- PUNTO DE ENTRADA GESTIÓN DE USUARIOS -->

<?php

require __DIR__ . '/../app/helpers/session.php';
requireRole('admin');

require __DIR__ . '/../app/config/db.php'; 
require __DIR__ . '/../app/controllers/UserController.php';

?>
