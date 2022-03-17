<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImgAbout;
use App\Models\nav;

class MainController extends Controller
{
        public function welcome()
    { 
        $img = new ImgAbout();
        $nav = new nav();
        return view('welcome', ['img' => $img->all()], 'welcome', ['nav' => $nav->all()]);
    }
}
