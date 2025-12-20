<!-- VISTA LISTADO -->
<!-- 
- Solo presentación (HTML).
- No hace consultas a BD ni redirecciones.
-->

<!DOCTYPE html>

<html lang="es">

<?php
$title = "Historial de pedidos";
include('layout/head.php');
?>


<body>
    <div class="page admin_products">
        <?php
        include('layout/navigation.php');
        ?>

        <main>
            <section class="hero">
                <a href="index.php">Volver</a>

                <h1>Historial de pedidos</h1>

                <div class="container">
                    <table class="table orders">
                        <thead>
                            <tr>
                                <th>FECHA CREACIÓN</th>
                                <th>Nº PEDIDO</th>
                                <th>TOTAL</th>
                                <th>DETALLE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($orders)) : ?>
                                <tr>
                                    <td colspan="4">No tienes pedidos todavía.</td>
                                </tr>
                            <?php else : ?>
                                <?php foreach ($orders as $o) : ?>
                                    <tr>
                                        <td><?= htmlspecialchars((new DateTime($o['created_at']))->format('d/m/Y')) ?></td>
                                        <td><?= htmlspecialchars((string)$o['id_order']) ?></td>
                                        <td><?= htmlspecialchars(number_format((float)$o['total'], 2, ',', '.')) ?>€</td>

                                        <td>
                                            <a href="orders.php?action=show&id=<?= (int)$o['id_order'] ?>">Mostrar</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>

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