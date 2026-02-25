<?php

use App\Middleware\DummyMiddleware;

app()->get('/dummy', function () {
    return response()->json([
        'message' => 'This is a dummy route for testing purposes.',
    ]);
});

app()->get('/dummy/log', [
    'middleware' => DummyMiddleware::class,
    // 'middleware' => ('auth.required'),
    'DummiesController@show',
]);
