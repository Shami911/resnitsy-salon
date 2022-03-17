<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImgAbout;

class MainController extends Controller
{
        public function welcome()
    { 
        $img = new ImgAbout();
        return view('welcome', ['img' => $img->all()]);
    }
    
}
