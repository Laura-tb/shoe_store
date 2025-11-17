<!-- CONTROLADOR -->

<?php
require __DIR__ . '/../config/db.php';
require __DIR__ . '/../models/UserModel.php';

$id = intval($_GET['id'] ?? 0);

if ($id <= 0) {
    header("Location: admin_users.php");
    exit;
}

//POST: actualiza en BD y redirige al listado.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['name'] ?? '');
    $surname = trim($_POST['surname'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $pass_hash   = trim($_POST['pass_hash'] ?? '');
    $role    = trim($_POST['role'] ?? '');

    UserModel::update($db, $id, $name, $surname, $email, $pass_hash, $role);

    header("Location: admin_users.php");
    exit;
}

//GET: carga el usuario y muestra formulario.
$user = UserModel::getById($db, $id);
if (!$user) {
    header('Location: admin_users.php');
    exit;
}

$mode = "";

require __DIR__ . '/../views/UserUpdateView.php';
