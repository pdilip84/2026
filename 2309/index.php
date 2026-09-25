<?php

declare(strict_types=1);
require_once __DIR__ . "/DB.php";
require_once __DIR__ . "/Car.php";

echo "Let's try some oops concept";
$dbobj = new \DB;
var_dump($dbobj);
try {
    $output = $dbobj?->sayHello();
    echo $output;
} catch (\Throwable $th) {
    die($th->getMessage());
}
echo \DB::imStatic();
// currentY is public property so we can access here while $pdo is private property so we can't call it outside of class even with valid object.
echo $dbobj->currentY;
// that's why we created a getter function 
echo $dbobj->get_pdo();
// and this whole concetp to protect private variable accessible inside the class only is called Encapsulation in oops.

$carobj = new \Car;
var_dump($carobj);
echo $carobj->vType();
