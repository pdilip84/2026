<?php

use App\demointerface\MIS;

require_once __DIR__ . "/MIS.php";
$misobj = new MIS;
echo "Madhav school is established in " . $misobj->establishYear() . " and has total number of " . $misobj->studentTotal() . " and it is located in " . $misobj->city();
echo " It is " . $misobj->schoolType();
