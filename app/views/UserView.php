<!-- VISTA LISTADO -->
<!-- 
- Solo presentación (HTML + uso de $users).
- No hace consultas a BD ni redirecciones.
--> 

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
                <a href="admin.php">Volver</a>

                <h1>Gestión de Usuarios</h1>
                <div>
                    <a href="users_create.php">Crear usuario</a>
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
                                <th>ACCIONES</th>
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
                                        <a href="users_update.php?id=<?= $u['id'] ?>">Editar</a>
                                        <a href="users_delete.php?id=<?= $u['id'] ?>" onclick="return confirm('¿Eliminar?');">Eliminar</a>
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
    <script src="js/app.js"></script>
</body>

</html>