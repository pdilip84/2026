<?php
// lets demonstrate oops in php

// inheritance - adopt parent prop
// polimorephisam - act different in different scenario
// abstration - hiding data - hiding process
// encapsulation - data inside the class and fun

abstract class ParentCls
{
    protected int $x;
    // private float $y;
    public function __construct()
    {
        $this->x = 100;
        // $this->y = 3.24;
    }
    abstract function callmeone();
}

class ChildCls extends ParentCls
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getxvalue()
    {
        return $this->x;
    }
    public function getyvalue()
    {
        return null;
    }
    #[Override]
    public function callmeone()
    {
        return 'how r u men?';
    }
}

class ChildClsTwo extends ParentCls
{
    #[Override]
    public function callmeone()
    {
        return 'Go away!';
    }
}

$childObj = new ChildCls;
$childObj2 = new ChildClsTwo;
// var_dump($childObj);
echo $childObj->getxvalue();

// Abstract class → Cannot be instantiated directly.
// Abstract method → Child class must implement/define it.

echo $childObj->callmeone();
echo $childObj2->callmeone();
