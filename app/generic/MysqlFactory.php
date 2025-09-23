<?php
namespace generic;

use PDO;
use PDOException;

class MysqlFactory {
    public static function create(array $config = []): PDO {
        $host = $config['host'] ?? '127.0.0.1';
        $dbname = $config['dbname'] ?? 'doacoes';
        $user = $config['user'] ?? 'root';
        $pass = $config['pass'] ?? '';
        $port = $config['port'] ?? 3306;

        $dsn = "mysql:host={$host};port={$port};dbname={$dbname};charset=utf8mb4";

        try {
            $pdo = new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
            return $pdo;
        } catch (PDOException $e) {
            throw new \Exception("Erro conexão DB: " . $e->getMessage());
        }
    }
}
