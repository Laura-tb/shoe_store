<!-- EDICIÓN DE PRODUCTOS (Punto de entrada) -->
<!-- http://localhost/trabajo_enfoque/public/products_update.php -->
<!--
- Protege la página por rol admin.
- Llama al controlador de edición.
-->
<?php

require __DIR__ . '/../app/helpers/session.php';
requireRole('admin');

require __DIR__ . '/../app/controllers/ProductUpdateController.php';

?>
