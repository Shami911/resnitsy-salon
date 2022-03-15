<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
        public function welcome()
    {
        return view('welcome');
    }
        public function admin_panel()
    {
        return view('admin_panel');
    }
}
