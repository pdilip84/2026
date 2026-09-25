<?php

declare(strict_types=1);
echo "Trial with type casting & Type juggeling";

(int)$x = 5;
(string)$y = "6";
var_dump($x, $y);
// this will work as php is weak type language.
echo $x + $y;

// but passing those variable in function does not support it becuase we used strict_type ON;
function demoSum(int $x, int $y): int
{
    return $x + $y;
}

$demoSum2 = fn(int $x, int $y): int => $x + $y;

try {
    // echo demoSum($x, $y);
    echo $demoSum2($x, $y);
} catch (\Throwable $th) {
    die($th->getMessage());
}
