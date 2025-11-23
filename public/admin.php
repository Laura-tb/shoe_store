<?php 

require __DIR__ . '/../app/helpers/session.php';
requireRole('admin');

?>

<!DOCTYPE html>

<html lang="es">

<?php
$title = "Administrador";
include('../app/views/layout/head.php');
?>


<body>
    <div class="page admin">
        <?php
        include('../app/views/layout/navigation.php');
        ?>

        <main class="admin-main">
            <section class="admin-panel">               

                    <div class="admin-header-text">
                        <p>
                            Selecciona una opción para comenzar a gestionar
                        </p>
                    </div>

                    <!-- Cards -->
                    <div class="admin-grid">
                        <article class="card">
                            <a href="admin_users.php">
                                <div class="admin-card-icon">
                                    <span class="material-symbols-outlined text-3xl">group</span>
                                </div>
                                <div class="admin-card-body">
                                    <h2>Gestión de Usuarios</h2>
                                    <p>Visualiza, crea, edita y elimina las cuentas de los usuarios.</p>
                                </div>
                            </a>
                        </article>

                        <article class="card">
                            <a href="admin_products.php">
                                <div class="admin-card-icon">
                                    <span class="material-symbols-outlined text-3xl">store</span>
                                </div>
                                <div class="admin-card-body">
                                    <h2>Gestión de Productos</h2>
                                    <p>Añade nuevas zapatillas, actualiza el stock, los precios y los detalles del
                                        producto.
                                    </p>
                                </div>
                            </a>
                        </article>
                    </div>

                
            </section>
        </main>


        <?php
        include('../app/views/layout/footer.php');
        ?>
    </div>
</body>

</html>