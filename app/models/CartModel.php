<?php

class CartModel
{
    /**
     * Crea la orden en ORDERS y sus líneas en ORDER_ITEMS
     */
    public static function createOrder(mysqli $db, int $userId, array $cart): bool
    {
        if (empty($cart)) {
            return false;
        }

        $db->begin_transaction();

        try {
            // 1) Calcular total y obtener precios actualizados
            $total = 0;
            $productsData = [];

            $stmtProduct = $db->prepare(
                'SELECT id_product, price_product FROM products WHERE id_product = ?'
            );

            foreach ($cart as $productId => $item) {
                $stmtProduct->bind_param('i', $productId);
                $stmtProduct->execute();
                $res = $stmtProduct->get_result();
                $product = $res->fetch_assoc();

                if (!$product) {
                    continue;
                }

                $qty   = (int)$item['qty'];
                $price = (float)$product['price_product'];

                $productsData[] = [
                    'id'    => $productId,
                    'qty'   => $qty,
                    'price' => $price,
                ];

                $total += $price * $qty;
            }

            $stmtProduct->close();

            if (empty($productsData)) {
                $db->rollback();
                return false;
            }

            // 2) Insertar en ORDERS
            $stmtOrder = $db->prepare(
                'INSERT INTO orders (user_id, total, created_at)
                 VALUES (?, ?, NOW())'
            );
            $stmtOrder->bind_param('id', $userId, $total);
            $stmtOrder->execute();
            $orderId = $db->insert_id;
            $stmtOrder->close();

            // 3) Insertar líneas en ORDER_ITEMS
            $stmtItem = $db->prepare(
                'INSERT INTO order_items
                    (order_id, product_id, qty_order_items, unit_price_order_items)
                 VALUES (?, ?, ?, ?)'
            );

            // preparar update de stock
            $stmtStock = $db->prepare(
                'UPDATE products
                 SET stock_product = stock_product - ?
                 WHERE id_product = ?'
            );

            foreach ($productsData as $p) {
                // línea pedido
                $stmtItem->bind_param(
                    'iiid',
                    $orderId,
                    $p['id'],
                    $p['qty'],
                    $p['price']
                );
                $stmtItem->execute();

                // actualizar stock
                $stmtStock->bind_param(
                    'ii',
                    $p['qty'],
                    $p['id']
                );
                $stmtStock->execute();
            }

            $stmtItem->close();
            $stmtStock->close();

            $db->commit();
            return true;
        } catch (Throwable $e) {
            $db->rollback();
            return false;
        }
    }
}
