<?php

require_once __DIR__ . '/../models/OrderModel.php';

class ThankyouController
{
    public static function showOrder(mysqli $db): void
    {
        $orderId = $_SESSION['last_order_id'] ?? null;

        if (!$orderId) {
            header('Location: /clases_desarrollo_servidor/trabajo_enfoque/public/index.php');
            exit;
        }

        $order = OrderModel::getById($db, (int)$orderId);
        $items = OrderModel::getItems($db, (int)$orderId);

        require __DIR__ . '/../views/ThankyouView.php';
    }
}

