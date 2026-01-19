<?php 
namespace DilipParmar\Project2026\Core1901;
use PDO;

require_once __DIR__ . '/../config.php';

class Database {
    private $host;
    private $username;
    private $password;
    private $dbName;
    private $connection;

    public function __construct(array $config) {
        $this->host = $config['host'];
        $this->username = $config['username'];
        $this->password = $config['password'];
        $this->dbName = $config['name'];
        $this->connect();
        var_dump($this->connection);
    }

    private function connect(): void {
        $this->connection = new PDO(
            "mysql:host={$this->host};dbname={$this->dbName}",
            $this->username,
            $this->password
        );
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }

    public function getConnection(): PDO {
        return $this->connection;
    }

    public function close(): void {
        if ($this->connection) {
            $this->connection->close();
        }
    }
}