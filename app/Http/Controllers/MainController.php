<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImgAbout;
use App\Models\nav;
use App\Models\Count;
use App\Models\service;
use App\Models\title_service;

class MainController extends Controller
{
        public function welcome()
    { 
        $img = new ImgAbout();
        $nav = new nav();
        $count = new Count();
        return view('welcome', ['img' => $img->all(), 'nav' => $nav->all(), 'count' => $count->all()]);
        $service = new service();
        $title_service = new title_service();
        return view('welcome', ['img' => $img->all(),'nav' => $nav->all(),'service' => $service->all(),'title_service' => $title_service->all()]);
    }
}
