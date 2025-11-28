<?php

$logged = isset($_SESSION['user_id']);
?>

<header class="site-header">
    <div class="container">
        <div class="header-bar">
            <div class="brand">
                <div class="brand-icon" aria-hidden="true">
                    <!--IMAGEN DEL LOGO-->
                    <!--<svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                        <path
                            d="M44 11.2727C44 14.0109 39.8386 16.3957 33.69 17.6364C39.8386 18.877 44 21.2618 44 24C44 26.7382 39.8386 29.123 33.69 30.3636C39.8386 31.6043 44 33.9891 44 36.7273C44 40.7439 35.0457 44 24 44C12.9543 44 4 40.7439 4 36.7273C4 33.9891 8.16144 31.6043 14.31 30.3636C8.16144 29.123 4 26.7382 4 24C4 21.2618 8.16144 18.877 14.31 17.6364C8.16144 16.3957 4 14.0109 4 11.2727C4 7.25611 12.9543 4 24 4C35.0457 4 44 7.25611 44 11.2727Z" />
                    </svg>-->
                </div>
                <h1 class="brand-name">ZAPATILLAS</h1>
            </div>

            <nav class="main-nav" aria-label="Principal">
                <a href="index.php">Inicio</a>
                <a href="products.php">Productos</a>
            </nav>

            <div class="header-actions">
                <?php if ($logged): ?>
                    <!--<button class="btn btn-primary btn-lg" onclick="window.location.href='../app/helpers/logout.php'">-->
                    <button class="btn btn-light btn-lg"
                        onclick="window.location.href='cart.php'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-bag"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6.331 8h11.339a2 2 0 0 1 1.977 2.304l-1.255 8.152a3 3 0 0 1 -2.966 2.544h-6.852a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304z" /><path d="M9 11v-5a3 3 0 0 1 6 0v5" /></svg>
                    </button>
                    <button class="btn btn-primary btn-lg"
                        onclick="window.location.href='<?= "../app/helpers/logout.php" ?>'">
                        Cerrar Sesión</button>

                <?php else: ?>
                    <button class="btn btn-primary btn-lg" onclick="window.location.href='register-start.php'">Registrarse</button>
                    <button class="btn btn-light btn-lg" onclick="window.location.href='login.php'">Iniciar Sesión</button>
                <?php endif; ?>


            </div>
        </div>
    </div>
</header>