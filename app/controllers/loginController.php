<!-- http://localhost/clases_desarrollo_servidor/trabajo_enfoque/backend/public/login.php -->


<?php
require_once __DIR__ . '/../models/UserModel.php';

class LoginController
{
    public static function login(mysqli $db): void
    {

        // Si no es POST → mostrar formulario
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require __DIR__ . '/../views/LoginView.php';
            return;
        }

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $pass  = $_POST['password'] ?? '';

        if (!$email || $pass === '') {
            header('Location: /clases_desarrollo_servidor/trabajo_enfoque/public/login.php?e=val');
            exit;
        }

        $user = UserModel::getByEmail($db, $email);

        if ($user && $pass === $user['pass_hash']) {
            // Credenciales correctas
            createUserSession($user);

            if ($user['role'] === 'admin') {
                header('Location: /clases_desarrollo_servidor/trabajo_enfoque/public/admin.php');
            } else {
                header('Location: /clases_desarrollo_servidor/trabajo_enfoque/public/index.php');
            }
            exit;
        } else {
            // Email o contraseña incorrectos
            header('Location: /clases_desarrollo_servidor/trabajo_enfoque/public/login.php?e=cred');
            exit;
        }
    }
}

?>