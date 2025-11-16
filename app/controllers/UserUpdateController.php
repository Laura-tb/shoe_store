<?php
require __DIR__ . '/../config/db.php';
require __DIR__ . '/../models/UserModel.php';

$id = intval($_GET['id'] ?? 0);

if ($id <= 0) {
    header("Location: admin_users.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['name'] ?? '');
    $surname = trim($_POST['surname'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $role    = trim($_POST['role'] ?? '');

    UserModel::update($db, $id, $name, $surname, $email, $role);

    header("Location: admin_users.php");
    exit;
}

// Si es GET, cargamos datos para mostrarlos en el formulario
$user = UserModel::getById($db, $id);
if (!$user) {
    header('Location: admin_users.php');
    exit;
}

require __DIR__ . '/../views/UserUpdateView.php';
