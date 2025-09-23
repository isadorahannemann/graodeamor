<?php
require_once "generic/Autoload.php";

$controller = $_GET['controller'] ?? 'Doacao';
$action = $_GET['action'] ?? 'listar';

$class = "controller\\" . ucfirst($controller);
$obj = new $class();
$obj->$action();
