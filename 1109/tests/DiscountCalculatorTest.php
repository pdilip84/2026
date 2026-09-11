<?php

use Dilip\BasicsOfPhpunit\DiscountCalculator;
use PHPUnit\Framework\TestCase;

class DiscountCalculatorTest extends TestCase
{
    public function testNoDiscountBelow1000()
    {
        $calculator = new DiscountCalculator();
        $result = $calculator->calculateDiscount(500, false);
        $this->assertEquals(0, $result);
    }
    public function testDiscountFor2000()
    {
        $calculator = new DiscountCalculator();
        $result = $calculator->calculateDiscount(2000, false);
        $this->assertEquals(100, $result);
    }
    public function testDiscountFor3000()
    {
        $calculator = new DiscountCalculator();

        $result = $calculator->calculateDiscount(3000, false);

        $this->assertEquals(150, $result);
    }
    public function testDiscountFor4000()
    {
        $calculator = new DiscountCalculator();

        $result = $calculator->calculateDiscount(4000, false);

        $this->assertEquals(200, $result);
    }
    public function testFirstTimeCustomerGetsExtra2Percent()
    {
        $calculator = new DiscountCalculator();

        $result = $calculator->calculateDiscount(2000, true);

        $this->assertEquals(140, $result);
    }
    public function testNoDiscountFor999()
    {
        $calculator = new DiscountCalculator();

        $result = $calculator->calculateDiscount(999, false);

        $this->assertEquals(0, $result);
    }
    public function testNoDiscountFor1000()
    {
        $calculator = new DiscountCalculator();

        $result = $calculator->calculateDiscount(1000, false);

        $this->assertEquals(0, $result);
    }
    // PHPUnit has a feature called Data Providers that lets us test many input combinations using one test method. that is next we need to learn.
}
