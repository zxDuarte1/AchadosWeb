<?php
session_start();
require_once __DIR__ . '/app/controller/usuarioController.php';
$controller = new usuarioController();

$action = $_GET['action'] ?? 'index';
switch ($action) {

    case 'login':
        $controller->login();
        break;
    case 'autenticar':
        $controller->autenticar();
        break;
    case 'register':
        $controller->register();
        break;
    case 'dashboard':
        $controller->dashboard();
        break;
    case 'logout':
        $controller->logout();
        break;

    default:
        $controller->index();
        break;
}
?>