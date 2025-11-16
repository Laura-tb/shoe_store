<!DOCTYPE html>

<html lang="es">

<?php
$title = "Gestión de Usuarios";
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
                    <table class="user-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>EMAIL</th>
                                <th>NOMBRE</th>
                                <th>APELLIDOS</th>
                                <th>CONTRASEÑA</th>
                                <th>ROL</th>
                                <th>FECHA CREACIÓN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $u) : ?>
                                <tr>
                                    <td><?= $u['id'] ?></td>
                                    <td><?= $u['email'] ?></td>
                                    <td><?= $u['name'] ?></td>
                                    <td><?= $u['surname'] ?></td>
                                    <td><?= $u['pass_hash'] ?></td>
                                    <td><?= $u['role'] ?></td>
                                    <td><?= $u['created_at'] ?></td>
                                    <td>
                                        <a href="update_users.php?id=<?= $u['id'] ?>">Editar</a>
                                        <a href="delete_users.php?id=<?= $u['id'] ?>" onclick="return confirm('¿Eliminar?');">Eliminar</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>



                </div>
            </section>
        </main>


        <?php
        include('layout/footer.php');
        ?>
    </div>
</body>

</html>