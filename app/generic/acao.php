<?php
namespace generic;

/**
 * Classe utilitária para executar uma ação de controller.
 * Uso: Acao::run('Doacao', 'listar');
 */
class Acao {
    public static function run(string $controller, string $action) {
        $class = "controller\\" . ucfirst($controller);
        if (!class_exists($class)) {
            throw new \Exception("Controller {$class} não encontrado.");
        }
        $obj = new $class();
        if (!method_exists($obj, $action)) {
            throw new \Exception("Ação {$action} não encontrada no controller {$class}.");
        }
        return $obj->$action();
    }
}
