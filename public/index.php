<!--  http://localhost/clases_desarrollo_servidor/trabajo_enfoque/public/index.php -->
<?php 
require __DIR__ . '/../app/helpers/session.php';
startSession();
?>


<!DOCTYPE html>
<html lang="es">

<?php
$title = "Index";
include('../app/views/layout/head.php');
?>

<body>
    <div class="page">
        <?php

        include('../app/views/layout/navigation.php');
        ?>

        <main>
            <section class="hero">
                <div class="container">
                    <div class="hero-card"
                        data-alt="Persona con zapatillas modernas en movimiento sobre fondo urbano.">
                        <div class="hero-text">
                            <h2 class="hero-title">Define Tu Próximo Paso</h2>
                            <p class="hero-subtitle">
                                Descubre los últimos lanzamientos de las mejores marcas. Estilo que impulsa.
                            </p>
                        </div>
                        <div class="hero-cta">
                            <button class="btn btn-primary btn-lg" onclick="window.location.href='register-start.php'">Registrarse</button>
                            <button class="btn btn-light btn-lg" onclick="window.location.href='login.php'">Iniciar Sesión</button>
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