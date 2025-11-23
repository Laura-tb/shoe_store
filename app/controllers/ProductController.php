<!--CONTROLADOR -->
<!-- 
- Carga la conexión BD (db.php).
- Carga el modelo ProductModel.
- Pide al modelo todos los productos (getAll).
- Guarda el resultado en $products.
- Carga la vista ProductView.php, que usará $products.
-->

<?php
require __DIR__ . '/../config/db.php';
require __DIR__ . '/../models/ProductModel.php';

$products = ProductModel::getAll($db);

require __DIR__ . '/../views/ProductView.php';
?>
