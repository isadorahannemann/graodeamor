<?php
namespace service;

use dao\mysql\DoadorDAO;

class DoadorService {
    private $dao;

    public function __construct() {
        $this->dao = new DoadorDAO();
    }

    public function listar() {
        return $this->dao->listar();
    }

    public function obterPorId($id) {
        return $this->dao->obterPorId((int)$id);
    }

    public function salvar(array $dados) {
        $dados['nome'] = trim($dados['nome'] ?? '');
        $dados['email'] = trim($dados['email'] ?? '');

        if (!empty($dados['password'])) {
            $dados['password'] = password_hash($dados['password'], PASSWORD_DEFAULT);
        }

        if (!empty($dados['id'])) {
            return $this->dao->atualizar($dados);
        }
        return $this->dao->salvar($dados);
    }

    public function deletar($id) {
        return $this->dao->deletar((int)$id);
    }

    public function findByEmail($email) {
        return $this->dao->findByEmail($email);
    }
}
