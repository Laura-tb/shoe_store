<?php

require_once __DIR__ . '/../models/ProductModel.php';
require_once __DIR__ . '/../models/CartModel.php';

class CartController
{
    private mysqli $db;

    public function __construct(mysqli $db)
    {
        $this->db = $db;
    }

    /**
     * Añadir un producto al carrito
     */
    public function add(int $productId): void
    {
        $product = ProductModel::getById($this->db, $productId);

        if (!$product) {
            return;
        }

        //evitar añadir si no hay stock
        if ((int)$product['stock_product'] <= 0) {
            return;
        }

        if (!isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId] = ['qty' => 1];
        } else {
            $_SESSION['cart'][$productId]['qty']++;
        }
    }

    /**
     * Actualizar cantidad (+ / -)
     */
    public function updateQty(int $productId, int $qty): void
    {
        if (!isset($_SESSION['cart'][$productId])) {
            return;
        }

        if ($qty <= 0) {
            unset($_SESSION['cart'][$productId]);
            return;
        }

        $_SESSION['cart'][$productId]['qty'] = $qty;
    }

    /**
     * Eliminar un producto del carrito
     */
    public function remove(int $productId): void
    {
        unset($_SESSION['cart'][$productId]);
    }

    /**
     * Obtener información completa del carrito
     * (datos de sesión + datos reales de la BBDD)
     */
    public function getCart(): array
    {
        $items = [];

        if (empty($_SESSION['cart'])) {
            return $items;
        }

        foreach ($_SESSION['cart'] as $id => $item) {
            $product = ProductModel::getById($this->db, $id);

            if (!$product) {
                continue;
            }

            $items[] = [
                'id'    => $product['id_product'],
                'name'  => $product['name_product'],
                'img'   => $product['image_product'],
                'price' => (float)$product['price_product'],
                'qty'   => (int)$item['qty'],
            ];
        }

        return $items;
    }

    /**
     * Calcular total del carrito
     */
    public function getTotal(): float
    {
        $items = $this->getCart();
        $total = 0;

        foreach ($items as $i) {
            $total += $i['price'] * $i['qty'];
        }

        return $total;
    }

    /**
     * Checkout: insertar en DB (ORDERS + ORDER_ITEMS)
     */
    public function checkout(int $userId): bool
    {
        if (empty($_SESSION['cart'])) {
            return false;
        }

        $ok = CartModel::createOrder($this->db, $userId, $_SESSION['cart']);

        if ($ok) {
            $_SESSION['cart'] = [];
            header('Location: thankyou.php');
            exit;
        }

        return false;
    }
}
