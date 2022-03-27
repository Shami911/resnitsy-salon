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
use App\Models\Portfolio;
use App\Models\CardPortfolio;
use App\Models\CardApp;
use App\Models\CardWeb;
use App\Models\Reviews;
use App\Models\Comment;
use App\Models\MainFaq;
use App\Models\TitleFaq;
use App\Models\PricingTitle;
use App\Models\Price;
use App\Models\PriceTwo;
use App\Models\PriceThree;
use App\Models\PriceFour;
use App\Models\Team;
use App\Models\CardTeam;
use App\Models\IconCard;
use App\Models\ContactTitle;
use App\Models\Email;
use App\Models\Call;
use App\Models\Icon;


class MainController extends Controller
{
        public function welcome()
    { 
        $img = new ImgAbout();
        $nav = new nav();
        $count = new Count();
        $service = new service();
        $title_service = new title_service();
        $portfolio = new Portfolio();
        $card = new CardPortfolio();
        $cardApp = new CardApp();
        $cardWeb = new CardWeb();
        $section = new Section();
        $reviews = new Reviews();
        $comment = new Comment();
        $faq = new MainFaq();
        $Cardteam = new CardTeam();
        $IconCard = new IconCard();
        $title_faq = new TitleFaq();
        $pricing_title = new PricingTitle();
        $price = new Price();
        $price_two = new PriceTwo();
        $price_three = new PriceThree();
        $price_four = new PriceFour();
        $team = new Team();
        $contact_title = new ContactTitle();
        $email = new Email();
        $call = new Call();
        $icon = new Icon();

        return view('welcome', ['img' => $img->all(),'nav' => $nav->all(),'service' => $service->all(),'title_service' => $title_service->all(),'section' => $section->all(), 'count' => $count->all(), 'reviews' => $reviews->all(), 'comment' => $comment->all(), 'faq' => $faq->all(), 'title_faq' => $title_faq->all(), 'portfolio' => $portfolio->all(), 'card' => $card->all(), 'cardApp' => $cardApp->all(), 'cardWeb' => $cardWeb->all()
        , 'pricing_title' => $pricing_title->all(), 'price' => $price->all(), 'price_two' => $price_two->all()
        , 'price_three' => $price_three->all(), 'price_four' => $price_four->all(), 'contact_title' => $contact_title->all(), 'email' => $email->all(), 'call' => $call->all(), 'icon' => $icon->all(),'team' => $team->all(), 'Cardteam' => $Cardteam->all(), 'IconCard' => $IconCard->all()]);
    }
}
