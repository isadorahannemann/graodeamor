<?php
namespace dao\mysql;


use generic\MysqlSingleton;
use PDO;

class DoadorDAO implements \dao\IDoadorDAO {
    private $db;

    public function __construct() {
        $this->db = MysqlSingleton::getInstance();
    }

    public function listar() {
        $stmt = $this->db->query("SELECT * FROM doadores ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function salvar(array $dados) {
        // Verificar se o email já existe
        if ($this->findByEmail($dados['email'])) {
            throw new \Exception("Email já cadastrado.");
        }
        $sql = "INSERT INTO doadores (nome, email, password) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $dados['nome'] ?? null,
            $dados['email'] ?? null,
            $dados['password'] ?? null
        ]);
    }

    public function obterPorId(int $id) {
        $stmt = $this->db->prepare("SELECT * FROM doadores WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar(array $dados) {
        $sql = "UPDATE doadores SET nome = ?, email = ?, password = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $dados['nome'] ?? null,
            $dados['email'] ?? null,
            $dados['password'] ?? null,
            $dados['id']
        ]);
    }

    public function deletar(int $id) {
        $stmt = $this->db->prepare("DELETE FROM doadores WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function findByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM doadores WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
