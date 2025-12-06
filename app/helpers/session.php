<?php

// Inicia sesión si no está iniciada. 
//PENDIENTE SACAR DE FUNCIÓN Y PONER AL PRINCIPIO DE SESSION.PHP
function startSession()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

// Crea la sesión cuando el login es correcto
function createUserSession($user)
{
    startSession();
    session_regenerate_id(true);

    $_SESSION['user_id']   = $user['id'];
    $_SESSION['role']      = $user['role'];
}

// Verifica que el usuario tenga el rol requerido. Si el rol en sesión no coincide, redirige al usuario a la página principal e impide continuar la ejecución.
function requireRole(string $role): void
{
    startSession();

    if ($_SESSION['role'] !== $role) {
        header('Location: /clases_desarrollo_servidor/trabajo_enfoque/public/index.php');
        exit;
    }
}

// Comprueba si la sesión está iniciada y, si existe el role en sesión, redirige al usuario a su página correspondiente según su rol (admin o client).
function isSessionInit()
{
    startSession();

    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] === 'admin') {
            header('Location: /clases_desarrollo_servidor/trabajo_enfoque/public/admin.php?e=auth');
            exit;
        } else if ($_SESSION['role'] === 'client') {
            header('Location: /clases_desarrollo_servidor/trabajo_enfoque/public/index.php?e=auth');
            exit;
        }
    }
}

// Logout
function logout()
{
    startSession();
    $_SESSION = [];
    session_destroy();
}

// TEST- Comprueba si hay sesión iniciada- TEST
function isLoggedIn()
{
    startSession();
    return isset($_SESSION['user_id']);
}

//Preparar sesión para el carrito

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];     
}