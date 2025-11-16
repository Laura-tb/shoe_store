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

        <main>
            <section class="hero">
                <div class="container">

                    <div class="hero-text">
                        <p>
                            Selecciona una opción para comenzar a gestionar
                        </p>
                    </div>
                    <!-- Option cards -->
                    <div class="options-card">
                        <div class="card">
                            <a href="admin_users.php">
                                <div>
                                    <span class="material-symbols-outlined text-3xl">group</span>
                                </div>
                                <div>
                                    <p>Gestión de Usuarios</p>
                                    <p>Visualiza, crea, edita y elimina las cuentas de los usuarios.</p>
                                </div>
                            </a>
                        </div>
                        <div class="card">
                            <a href="#">
                                <div>
                                    <span class="material-symbols-outlined text-3xl">store</span>
                                </div>
                                <div>
                                    <p>Gestión de Productos</p>
                                    <p>Añade nuevas zapatillas, actualiza el stock, los precios y los detalles del
                                        producto.
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </section>
        </main>


        <?php
        include('../app/views/layout/footer.php');
        ?>
    </div>
</body>

</html>