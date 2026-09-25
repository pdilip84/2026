<?php

declare(strict_types=1);

namespace DilipParmar\PdoTest;

class PDOConnect
{
    public string $dsn;
    public string $username;
    public string $password;

    public function __construct(string $dsn, string $un, string $pass)
    {
        try {
            $pdo = new \PDO($dsn, $un, $pass);
            // return $pdo;

            $stmt = $pdo->prepare("SELECT * FROM members");
            $stmt->execute();
            $members = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return 1;
        } catch (\PDOException $th) {
            // throw $th("something is wrong" . $th->getMessage());
            echo $th->getMessage();
        }
    }
}
