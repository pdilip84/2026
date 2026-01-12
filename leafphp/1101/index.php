<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config.php';

app()->get('/', function() {
    response()->json(['message' => 'Hello, World!']);
});
app()->view('/prelaunch', 'prelaunch');
app()->post('/store', function () {
    if (!$data = request()->validate(['email' => 'email'])) {
        // validation failed, redirect back with errors
        return response()
          ->withFlash('errors', request()->errors())
          ->redirect('/prelaunch');
    }

    // save the email
    db()->insert('emails')->params($data)->execute(); 

    return response() 
      ->withFlash('success', 'You have been added to our list!') 
      ->redirect('/prelaunch'); 
});
app()->run();