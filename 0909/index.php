<?php

declare(strict_types=1);

use Oops\Concept\Vehicle;

require_once __DIR__ . "/vendor/autoload.php";
echo "Let's try oops concept in php";
$obj = new Vehicle();
echo $obj->sayHello();

$fakerobj = Faker\Factory::create();

echo "<br>" . $fakerobj->name("female");
