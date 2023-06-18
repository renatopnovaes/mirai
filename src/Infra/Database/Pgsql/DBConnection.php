<?php
namespace Infra\Database\Pgsql;

require_once dirname(dirname(dirname(dirname(__DIR__)))) . "/config/autoload.php";

class DBConnection
{
    private static ?\PDO $instance = null;
    private function __construct() {
        $host = $_ENV['DB_HOST'];
        $database = $_ENV['DB_NAME'];
        $username = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASSWORD'];       

        $dsn = "pgsql:host=$host;dbname=$database";
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            self::$instance = new \PDO($dsn, $username, $password, $options);
        } catch (\PDOException $e) {
            die("Erro ao conectar com o banco de dados: " . $e->getMessage());
        }
    }

    public static function getInstance(): \PDO
    {
        if (self::$instance instanceof \PDO) {
            return self::$instance;
        }

        $dbConnect = new self();
        return $dbConnect::getInstance();
    }
}