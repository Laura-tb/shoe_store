<!-- HISTORIAL DE PEDIDOS (Punto de entrada-->
<!--
- Comprueba que la sesión existe y que el rol es client.
- Llama al controlador de pedidos.
- No tiene HTML ni lógica de negocio. 
-->

<?php
require __DIR__ . '/../app/helpers/session.php';
requireRole('client');

require __DIR__ . '/../app/config/db.php'; 
require __DIR__ . '/../app/controllers/OrderController.php';


?>