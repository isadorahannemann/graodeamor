<?php
require_once "generic/Autoload.php";

session_start();

$controller = $_GET['controller'] ?? 'Auth';
$action = $_GET['action'] ?? 'login';

if (!isset($_SESSION['user_id']) && $controller !== 'Auth') {
    header("Location: index.php?controller=Auth&action=login");
    exit;
}


if (isset($_SESSION['user_id'])) {
    $userType = $_SESSION['user_type'] ?? '';

    if ($controller === 'Instituicao' && $userType !== 'instituicao') {
        header("Location: index.php?controller=Auth&action=login");
        exit;
    }

    if ($controller === 'Doador' && $userType !== 'doador') {
        header("Location: index.php?controller=Auth&action=login");
        exit;
    }
}

$class = "controller\\" . ucfirst($controller);
$obj = new $class();
$obj->$action();
