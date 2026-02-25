<?php

namespace App\Controllers;

class DummiesController extends Controller
{
    public function index()
    {
        response()->render('dummy');
    }
    public function show()
    {
        response()->json([
            'message' => "Showing dummy data.",
        ]);
    }
}
