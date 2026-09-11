<?php

// write a basic function which sums two numbers

function SumNum(float $x, float $y): float
{
    return $x + $y;
}
echo SumNum(9, 3);

// now demonstration of arrow function which function as variable.

$NewSumNum = fn(float $x, float $y): float => $x + $y;
echo $NewSumNum(4.5, 5.4);

// demonstration of anonymous funciton. This is actually a clousre is a object of ana fn
$LatestSum = function (float $x, float $y): float {
    return $x + $y;
};
echo $LatestSum(3.4, 5.6);
var_dump($LatestSum);

// Function outside a class  → function
// Function inside a class   → method
// Function without a name   → anonymous function / closure
// Short anonymous function  → arrow function