<?php
// echo "Let's test PDO again in single php page.";

// data string dsn
// connect PDO and crete PDO object
// prepare select all PDO statement
// execute()

$dsn = "mysql:host=localhost;dbname=my_app";
$pdo = null;

try {
    $pdo = new PDO($dsn, "root", "Kavya&Prithvi@2022");
} catch (\Throwable $th) {
    die($th->getMessage());
}

var_dump($pdo);

// $statement = $pdo->prepare("select * from members where id=:id");
// $statement->bindValue(":id", 18);
// $statement->execute();
// $result = $statement->fetch();
// echo "<pre>";
// var_dump($result);


$statement = $pdo->prepare("select * from members");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_DEFAULT);
echo "<pre>";
// var_dump($result);
foreach ($result as $key => $value) {
    # code...
    // print_r($value);
    echo $value['name'] . "<br>";
}
