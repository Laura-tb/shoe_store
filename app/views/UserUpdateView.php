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
                <h1>Gestión de Usuarios</h1>
                <div>
                    <button>Crear usuario</button>
                </div>
                <div class="container">
                    <form method="POST">
                        <label>Nombre:
                            <input type="text" name="name" value="<?= $user['name'] ?>">
                        </label>

                        <label>Email:
                            <input type="email" name="email" value="<?= $user['email'] ?>">
                        </label>

                        <label>Rol:
                            <select name="role">
                                <option value="client" <?= $user['role'] === 'client' ? 'selected' : '' ?>>Cliente</option>
                                <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                            </select>
                        </label>

                        <button type="submit">Guardar cambios</button>
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