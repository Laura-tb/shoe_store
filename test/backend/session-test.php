

<?php
require __DIR__ . '/../../app/helpers/session.php';

startSession();

echo '<pre>';
echo "¿Hay sesión iniciada? " . (isLoggedIn() ? 'SÍ' : 'NO') . "\n";
echo "Rol: " . ($_SESSION['role'] ?? 'SIN ROL') . "\n";
echo "user_id: " . ($_SESSION['user_id'] ?? 'NULL') . "\n";
echo "</pre>";
