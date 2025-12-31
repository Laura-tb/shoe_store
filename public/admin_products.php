<!-- PUNTO DE ENTRADA GESTOR DE PRODUCTOS -->

<?php

require __DIR__ . '/../app/helpers/session.php';
requireRole('admin');

require __DIR__ . '/../app/config/db.php'; 
require __DIR__ . '/../app/controllers/ProductController.php';

?>
