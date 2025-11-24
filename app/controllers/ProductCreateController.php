<!-- CONTROLADOR -->

<?php
require __DIR__ . '/../config/db.php';
require __DIR__ . '/../models/ProductModel.php';

// Si se envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //$image_product    = trim($_POST['image_product'] ?? '');
    $name_product     = trim($_POST['name_product'] ?? '');

    $price_raw  = str_replace(',', '.', $_POST['price_product'] ?? '0'); //Convertir coma a punto
    $price_product = number_format((float)$price_raw, 2, '.', ''); //Convertir a float y mantener 2 decimales
    
    $stock_product = (int)($_POST['stock_product'] ?? 0);

    // Crear producto
    //ProductModel::create($db, $image_product, $name_product, $price_product, $stock_product);

    // Crear producto sin imagen
    $id = ProductModel::create($db, $name_product, $price_product, $stock_product);

    if (!$id) {
        exit('Error al crear producto');
    }

    // Procesar imagen 
    if (
        !empty($_FILES['image_product']['tmp_name']) &&
        $_FILES['image_product']['error'] === UPLOAD_ERR_OK
    ) {

        $tmpPath  = $_FILES['image_product']['tmp_name'];
        $origName = $_FILES['image_product']['name'];

        $ext = strtolower(pathinfo($origName, PATHINFO_EXTENSION)); 

        $fileName = $id . '.' . $ext;   
        $destPath = __DIR__ . '/../../public/img/' . $fileName;

        if (move_uploaded_file($tmpPath, $destPath)) {
            ProductModel::updateImage($db, $id, $fileName);
        }
    }

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
