<?php

namespace App\Mcp\Tools;

use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Mcp\Server\Tool;
use App\Services\OrderService;

class CreateOrder extends Tool
{
    public string $name = 'createOrder';
    public string $description = 'Create a new order';

    public function schema(JsonSchema $schema): array
    {
        return $schema->object([
            'user_id' => $schema->integer()
                ->required()
                ->description('The id of the user placing the order.'),
            'product_id' => $schema->integer()
                ->required()
                ->description('The id of the product to order.'),
        ])->withoutAdditionalProperties()->toArray();
    }

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
