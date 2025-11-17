<!-- http://localhost/trabajo_enfoque/public/admin_users.php -->
<!-- LISTADO DE USUARIOS (Punto de entrada-->
<!--
- Comprueba que la sesión existe y que el rol es admin.
- Llama al controlador de usuarios.
- No tiene HTML ni lógica de negocio. 
-->

<?php

require __DIR__ . '/../app/helpers/session.php';
requireRole('admin');

require __DIR__ . '/../app/controllers/UserController.php';

?>
