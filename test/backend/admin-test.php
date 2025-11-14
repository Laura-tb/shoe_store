<!--  http://localhost/clases_desarrollo_servidor/trabajo_enfoque/test/backend/admin-test.php -->

<?php
require __DIR__ . '/../../backend/src/session.php';

requireAdmin(); // Si no es admin, redirige y no llega aquí

echo "<h1>Zona solo ADMIN</h1>";
echo "<p>Si ves esto, eres admin.</p>";
