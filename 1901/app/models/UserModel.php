<?php 
namespace DilipParmar\Project2026\App1901\models;

use DilipParmar\Project2026\Core1901\Model;
use DilipParmar\Project2026\Core1901\Database;

class UserModel extends Model {
    private $name;
    private $email;
    private $table = 'users'; // Database table name
    
    public function __construct(string $name, string $email) {
        parent::__construct();
        $this->name = $name;
        $this->email = $email;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getUsersTable(): string {
        return $this->table;
    }

    public function getAllUsers(): array {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table}");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}