<?php

use App\Mcp\Servers\OrderServer;
use Laravel\Mcp\Facades\Mcp;

Mcp::local('orders', OrderServer::class);
Mcp::web('/mcp/orders', OrderServer::class);
