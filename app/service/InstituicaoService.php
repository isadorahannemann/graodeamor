<?php
namespace service;

use dao\mysql\InstituicaoDAO;

class InstituicaoService {
    private $dao;

    public function __construct() {
        $this->dao = new InstituicaoDAO();
    }

    public function listar() {
        return $this->dao->listar();
    }

    public function obterPorId($id) {
        return $this->dao->obterPorId((int)$id);
    }

    public function salvar(array $dados) {
        $dados['nome'] = trim($dados['nome'] ?? '');
        $dados['endereco'] = trim($dados['endereco'] ?? '');

        if (!empty($dados['id'])) {
            return $this->dao->atualizar($dados);
        }
        return $this->dao->salvar($dados);
    }

    public function deletar($id) {
        return $this->dao->deletar((int)$id);
    }
}
