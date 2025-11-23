<!-- CONTROLADOR -->

<?php
require __DIR__ . '/../config/db.php';
require __DIR__ . '/../models/ProductModel.php';

// Si se envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $image_product    = trim($_POST['image_product'] ?? '');
    $name_product     = trim($_POST['name_product'] ?? '');
    $price_product  = trim($_POST['price_product'] ?? '');
    $stock_product = trim($_POST['stock_product'] ?? '');

    // Crear usuario
    ProductModel::create($db, $image_product, $name_product, $price_product, $stock_product);

    header('Location: admin_products.php?registered=1');
    exit;
}

// Modo creación → $product vacío
$products = [
    'id_product'        => null,
    'image_product'     => '',
    'name_product'      => '',
    'price_product'   => '',
    'stock_product' => ''
];

$mode = "create";

require __DIR__ . '/../views/ProductUpdateView.php';
