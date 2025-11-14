<?php
require __DIR__ . '/../src/session.php';

logout();

header('Location: /clases_desarrollo_servidor/trabajo_enfoque/frontend/index.html?logout=1');
exit;