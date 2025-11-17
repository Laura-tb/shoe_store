<!-- VISTA DE FORMULARIO DE EDICIÓN -->

<!DOCTYPE html>

<html lang="es">

<?php
$title = "Edición de Usuarios";
include('layout/head.php');
?>


<body>
    <div class="page admin_users">
        <?php
        include('layout/navigation.php');
        ?>

        <main>
            <section class="hero">
                <h1><?= $mode === 'create' ? 'Crear usuario' : 'Editar usuario' ?></h1>


                <div class="container">
                    <form method="POST">
                        <label>Nombre:
                            <input type="text" name="name" value="<?= $user['name'] ?>">
                        </label>

                        <label>Apellidos:
                            <input type="text" name="surname" value="<?= $user['surname'] ?>">
                        </label>

                        <label>Email:
                            <input type="email" name="email" value="<?= $user['email'] ?>">
                        </label>

                        <label>Contraseña:
                            <input type="text" name="pass_hash" value="<?= $user['pass_hash'] ?>">
                        </label>

                        <label>Rol:
                            <select name="role">
                                <option value="client" <?= $user['role'] === 'client' ? 'selected' : '' ?>>Cliente</option>
                                <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                            </select>
                        </label>

                        <button type="submit">
                            <?= $mode === 'create' ? 'Crear' : 'Guardar cambios' ?>
                        </button>
                    </form>

                </div>
            </section>
        </main>


        <?php
        include('layout/footer.php');
        ?>
    </div>
</body>

</html>