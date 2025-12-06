<?php
require __DIR__ . '/../app/helpers/session.php';
requireRole('client');
?>

<!DOCTYPE html>
<html lang="es">

<?php
$title = "Gracias por tu compra";
include('../app/views/layout/head.php');
?>

<body class="thankyou">
    <div class="page">
        <?php include('../app/views/layout/navigation.php'); ?>

        <main class="thankyou-main">
            <section class="hero">
                <div class="container">

                    <div class="thankyou-wrapper">
                        <div class="thankyou-card">
                            <h1 class="thankyou-title">¡Gracias por tu compra!</h1>
                            <p class="thankyou-subtitle">
                                Tu pedido ha sido procesado correctamente.
                            </p>

                            <a class="thankyou-btn" href="products.php">
                                Volver a la tienda
                            </a>
                        </div>
                    </div>

                </div>
            </section>

        </main>

        <?php include('../app/views/layout/footer.php'); ?>
    </div>
</body>

</html>