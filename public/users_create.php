<!-- PUNTO DE ENTRADA CREAR USUARIO-->
<?php
//Sesión y control de acceso
require __DIR__ . '/../app/helpers/session.php';
requireRole('admin');

//Inicia conexión a BD
require __DIR__ . '/../app/config/db.php'; 
//Carga el controlador
require __DIR__ . '/../app/controllers/UserCreateController.php';

?>
