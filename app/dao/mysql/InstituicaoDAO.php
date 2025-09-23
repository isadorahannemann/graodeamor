<?php
namespace dao\mysql;


use generic\MysqlSingleton;
use PDO;

class InstituicaoDAO implements \dao\IInstituicaoDAO {
    private $db;

    public function __construct() {
        $this->db = MysqlSingleton::getInstance();
    }

    public function listar() {
        $stmt = $this->db->query("SELECT * FROM instituicoes ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function salvar(array $dados) {
        // Verificar se o email já existe
        if ($this->findByEmail($dados['email'])) {
            throw new \Exception("Email já cadastrado.");
        }
        $sql = "INSERT INTO instituicoes (nome, endereco, email, password) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $dados['nome'] ?? null,
            $dados['endereco'] ?? null,
            $dados['email'] ?? null,
            $dados['password'] ?? null
        ]);
    }

    public function obterPorId(int $id) {
        $stmt = $this->db->prepare("SELECT * FROM instituicoes WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar(array $dados) {
        $sql = "UPDATE instituicoes SET nome = ?, endereco = ?, email = ?, password = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $dados['nome'] ?? null,
            $dados['endereco'] ?? null,
            $dados['email'] ?? null,
            $dados['password'] ?? null,
            $dados['id']
        ]);
    }

    public function deletar(int $id) {
        $stmt = $this->db->prepare("DELETE FROM instituicoes WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function findByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM instituicoes WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
