<?php

namespace App\Mcp\Tools;

use Laravel\Mcp\Server\Tool;
use App\Services\OrderService;

class CreateOrder extends Tool
{
    public string $name = 'createOrder';
    public string $description = 'Create a new order';

    public function handle(array $arguments): array
    {
        $service = app(OrderService::class);
        $order = $service->create(
            $arguments['user_id'],
            $arguments['product_id']
        );
        return [
            'id' => $order->id,
            'status' => 'created'
        ];
    }
}
