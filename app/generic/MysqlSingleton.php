<?php
namespace generic;

use PDO;

class MysqlSingleton {
    private static $instance;

    public static function getInstance() {
        if (!isset(self::$instance)) {
            $host = "localhost";
            $dbname = "graodeamor";  // <- nome do banco
            $user = "root";          // <- usuário do MySQL
            $pass = "";              // <- senha (no XAMPP normalmente é vazio)

            self::$instance = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }
}
