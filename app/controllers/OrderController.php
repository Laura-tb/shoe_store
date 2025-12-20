<!--CONTROLADOR -->
<!-- 
- Carga la conexión BD (db.php).
- Carga el modelo OrderModel.
- Pide al modelo todos los pedidos del usuario (getByUserId).
- Guarda el resultado en $orders.
- Carga la vista OrderView.php, que usará $orders.
-->

<?php
require __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../models/OrderModel.php';


class OrderController
{
    public static function index(int $userId): array
    {
        global $db;
        return OrderModel::getByUserId($db, $userId) ?? [];
    }

    public static function show(int $userId, int $orderId): array
    {
        global $db;

        $order = OrderModel::getOrderByIdAndUserId($db, $orderId, $userId);
        if (!$order) {
            // puedes redirigir o lanzar error
            header('Location: orders.php');
            exit;
        }

        $items = OrderModel::getItemsImg($db, $orderId);

        return ['order' => $order, 'items' => $items];
    }
}
?>