<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GreetController extends Controller
{
    public function index()
    {
        return "Hello, welcome to my Laravel app!";
    }
}
