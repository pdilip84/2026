<?php

declare(strict_types=1);

namespace Dilip\BasicsOfPhpunit;

class DiscountCalculator
{
    public function calculateDiscount(float $amount, bool $isFirstTimeCustomer): float
    {
        $discount = 0;

        if ($amount >= 4000) {
            $discount = 200;
        } elseif ($amount >= 3000) {
            $discount = 150;
        } elseif ($amount >= 2000) {
            $discount = 100;
        }

        if ($isFirstTimeCustomer) {
            $discount += ($amount * 0.02);
        }

        return $discount;
    }
}
