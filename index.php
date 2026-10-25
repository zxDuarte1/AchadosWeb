<?php
session_start();
require_once __DIR__ . '/app/controller/usuarioController.php';
$controller = new usuarioController();

$action = $_GET['action'] ?? 'index';
switch ($action) {

    case 'login':
        $controller->loginLocation();
        break;
    case 'autenticar':
        $controller->autenticar();
        break;
    case 'criarUsuario':
        $controller->criarUsuario();
    case 'register':
        $controller->registerLocation();
        break;
    case 'dashboard':
        $controller->dashboardLocation();
        break;
    case 'logout':
        $controller->logout();
        break;

    default:
        $controller->index();
        break;
}
?>