<?php
namespace dao;

interface IDoadorDAO {
    public function listar();
    public function salvar(array $dados);
    public function obterPorId(int $id);
    public function atualizar(array $dados);
    public function deletar(int $id);
}
