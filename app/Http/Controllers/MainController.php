<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImgAbout;
use App\Models\nav;
use App\Models\service;
use App\Models\title_service;
use App\Models\Section;

class MainController extends Controller
{
        public function welcome()
    { 
        $img = new ImgAbout();
        $nav = new nav();
        $service = new service();
        $title_service = new title_service();
        $section = new section();
        return view('welcome', ['img' => $img->all(),'nav' => $nav->all(),'service' => $service->all(),'title_service' => $title_service->all(),'section' => $section->all()]);
    }
}
