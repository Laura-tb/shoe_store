<!-- PUNTO DE ENTRADA GESTOR PARA ADMIN-->
<?php 

//Sesión y control de acceso
require __DIR__ . '/../app/helpers/session.php';
requireRole('admin');

//Redirige a la vista
require __DIR__ . '/../app/views/AdminView.php';
?>
