<?php
namespace dao;

interface IInstituicaoDAO {
    public function listar();
    public function salvar(array $dados);
    public function obterPorId(int $id);
    public function atualizar(array $dados);
    public function deletar(int $id);
}
