

<?php
require __DIR__ . '/../../app/helpers/session.php';

requireAdmin(); // Si no es admin, redirige y no llega aquí

echo "<h1>Zona solo ADMIN</h1>";
echo "<p>Si ves esto, eres admin.</p>";
