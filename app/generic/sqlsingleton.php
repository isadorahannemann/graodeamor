<?php
namespace generic;

use PDO;

class MysqlSingleton {
    private static $instance;

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new PDO("mysql:host=localhost;dbname=doacoes", "root", "");
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }
}
