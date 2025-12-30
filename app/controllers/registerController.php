<?php

require_once __DIR__ . '/../models/UserModel.php';

class RegisterController
{
    public static function register(mysqli $db): void
    {

        // Si no es POST → mostrar formulario
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require __DIR__ . '/../views/RegisterView.php';
            return;
        }

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

        $user = UserModel::create($db, $email, $name, $surname, $pass, 'client');

        if ($user) {
            header('Location: /clases_desarrollo_servidor/trabajo_enfoque/public/login.php?registered=1');
            exit;
        }

        header('Location: /clases_desarrollo_servidor/trabajo_enfoque/public/register-start.php?e=dup');
        exit;

    }
}
