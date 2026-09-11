<?php

declare(strict_types=1);

use Dilip\BasicsOfPhpunit\DiscountCalculator;

include_once __DIR__ . "/vendor/autoload.php";

echo "Let's test phpUnit package";

$obj = new DiscountCalculator;
echo $obj->calculateDiscount(2100, false);
