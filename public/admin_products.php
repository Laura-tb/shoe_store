<!-- http://localhost/trabajo_enfoque/public/admin_products.php -->
<!-- LISTADO DE PRODUCTOS (Punto de entrada-->
<!--
- Comprueba que la sesión existe y que el rol es admin.
- Llama al controlador de productos.
- No tiene HTML ni lógica de negocio. 
-->

<?php

require __DIR__ . '/../app/helpers/session.php';
requireRole('admin');

require __DIR__ . '/../app/controllers/ProductController.php';

?>
