<!-- VISTA LISTADO -->
<!-- 
- Solo presentación (HTML + uso de $products).
- No hace consultas a BD ni redirecciones.
--> 

<!DOCTYPE html>

<html lang="es">

<?php
$title = "Gestión de Productos";
include('layout/head.php');
?>


<body>
    <div class="page admin_products">
        <?php
        include('layout/navigation.php');
        ?>

        <main>
            <section class="hero">
                <a href="admin.php">Volver</a>

                <h1>Gestión de Productos</h1>
                <div>
                    <a href="products_create.php">Crear producto</a>
                </div>
                <div class="container">
                    <table class="user-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>IMAGEN</th>
                                <th>NOMBRE</th>
                                <th>PRECIO</th>
                                <th>STOCK</th>
                                <th>FECHA CREACIÓN</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $p) : ?>
                                <tr>
                                    <td><?= $p['id_product'] ?></td>
                                    <td><?= $p['image_product'] ?></td>
                                    <td><?= $p['name_product'] ?></td>
                                    <td><?= $p['price_product'] ?></td>
                                    <td><?= $p['stock_product'] ?></td>
                                    <td><?= $p['created_at'] ?></td>
                                    <td>
                                        <a href="products_update.php?id_product=<?= $p['id_product'] ?>">Editar</a>
                                        <a href="products_delete.php?id_product=<?= $p['id_product'] ?>" onclick="return confirm('¿Eliminar?');">Eliminar</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </section>
        </main>


        <?php
        include('layout/footer.php');
        ?>
    </div>
    <script src="js/app.js"></script>
</body>

</html>