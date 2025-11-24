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

    //Recupera producto actual 
    $product = ProductModel::getById($db, $id_product);
    if (!$product) {
        header('Location: admin_products.php');
        exit;
    }

    //$image_product    = trim($_POST['image_product'] ?? '');
    $name_product     = trim($_POST['name_product'] ?? '');

    $price_raw = str_replace(',', '.', $_POST['price_product'] ?? '0');
    $price_product = number_format((float)$price_raw, 2, '.', '');

    $stock_product = (int)($_POST['stock_product'] ?? 0);

    // Imagen: mantener la actual si no se sube nada
    $image_product = $product['image_product'];

    // ¿Se ha subido una nueva imagen?
    if (
        !empty($_FILES['image_product']['tmp_name']) &&
        $_FILES['image_product']['error'] === UPLOAD_ERR_OK
    ) {

        // Borrar la antigua si existe
        if (!empty($product['image_product'])) {
            $oldPath = __DIR__ . '/../../public/img/' . $product['image_product'];
            if (is_file($oldPath)) {
                unlink($oldPath);
            }
        }

        // Guardar la nueva
        $tmpPath  = $_FILES['image_product']['tmp_name'];
        $origName = $_FILES['image_product']['name'];
        $ext = strtolower(pathinfo($origName, PATHINFO_EXTENSION));

        // Nombre basado en id
        $fileName = $id_product . '.' . $ext;
        $destPath = __DIR__ . '/../../public/img/' . $fileName;

        if (move_uploaded_file($tmpPath, $destPath)) {
            $image_product = $fileName;
        }
    }

    // Actualizar en BD
    ProductModel::update($db, $id_product, $image_product, $name_product, $price_product, $stock_product);

    header("Location: admin_products.php");
    exit;
}

// GET: carga el producto y muestra formulario.
$products = ProductModel::getById($db, $id_product);
if (!$products) {
    header('Location: admin_products.php');
    exit;
}

$mode = "";

require __DIR__ . '/../views/ProductUpdateView.php';
