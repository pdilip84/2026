<?php

declare(strict_types=1);
class DB
{
    private int $pdo;
    public int $currentY;

    public function __construct()
    {
        // throw new \Exception('Not implemented');
        $this->pdo = 100;
        $this->currentY = 2026;
    }
    public function sayHello()
    {
        return 'Hello Guys!';
    }
    static function imStatic()
    {
        return \date('d/M/Y');
    }
    public function get_pdo(): int
    {
        return $this->pdo;
    }
}
