<!-- CONTROLADOR -->

<?php
require __DIR__ . '/../config/db.php';
require __DIR__ . '/../models/UserModel.php';

// Si se envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email'] ?? '');
    $name     = trim($_POST['name'] ?? '');
    $surname  = trim($_POST['surname'] ?? '');
    $pass_hash = trim($_POST['pass_hash'] ?? '');
    $role     = trim($_POST['role'] ?? '');

    UserModel::create($db, $email, $name, $surname, $pass_hash, $role);

    header('Location: admin_users.php');
    exit;
}

// Modo creación → $user vacío
$user = [
    'id'        => null,
    'email'     => '',
    'name'      => '',
    'surname'   => '',
    'pass_hash' => '',
    'role'      => 'client'
];

$mode = "create";

require __DIR__ . '/../views/UserUpdateView.php';
