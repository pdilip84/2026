<?php

use TestDemonstration\Phpunit\School;

require_once __DIR__ . "/vendor/autoload.php";

echo "Hello, World!";

$scobj = new School("Madhav Internation School", 0);
echo $scobj->getSchoolName();
echo $scobj->schoolType();
