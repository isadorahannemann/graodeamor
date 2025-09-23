<?php
namespace generic;

class Controller {

    protected function render(string $viewPath, array $vars = []) {
        extract($vars, EXTR_SKIP);
        include $viewPath;
    }
}
