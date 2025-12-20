<!-- HISTORIAL DE PEDIDOS (Punto de entrada-->
<!--
- Comprueba que la sesión existe y que el rol es client.
- Llama al controlador de pedidos.
- No tiene HTML ni lógica de negocio. 
-->

<?php
require __DIR__ . '/../app/helpers/session.php';
requireRole('client');

require __DIR__ . '/../app/controllers/OrderController.php';

$userId = $_SESSION['user_id'];
$action  = $_GET['action'] ?? 'index';

if ($action === 'show') {
    $orderId = (int)($_GET['id'] ?? 0);
    $data = OrderController::show($userId, $orderId); 
    $order = $data['order'];
    $items = $data['items'];
    require __DIR__ . '/../app/views/OrderDetailView.php';
    exit;
}

$orders = OrderController::index($userId);
require __DIR__ . '/../app/views/OrderView.php';


?>