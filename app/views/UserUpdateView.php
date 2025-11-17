<!-- VISTA DE FORMULARIO DE EDICIÓN -->

<!DOCTYPE html>

<html lang="es">

<?php
$title = "Edición de Usuarios";
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

                        <h1 class="title"><?= $mode === 'create' ? 'Crear usuario' : 'Editar usuario' ?></h1>

                        <form method="POST">
                            <div class="field">
                                <label>Nombre:
                                    <input type="text" name="name" value="<?= $user['name'] ?>">
                                </label>
                            </div>

                            <div class="field">
                                <label>Apellidos:
                                    <input type="text" name="surname" value="<?= $user['surname'] ?>">
                                </label>
                            </div>

                            <div class="field">
                                <label>Email:
                                    <input type="email" name="email" value="<?= $user['email'] ?>">
                                </label>
                            </div>

                            <div class="field">
                                <label>Contraseña:
                                    <input type="text" name="pass_hash" value="<?= $user['pass_hash'] ?>">
                                </label>
                            </div>

                            <div class="field">
                                <label>Rol:
                                    <select name="role">
                                        <option value="client" <?= $user['role'] === 'client' ? 'selected' : '' ?>>Cliente</option>
                                        <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                                    </select>
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
</body>

</html>