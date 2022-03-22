<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImgAbout;
use App\Models\nav;
use App\Models\Count;
use App\Models\service;
use App\Models\title_service;
use App\Models\Section;
use App\Models\Reviews;
use App\Models\Comment;
use App\Models\MainFaq;
use App\Models\TitleFaq;
use App\Models\PricingTitle;
use App\Models\Price;
use App\Models\PriceTwo;
use App\Models\PriceThree;
use App\Models\PriceFour;

class MainController extends Controller
{
        public function welcome()
    { 
        $img = new ImgAbout();
        $nav = new nav();
        $count = new Count();
        $service = new service();
        $title_service = new title_service();
        $section = new Section();
        $reviews = new Reviews();
        $comment = new Comment();
        $faq = new MainFaq();
        $title_faq = new TitleFaq();
        $pricing_title = new PricingTitle();
        $price = new Price();
        $price_two = new PriceTwo();
        $price_three = new PriceThree();
        $price_four = new PriceFour();
        return view('welcome', ['img' => $img->all(),'nav' => $nav->all(),'service' => $service->all(),'title_service' => $title_service->all(),'section' => $section->all(), 'count' => $count->all(), 'reviews' => $reviews->all(), 'comment' => $comment->all(), 'faq' => $faq->all(), 'title_faq' => $title_faq->all()
        , 'pricing_title' => $pricing_title->all(), 'price' => $price->all(), 'price_two' => $price_two->all()
        , 'price_three' => $price_three->all(), 'price_four' => $price_four->all()]);
    }
}
