<!--CONTROLADOR -->
<!-- 
- Carga la conexión BD (db.php).
- Carga el modelo UserModel.
- Pide al modelo todos los usuarios (getAll).
- Guarda el resultado en $users.
- Carga la vista UserView.php, que usará $users.
-->

<?php
require __DIR__ . '/../config/db.php';
require __DIR__ . '/../models/UserModel.php';

$users = UserModel::getAll($db);

require __DIR__ . '/../views/UserView.php';
?>
