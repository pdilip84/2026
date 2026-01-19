<?php
namespace DilipParmar\Project2026\Core1901;

class Model extends Database {
    protected $db;
    private static $instance;
    
    public static function setDatabase(Database $database) {
        self::$instance = $database;
    }
    
    public function __construct() {
        if (self::$instance) {
            $this->db = self::$instance->getConnection();
        }
    }
}