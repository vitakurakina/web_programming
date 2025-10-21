<?php
spl_autoload_register();

use MVC\Controllers\Controller;
require_once __DIR__ . '/mvc/views/MarkdownView.php';


$mdController = new Controller('users.md');

echo "<pre>";
echo $mdController->render();
echo "</pre>";
