<?php

namespace App\Mcp\Servers;

use App\Mcp\Tools\CreateOrder;
use Laravel\Mcp\Server;
use Laravel\Mcp\Server\Attributes\Instructions;
use Laravel\Mcp\Server\Attributes\Name;
use Laravel\Mcp\Server\Attributes\Version;

#[Name('Order Server')]
#[Version('0.0.1')]
#[Instructions('Provides order-related MCP tools, including creating orders by user and product id.')]
class OrderServer extends Server
{
    protected array $tools = [
        CreateOrder::class,
    ];
}
