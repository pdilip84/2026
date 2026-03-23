<?php

namespace App\Services;

use App\Models\Order;

class OrderService
{
    public function create(int $userId, int $productId)
    {
        // Here you would typically interact with your database to create an order.
        // For demonstration purposes, we'll just return a new Order instance.

        return Order::create([
            'user_id' => $userId,
            'product_id' => $productId,
        ]);
    }
}
