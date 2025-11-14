<?php

// Inicia sesión si no está iniciada
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

// Comprueba si hay sesión iniciada
function isLoggedIn()
{
    startSession();
    return isset($_SESSION['user_id']);
}

// Devuelve true si el usuario es admin
function isAdmin()
{
    startSession();
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

// Obliga a estar logueado
function requireLogin()
{
    if (!isLoggedIn()) {
        header('Location: /clases_desarrollo_servidor/trabajo_enfoque/frontend/login.html?e=auth');
        exit;
    }
}

// Obliga a ser admin
function requireAdmin()
{
    if (!isAdmin()) {
        header('Location: /clases_desarrollo_servidor/trabajo_enfoque/frontend/index.html?e=denied');
        exit;
    } 
}

// Logout
function logout()
{
    startSession();
    $_SESSION = [];
    session_destroy();
}
