<?php

declare(strict_types=1);

use App\dilip\Car;

require_once __DIR__ . "/Vehicle.php";
require_once __DIR__ . "/Car.php";

echo 'Hello World!, Let\'s demonstrate oops concept<br>';

$maruti = new Car;
echo $maruti->sound();
echo $maruti->madein();
