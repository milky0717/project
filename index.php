<?php
session_start();

require_once 'config/config.php';
require_once 'app/core/Database.php';

spl_autoload_register(function ($className) {
    $paths = ['app/controllers/', 'app/models/'];
    foreach ($paths as $path) {
        $file = $path . $className . '.php';
        if (file_exists($file)) {
            require_once $file;
        }
    }
});

$controller = isset($_GET['controller']) ? ucfirst($_GET['controller']) . 'Controller' : 'EvaluationController';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

if (class_exists($controller) && method_exists($controller, $action)) {
    $instance = new $controller();
    $instance->$action();
} else {
    echo "ページが見つかりません。";
}
