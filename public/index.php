<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require_once '../core/Database.php';
require_once '../core/Controller.php';
require_once '../core/Model.php';
require_once '../core/View.php';

$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '';
$url = filter_var($url, FILTER_SANITIZE_URL);
$url = explode('/', $url);

$controllerName = ucfirst($url[0] ?? 'Auth') . 'Controller';
$methodName = $url[1] ?? 'login';
$params = array_slice($url, 2);

if (file_exists('../controllers/' . $controllerName . '.php')) {
    require_once '../controllers/' . $controllerName . '.php';
    $controller = new $controllerName;
    if (method_exists($controller, $methodName)) {
        call_user_func_array([$controller, $methodName], $params);
    } else {
        echo "Method $methodName not found.";
    }
} else {
    echo "Controller $controllerName not found.";
}
?>
