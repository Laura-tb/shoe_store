<!-- VISTA DE FORMULARIO DE EDICIÓN -->

<!DOCTYPE html>

<html lang="es">

<?php
$title = "Edición de Productos";
include('layout/head.php');
?>


<body>
    <div class="page login">
        <?php
        include('layout/navigation.php');
        ?>

        <main>
            <section class="hero">
                <div class="container">
                    <section class="card">

                        <h1 class="title"><?= $mode === 'create' ? 'Crear producto' : 'Editar producto' ?></h1>

                        <form method="POST" id="product-form">

                            <div class="field">
                                <label>Imagen:
                                    <input id="image_product" type="file" name="image_product" value="<?= $products['image_product'] ?>">
                                    <span class="error" id="nameError"></span>
                                </label>
                            </div>
                            <div class="field">
                                <label>Nombre:
                                    <input id="name_product" type="text" name="name_product" value="<?= $products['name_product'] ?>">
                                    <span class="error" id="nameError"></span>
                                </label>
                            </div>

                            <div class="field">
                                <label>Precio:
                                    <input id="price_product" type="text" name="price_product" value="<?= $products['price_product'] ?>">
                                    <span class="error" id="nameError"></span>
                                </label>
                            </div>

                            <div class="field">
                                <label>Stock:
                                    <input id="stock_product" type="text" name="stock_product" value="<?= $products['stock_product'] ?>">
                                    <span class="error" id="nameError"></span>
                                </label>
                            </div>

                            <button class="btn btn-primary btn-lg" type="submit">
                                <?= $mode === 'create' ? 'Crear' : 'Guardar cambios' ?>
                            </button>
                        </form>
                    </section>
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