<?php

namespace App\Controllers\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // auth()->createRoles([
        //     'admin' => ['view user', 'view users', 'create user'],
        //     'user' => ['view user', 'view users'],
        //     'guest' => ['view user']
        // ]);


        // auth()->user()->assign('admin');
        // if (!auth()->user()->is('admin')) {
        //     return response()->json(['message' => 'Unauthorized'], 403);
        // }
        response()->view('pages.dashboard');
    }
}
