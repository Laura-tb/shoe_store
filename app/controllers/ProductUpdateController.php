<!-- CONTROLADOR -->

<?php
require __DIR__ . '/../config/db.php';
require __DIR__ . '/../models/ProductModel.php';

$id_product = intval($_GET['id_product'] ?? 0);

if ($id_product <= 0) {
    header("Location: admin_products.php");
    exit;
}

//POST: actualiza en BD y redirige al listado.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $image_product    = trim($_POST['image_product'] ?? '');
    $name_product     = trim($_POST['name_product'] ?? '');
    $price_product  = trim($_POST['price_product'] ?? '');
    $stock_product = trim($_POST['stock_product'] ?? '');

    ProductModel::update($db, $id_product, $image_product, $name_product, $price_product, $stock_product);

    header("Location: admin_products.php");
    exit;
}

//GET: carga el producto y muestra formulario.
$products = ProductModel::getById($db, $id_product);
if (!$products) {
    header('Location: admin_products.php');
    exit;
}

$mode = "";

require __DIR__ . '/../views/ProductUpdateView.php';
