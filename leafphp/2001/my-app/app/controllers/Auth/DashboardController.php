<?php

namespace App\Controllers\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        // echo '<pre>';


        // auth()->createRoles(['admin', 'editor', 'viewer']);
        // $list = auth()->roles();
        // print_r($list);
        // auth()->user()->assign($list[0]);
        // print_r(auth()->user());
        // echo auth()->user()->is('admin') ? 'User has admin role' : 'User does not have admin role';
        // die();
        response()->view('pages.dashboard');
    }
}
