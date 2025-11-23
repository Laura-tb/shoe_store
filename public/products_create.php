<!-- CREAR PRODUCTOS (Punto de entrada) -->
<!-- http://localhost/trabajo_enfoque/public/products_create.php -->
<!--
- Protege la página por rol admin.
- Llama al controlador de crear.
-->
<?php

require __DIR__ . '/../app/helpers/session.php';
requireRole('admin');

require __DIR__ . '/../app/controllers/ProductCreateController.php';

?>
