<?php
require_once __DIR__ . "/vendor/autoload.php";

use DilipParmar\PdoTest\PDOConnect;

echo "<pre>";

// echo "Let's try PDO<br>";
//benifits
// we can connect with multiple databases in same project
// using prepare, bind & execute - secure way to connect
// better error handling

$dbobj = new PDOConnect("mysql:host=localhost;dbname=my_app", "root", "Kavya&Prithvi@2022");
// var_dump($dbobj);
print_r($dbobj);
