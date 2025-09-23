<?php
namespace dao\mysql;


use generic\MysqlSingleton;
use PDO;

class DoacaoDAO implements \dao\IDoacaoDAO {
    private $db;

    public function __construct() {
        $this->db = MysqlSingleton::getInstance();
    }

    public function listar() {
        $sql = "SELECT doacoes.*, d.nome AS doador_nome, i.nome AS instituicao_nome
                FROM doacoes
                LEFT JOIN doadores d ON doacoes.doador_id = d.id
                LEFT JOIN instituicoes i ON doacoes.instituicao_id = i.id
                WHERE doacoes.status IS NULL OR doacoes.status != 'retirado'
                ORDER BY doacoes.data_doacao DESC, doacoes.id DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function salvar(array $dados) {
        $sql = "INSERT INTO doacoes (doador_id, instituicao_id, descricao, data_doacao, status) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $dados['doador_id'] ?: null,
            $dados['instituicao_id'] ?: null,
            $dados['descricao'] ?? '',
            $dados['data_doacao'] ?? date('Y-m-d'),
            $dados['status'] ?? 'Disponível'
        ]);
    }

    public function obterPorId(int $id) {
        $stmt = $this->db->prepare("SELECT doacoes.*, d.nome AS doador_nome, i.nome AS instituicao_nome FROM doacoes LEFT JOIN doadores d ON doacoes.doador_id = d.id LEFT JOIN instituicoes i ON doacoes.instituicao_id = i.id WHERE doacoes.id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar(array $dados) {
        $sql = "UPDATE doacoes SET doador_id = ?, instituicao_id = ?, descricao = ?, data_doacao = ?, status = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $dados['doador_id'] ?: null,
            $dados['instituicao_id'] ?: null,
            $dados['descricao'] ?? '',
            $dados['data_doacao'] ?? date('Y-m-d'),
            $dados['status'] ?? 'Disponível',
            $dados['id']
        ]);
    }

    public function deletar(int $id) {
        $stmt = $this->db->prepare("DELETE FROM doacoes WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function retirar(int $id) {
        $sql = "UPDATE doacoes SET status = 'retirado' WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
}
