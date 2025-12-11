<?php
require __DIR__ . '/../config/db.php';
require __DIR__ . '/../models/ProductModel.php';

$id_product = intval($_GET['id_product'] ?? 0);

if ($id_product > 0) {

    try {
        ProductModel::delete($db, $id_product);
    } catch (mysqli_sql_exception $e) {
        // Error de clave foránea → producto usado en pedidos
        if ($e->getCode() === 1451) {  
            header("Location: admin_products.php?e=product_used");
            exit;
        }

        // Cualquier otro error de BD
        header("Location: admin_products.php?e=error");
        exit;
    }
}

header("Location: admin_products.php?deleted=1");
exit;
