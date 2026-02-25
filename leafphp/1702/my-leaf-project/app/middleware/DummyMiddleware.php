<?php

namespace App\Middleware;

use Leaf\Middleware;

class DummyMiddleware extends Middleware
{
    public function call()
    {
        //
        echo "DummyMiddleware executed before route handler.\n";
    }
}
