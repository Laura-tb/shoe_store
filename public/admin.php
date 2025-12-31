<!-- PUNTO DE ENTRADA GESTOR PARA ADMIN-->
<?php 

require __DIR__ . '/../app/helpers/session.php';
requireRole('admin');

require __DIR__ . '/../app/views/AdminView.php';
?>
