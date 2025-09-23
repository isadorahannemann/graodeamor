<?php
namespace generic;

/**
 * Controller base com helper render para views.
 * Outros controllers podem extender se quiserem.
 */
class Controller {
    /**
     * Renderiza uma view (caminho relativo a raiz do app).
     * @param string $viewPath ex: "public/doacao/listar.php"
     * @param array $vars variáveis para extrair na view
     */
    protected function render(string $viewPath, array $vars = []) {
        extract($vars, EXTR_SKIP);
        include $viewPath;
    }
}
