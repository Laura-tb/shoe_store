<?php
require __DIR__ . '/session.php';

logout();

header('Location: /clases_desarrollo_servidor/trabajo_enfoque/public/index.html?logout=1');
exit;