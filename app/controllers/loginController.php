<!-- http://localhost/clases_desarrollo_servidor/trabajo_enfoque/backend/public/login.php -->


<?php

require __DIR__ . '/../config/db.php';
require __DIR__ . '/../helpers/session.php';


$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$pass  = $_POST['password'] ?? '';

if (!$email || $pass === '') {
    header('Location: /clases_desarrollo_servidor/trabajo_enfoque/public/login.html?e=val');
    exit;
}

$stmt = $mysqli->prepare(
    'SELECT id, role, pass_hash FROM users WHERE email = ? LIMIT 1'
);
$stmt->bind_param('s', $email);
$stmt->execute();
$res  = $stmt->get_result();
$user = $res->fetch_assoc();
$stmt->close();

if ($user && $pass === $user['pass_hash']) {
    // Credenciales correctas
    createUserSession($user);

    if ($user['role'] === 'admin') {
        header('Location: /clases_desarrollo_servidor/trabajo_enfoque/public/admin.php');
    } else {
        header('Location: /clases_desarrollo_servidor/trabajo_enfoque/public/products.php');
    }
    exit;
} else {
    // Email o contraseña incorrectos
    header('Location: /clases_desarrollo_servidor/trabajo_enfoque/public/login.html?e=cred');
    exit;
}


?>