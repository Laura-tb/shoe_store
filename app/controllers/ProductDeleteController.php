<?php
require __DIR__ . '/../config/db.php';
require __DIR__ . '/../models/ProductModel.php';

$id_product = intval($_GET['id_product'] ?? 0);

if ($id_product > 0) {
    ProductModel::delete($db, $id_product);
}

header("Location: admin_products.php");
exit;
?>
