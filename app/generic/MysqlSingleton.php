<?php
namespace generic;

use PDO;

class MysqlSingleton {
    private static $instance;

    public static function getInstance() {
        if (!isset(self::$instance)) {
            $host = "localhost";
            $dbname = "graodeamor";  
            $user = "root";          
            $pass = "";              

            self::$instance = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }
}
