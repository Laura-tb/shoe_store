<?php

require __DIR__ . '/../app/helpers/session.php';
requireRole('client');

require __DIR__ . '/../app/config/db.php'; 
require __DIR__ . '/../app/controllers/CartController.php';

$cartController = new CartController($db);

// Gestionar acciones del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action    = $_POST['action'] ?? '';
    $productId = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;

    switch ($action) {
        case 'add':
            $cartController->add($productId);
            break;
        case 'update':
            $qty = (int)($_POST['qty'] ?? 1);
            $cartController->updateQty($productId, $qty);
            break;
        case 'remove':
            $cartController->remove($productId);
            break;
        case 'checkout':
            // pasamos el id de usuario al controlador
            $cartController->checkout((int)$_SESSION['user_id']);
            break;
    }

    header('Location: cart.php');
    exit;
}

$cartItems = $cartController->getCart();
$total     = $cartController->getTotal();

// Render vista
require __DIR__ . '/../app/views/CartView.php';

?>

