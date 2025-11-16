<?php 
require __DIR__ . '/../app/helpers/session.php';
startSession();
?>

<!doctype html>
<html lang="es">

<?php
$title = "Registro";
include('../app/views/layout/head.php');
?>

<body>
    <div class="page login">
        <?php
        include('../app/views/layout/navigation.php');
        ?>

        <main>
            <section class="hero">
                <div class="container">
                    <section class="card">
                        <h1 class="title">Registro</h1>


                        <form method="post" action="/clases_desarrollo_servidor/trabajo_enfoque/app/controllers/registerController.php" autocomplete="off" novalidate>
                            <div class="field">
                                <label for="email">Email</label>
                                <input id="email" name="email" type="email" placeholder="tuemail@email.com" required />
                            </div>

                            <div class="field">
                                <label for="name">Nombre</label>
                                <input id="name" name="name" type="text" placeholder="Tu nombre" required />
                            </div>

                            <div class="field">
                                <label for="surname">Apellidos</label>
                                <input id="surname" name="surname" type="text" placeholder="Tus apellidos" required />
                            </div>

                            <div class="field">
                                <label for="password">Contraseña</label>
                                <div class="password">
                                    <input id="password" name="password" type="password" placeholder="••••••••"
                                        title="Mínimo 8 caracteres con al menos una letra minúscula, una mayúscula, un carácter especial y un número."
                                        required />
                                </div>
                            </div>

                            <button class="btn btn-primary btn-lg" type="submit">Crear cuenta</button>
                        </form>

                        <p class="link-wrap">
                            <a href="login.php" class="link">Ya tengo cuenta</a>
                        </p>


                    </section>
                </div>
            </section>
        </main>

        <?php
        include('../app/views/layout/footer.php');
        ?>
    </div>

    <script src="js/app.js"></script>
</body>

</html>