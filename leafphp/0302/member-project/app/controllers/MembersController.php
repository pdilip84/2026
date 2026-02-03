<?php

namespace App\Controllers;

class MembersController extends Controller
{
    public function index()
    {
        response()->view('pages/members/index');
    }
}
