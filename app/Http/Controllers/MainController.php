<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImgAbout;
use App\Models\nav;
use App\Models\Count;


class MainController extends Controller
{
        public function welcome()
    { 
        $img = new ImgAbout();
        $nav = new nav();
        $count = new Count();
        return view('welcome', ['img' => $img->all(), 'nav' => $nav->all(), 'count' => $count->all()]);
    }
}
