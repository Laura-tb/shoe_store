<?php
require __DIR__ . '/../config/db.php';
require __DIR__ . '/../models/UserModel.php';

$users = UserModel::getAll($db);
echo "hola";
//print_r($users);

require __DIR__ . '/../views/UserView.php';
?>
