<?php
require __DIR__ . '/../config/db.php';

$email   = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$name    = trim($_POST['name'] ?? '');
$surname = trim($_POST['surname'] ?? '');
$pass    = $_POST['password'] ?? '';

//Validar datos
$pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/';

if (!$email || !$name || !$surname) {
    header('Location: /clases_desarrollo_servidor/trabajo_enfoque/public/register-start.php?e=val');
    exit;
}
if (!preg_match($pattern, $pass)) {
    header('Location: /clases_desarrollo_servidor/trabajo_enfoque/public/register-start.php?e=pass');
    exit;
}

// Inserta en texto plano (solo para desarrollo)
$stmt = $db->prepare('INSERT INTO users (email, name, surname, pass_hash) VALUES (?, ?, ?, ?)');
$stmt->bind_param('ssss', $email, $name, $surname, $pass);

try {
    $stmt->execute();
    $stmt->close();
    header('Location: /clases_desarrollo_servidor/trabajo_enfoque/public/login.php?registered=1');
    exit;
} catch (mysqli_sql_exception $ex) {
    $stmt->close();
    if ((int)$ex->getCode() === 1062) {
        header('Location: /clases_desarrollo_servidor/trabajo_enfoque/public/register-start.php?e=dup');
    } else {
        header('Location: /clases_desarrollo_servidor/trabajo_enfoque/public/register-start.php?e=err');
    }
    exit;
}
