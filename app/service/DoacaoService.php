<?php
namespace service;

use dao\mysql\DoacaoDAO;

class DoacaoService {
    private $dao;

    public function __construct() {
        $this->dao = new DoacaoDAO();
    }

    public function listar() {
        return $this->dao->listar();
    }

    public function obterPorId($id) {
        $doacao = $this->dao->obterPorId((int)$id);
        return $doacao;
    }

    public function salvar(array $dados) {
        // limpar/normalizar dados básicos
        $dados['descricao'] = trim($dados['descricao'] ?? '');
        $dados['data_doacao'] = $dados['data_doacao'] ?? date('Y-m-d');
        $dados['status'] = $dados['status'] ?? 'Disponível';

        if (!empty($dados['id'])) {
            return $this->dao->atualizar($dados);
        }
        return $this->dao->salvar($dados);
    }

    public function deletar($id) {
        return $this->dao->deletar((int)$id);
    }

    public function retirar($id) {
        return $this->dao->retirar((int)$id);
    }
}
