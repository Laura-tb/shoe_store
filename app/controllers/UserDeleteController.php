<?php
require __DIR__ . '/../config/db.php';
require __DIR__ . '/../models/UserModel.php';

$id = intval($_GET['id'] ?? 0);

if ($id > 0) {
    UserModel::delete($db, $id);
}

header("Location: admin_users.php");
exit;
?>
