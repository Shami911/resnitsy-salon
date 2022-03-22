<?php

namespace App\Http\Controllers;
use App\Models\nav;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ImgAbout;
use App\Models\Count;
use App\Models\service;
use App\Models\title_service;
use App\Models\Section;
use App\Models\Portfolio;
use App\Models\CardPortfolio;
use App\Models\CardApp;
use App\Models\ButtonCard;
use App\Models\ButtonWeb;
use App\Models\CardWeb;
use App\Models\Reviews;
use App\Models\Comment;
use App\Models\MainFaq;
use App\Models\PricingTitle;
use App\Models\Price;
use App\Models\PriceTwo;
use App\Models\TitleFaq;
use App\Models\PriceThree;
use App\Models\PriceFour;


class AdminController extends Controller
{
    public function admin_panel(){
        return view('admin.admin_panel');
    }
        // IMG ABOUT START
        public function img_about(){
            $img = new ImgAbout();
            return view ('admin.img_about' , ['img' => $img->all()]);
        }  
        public function add_img_about(Request $data){
            $valid = $data->validate([
                'img' => ['required', 'image', 'mimetypes:image/jpeg,image/png,image/webp'],
                'title' => ['required'],
                'description' => ['required'],
                'slogatLeft' => ['required'],
                'descriptionSL' => ['required'],
                'slogatRight' => ['required'],
                'descriptionSR' => ['required'],
            ]); 
    
            $file = $data->file('img');
            $upload_folder = 'public/ImgAbout/'; //Создается автоматически
            $filename = $file->getClientOriginalName(); //Сохраняем исходное название изображения
            Storage::putFileAs($upload_folder, $file, $filename); 
    
            $img = new ImgAbout();
            $img->img = $filename;
            $img->title = $data->input('title');
            $img->description = $data->input('description');
            $img->slogatLeft = $data->input('slogatLeft');
            $img->descriptionSL = $data->input('descriptionSL');
            $img->slogatRight = $data->input('slogatRight');
            $img->descriptionSR = $data->input('descriptionSR');
            $img->save();
            return redirect()->route('img_about');
        }
    
        public function exit_img_about(Request $data, $id){
            $valid = $data->validate([
                'img' => ['image', 'mimetypes:image/jpeg,image/png,image/webp'],
                'title' => ['required'],
                'description' => ['required'],
                'slogatLeft' => ['required'],
                'descriptionSL' => ['required'],
                'slogatRight' => ['required'],
                'descriptionSR' => ['required']
            ]); 
            
            $img = ImgAbout::find($id);
            if($data->file('img') != '') {
                $upload_folder = 'public/ImgAbout/'; //Создается автоматически
                $file = $data->file('img');
                $filename = $file->getClientOriginalName();
                Storage::delete($upload_folder . '/' . $img->img);
                Storage::putFileAs($upload_folder, $file, $filename);    
                $img->img = $filename;
                Storage::putFileAs($upload_folder, $file, $filename); 
            } else {
                $img->img = $img->img;
            }
            
            $img->title = $data->input('title');
            $img->description = $data->input('description');
            $img->slogatLeft = $data->input('slogatLeft');
            $img->descriptionSL = $data->input('descriptionSL');
            $img->slogatRight = $data->input('slogatRight');
            $img->descriptionSR = $data->input('descriptionSR');
            $img->save();
    
            return redirect()->route('img_about');
        }  
    
        public function delete_img_about($id){
            ImgAbout::find($id)->delete();
            return redirect()->route('img_about');
        }
        // IMG ABOUT END

        // SERVICE START
        public function admin_service(){
            $service = new service();
            return view ('admin.admin_service' , ['service' => $service->all()]);
        }  
        public function add_service(Request $data){
            $valid = $data->validate([
                'icon' => ['required'],
                'title' => ['required'],
                'slogan' => ['required'],
            ]); 
            $service = new service();
            $service->icon = $data->input('icon');
            $service->title = $data->input('title');
            $service->slogan = $data->input('slogan');
            $service->save();
            return redirect()->route('admin_service');
        }
    
        public function exit_service(Request $data, $id){
            $valid = $data->validate([
                'icon' => ['required'],
                'title' => ['required'],
                'slogan' => ['required'],
            ]); 
            $service = service::find($id);
            $service->icon = $data->input('icon');
            $service->title = $data->input('title');
            $service->slogan = $data->input('slogan');
            $service->save();
            return redirect()->route('admin_service');
        }  
    
        public function delete_service($id){
            service::find($id)->delete();
            return redirect()->route('admin_service');
        }
        // SERVICE END

        // NAV START
        public function admin_nav(){
            $nav = new nav();
            return view ('admin.admin_nav' , ['nav' => $nav->all()]);
        }  
        public function add_nav(Request $data){
            $valid = $data->validate([
                'title' => ['required'],
                'slogan' => ['required'],
                'button' => ['required']
            ]); 
            $nav = new nav();
            $nav->title = $data->input('title');
            $nav->slogan = $data->input('slogan');
            $nav->button = $data->input('button');
            $nav->save();
            return redirect()->route('admin_nav');
        }
    
        public function exit_nav(Request $data, $id){
            $valid = $data->validate([
                'title' => ['required'],
                'slogan' => ['required'],
                'button' => ['required']
            ]); 
            $nav = nav::find($id);
            $nav->title = $data->input('title');
            $nav->slogan = $data->input('slogan');
            $nav->button = $data->input('button');
            $nav->save();
            return redirect()->route('admin_nav');
        }  
    
        public function delete_nav($id){
            nav::find($id)->delete();
            return redirect()->route('admin_nav');
        }



        // NAV END

        // COUNT START

        public function count(){
            $count = new Count();
            return view ('admin.count' , ['count' => $count->all()]);
        }
        public function add_count(Request $data){
            $valid = $data->validate([
                'Clients' => ['required'],
                'SloganClients' => ['required'],
                'Projects' => ['required'],
                'SloganProjects' => ['required'],
                'Support' => ['required'],
                'SloganSupport' => ['required'],
                'HardWorkers' => ['required'],
                'SloganWorkers' => ['required']
            ]); 
    
            $count = new Count();
            $count->Clients = $data->input('Clients');
            $count->SloganClients = $data->input('SloganClients');
            $count->Projects = $data->input('Projects');
            $count->SloganProjects = $data->input('SloganProjects');
            $count->Support = $data->input('Support');
            $count->SloganSupport = $data->input('SloganSupport');
            $count->HardWorkers = $data->input('HardWorkers');
            $count->SloganWorkers = $data->input('SloganWorkers');
            $count->save();
            return redirect()->route('count');
        }
        public function exit_count(Request $data, $id){
            $valid = $data->validate([
                'Clients' => ['required'],
                'SloganClients' => ['required'],
                'Projects' => ['required'],
                'SloganProjects' => ['required'],
                'Support' => ['required'],
                'SloganSupport' => ['required'],
                'HardWorkers' => ['required'],
                'SloganWorkers' => ['required']
            ]); 
            
            $count = Count::find($id);
            $count->Clients = $data->input('Clients');
            $count->SloganClients = $data->input('SloganClients');
            $count->Projects = $data->input('Projects');
            $count->SloganProjects = $data->input('SloganProjects');
            $count->Support = $data->input('Support');
            $count->SloganSupport = $data->input('SloganSupport');
            $count->HardWorkers = $data->input('HardWorkers');
            $count->SloganWorkers = $data->input('SloganWorkers');
            $count->save();
    
            return redirect()->route('count');
        } 
        public function delete_count($id){
            Count::find($id)->delete();
            return redirect()->route('count');
        }


        // COUNT END


        // SECTION START
        public function admin_section(){
            $section = new Section();
            return view ('admin.admin_section' , ['section' => $section->all()]); 

        }  
        public function add_section(Request $data){
            $valid = $data->validate([
                'button' => ['required'],
                'title' => ['required'],
                'slogan' => ['required'],
            ]); 
            $section = new Section();
            $section->button = $data->input('button');
            $section->title = $data->input('title');
            $section->slogan = $data->input('slogan');
            $section->save();
            return redirect()->route('admin_section');
        }
    
        public function exit_section(Request $data, $id){
            $valid = $data->validate([
                'button' => ['required'],
                'title' => ['required'],
                'slogan' => ['required']
            ]); 
            $section = Section::find($id);
            $section->button = $data->input('button');
            $section->title = $data->input('title');
            $section->slogan = $data->input('slogan');
            $section->save();
            return redirect()->route('admin_section');
        }  
    
        public function delete_section($id){
            Section::find($id)->delete();
            return redirect()->route('admin_section');
        }
        // SECTION END

        // TITLE SERVICE START
        public function admin_title_service(){
            $title_service = new title_service();
            return view ('admin.admin_title_service' , ['title_service' => $title_service->all()]);
        }  
        public function add_title_service(Request $data){
            $valid = $data->validate([
                'title' => ['required'],
                'slogan' => ['required'],
            ]); 
            $title_service = new title_service();
            $title_service->title = $data->input('title');
            $title_service->slogan = $data->input('slogan');
            $title_service->save();
            return redirect()->route('admin_title_service');
        }
    
        public function exit_title_service(Request $data, $id){
            $valid = $data->validate([
                'title' => ['required'],
                'slogan' => ['required'],
            ]); 
            $title_service = title_service::find($id);
            $title_service->title = $data->input('title');
            $title_service->slogan = $data->input('slogan');
            $title_service->save();
            return redirect()->route('admin_title_service');
        }  
    
        public function delete_title_service($id){
            title_service::find($id)->delete();
            return redirect()->route('admin_title_service');
        }


        public function portfolio(){
            $portfolio = new Portfolio();
            return view ('admin.portfolio' , ['portfolio' => $portfolio->all()]);
        }
        public function add_portfolio(Request $data){
            $valid = $data->validate([
                'title' => ['required'],
                'description' => ['required'],
                'buttonAll' => ['required'],
                'buttonApp' => ['required'],
                'buttonCard' => ['required'],
                'buttonWeb' => ['required'],
            ]); 
    
            $portfolio = new Portfolio();
            $portfolio->title = $data->input('title');
            $portfolio->description = $data->input('description');
            $portfolio->buttonAll = $data->input('buttonAll');
            $portfolio->buttonApp = $data->input('buttonApp');
            $portfolio->buttonCard = $data->input('buttonCard');
            $portfolio->buttonWeb = $data->input('buttonWeb');
            $portfolio->save();
            return redirect()->route('portfolio');
        }
        public function exit_portfolio(Request $data, $id){
            $valid = $data->validate([
                'title' => ['required'],
                'description' => ['required'],
                'buttonAll' => ['required'],
                'buttonApp' => ['required'],
                'buttonCard' => ['required'],
                'buttonWeb' => ['required'],
            ]); 
            
            $portfolio = Portfolio::find($id);
            $portfolio->title = $data->input('title');
            $portfolio->description = $data->input('description');
            $portfolio->buttonAll = $data->input('buttonAll');
            $portfolio->buttonApp = $data->input('buttonApp');
            $portfolio->buttonCard = $data->input('buttonCard');
            $portfolio->buttonWeb = $data->input('buttonWeb');
            $portfolio->save();
    
            return redirect()->route('portfolio');
        } 
        public function delete_portfolio($id){
            Portfolio::find($id)->delete();
            return redirect()->route('portfolio');
        }
        public function PortfolioCard(){
            $card = new CardPortfolio();
            return view ('admin.PortfolioCard' , ['card' => $card->all()]);
        }  
        public function add_CardPotfolio(Request $data){
            $valid = $data->validate([
                'img' => ['required', 'image', 'mimetypes:image/jpeg,image/png,image/webp'],
                'title' => ['required'],
                'description' => ['required']
            ]); 
    
            $file = $data->file('img');
            $upload_folder = 'public/CardPortfolio/'; //Создается автоматически
            $filename = $file->getClientOriginalName(); //Сохраняем исходное название изображения
            Storage::putFileAs($upload_folder, $file, $filename); 
    
            $card = new CardPortfolio();
            $card->img = $filename;
            $card->title = $data->input('title');
            $card->description = $data->input('description');
            $card->save();
            return redirect()->route('PortfolioCard');
        }
    
        public function exit_CardPotfolio(Request $data, $id){
            $valid = $data->validate([
                'img' => ['required', 'image', 'mimetypes:image/jpeg,image/png,image/webp'],
                'title' => ['required'],
                'description' => ['required']
            ]); 
            
            $card = CardPortfolio::find($id);
            if($data->file('img') != '') {
                $upload_folder = 'public/CardPortfolio/'; //Создается автоматически
                $file = $data->file('img');
                $filename = $file->getClientOriginalName();
                Storage::delete($upload_folder . '/' . $card->img);
                Storage::putFileAs($upload_folder, $file, $filename);    
                $card->img = $filename;
                Storage::putFileAs($upload_folder, $file, $filename); 
            } else {
                $card->img = $card->img;
            }
            
            $card->title = $data->input('title');
            $card->description = $data->input('description');
            $card->save();
    
            return redirect()->route('PortfolioCard');
        }  

        public function delete_CardPotfoliot($id){
            CardPortfolio::find($id)->delete();
            return redirect()->route('PortfolioCard');
        }
        public function admin_card_app(){
            $cardApp = new CardApp();
            return view ('admin.admin_card_app' , ['cardApp' => $cardApp->all()]);
        }  
        public function add_CardApp(Request $data){
            $valid = $data->validate([
                'img' => ['required', 'image', 'mimetypes:image/jpeg,image/png,image/webp'],
                'title' => ['required'],
                'description' => ['required']
            ]); 
    
            $file = $data->file('img');
            $upload_folder = 'public/CardApp/'; //Создается автоматически
            $filename = $file->getClientOriginalName(); //Сохраняем исходное название изображения
            Storage::putFileAs($upload_folder, $file, $filename); 
    
            $cardApp = new CardApp();
            $cardApp->img = $filename;
            $cardApp->title = $data->input('title');
            $cardApp->description = $data->input('description');
            $cardApp->save();
            return redirect()->route('admin_card_app');
        }
    
        public function exit_CardApp(Request $data, $id){
            $valid = $data->validate([
                'img' => ['required', 'image', 'mimetypes:image/jpeg,image/png,image/webp'],
                'title' => ['required'],
                'description' => ['required']
            ]); 
            
            $cardApp = CardApp::find($id);
            if($data->file('img') != '') {
                $upload_folder = 'public/CardApp/'; //Создается автоматически
                $file = $data->file('img');
                $filename = $file->getClientOriginalName();
                Storage::delete($upload_folder . '/' . $cardApp->img);
                Storage::putFileAs($upload_folder, $file, $filename);    
                $cardApp->img = $filename;
                Storage::putFileAs($upload_folder, $file, $filename); 
            } else {
                $cardApp->img = $cardApp->img;
            }
            
            $cardApp->title = $data->input('title');
            $cardApp->description = $data->input('description');
            $cardApp->save();
    
            return redirect()->route('admin_card_app');
        }  

        public function delete_CardApp($id){
            CardApp::find($id)->delete();
            return redirect()->route('admin_card_app');
        }

        public function admin_card_web(){
            $cardWeb = new CardWeb();
            return view ('admin.admin_card_web' , ['cardWeb' => $cardWeb->all()]);
        }  
        public function add_card_web(Request $data){
            $valid = $data->validate([
                'img' => ['required', 'image', 'mimetypes:image/jpeg,image/png,image/webp'],
                'title' => ['required'],
                'description' => ['required']
            ]); 
    
            $file = $data->file('img');
            $upload_folder = 'public/cardWeb/'; //Создается автоматически
            $filename = $file->getClientOriginalName(); //Сохраняем исходное название изображения
            Storage::putFileAs($upload_folder, $file, $filename); 
    
            $cardWeb = new CardWeb();
            $cardWeb->img = $filename;
            $cardWeb->title = $data->input('title');
            $cardWeb->description = $data->input('description');
            $cardWeb->save();
            return redirect()->route('admin_card_web');
        }
    
        public function exit_card_web(Request $data, $id){
            $valid = $data->validate([
                'img' => ['required', 'image', 'mimetypes:image/jpeg,image/png,image/webp'],
                'title' => ['required'],
                'description' => ['required']
            ]); 
            
            $cardWeb = CardWeb::find($id);
            if($data->file('img') != '') {
                $upload_folder = 'public/cardWeb/'; //Создается автоматически
                $file = $data->file('img');
                $filename = $file->getClientOriginalName();
                Storage::delete($upload_folder . '/' . $cardWeb->img);
                Storage::putFileAs($upload_folder, $file, $filename);    
                $cardWeb->img = $filename;
                Storage::putFileAs($upload_folder, $file, $filename); 
            } else {
                $cardWeb->img = $cardApp->img;
            }
            
            $cardWeb->title = $data->input('title');
            $cardWeb->description = $data->input('description');
            $cardWeb->save();
    
            return redirect()->route('admin_card_web');
        }  

        public function delete_card_web($id){
            CardWeb::find($id)->delete();
            return redirect()->route('admin_card_web');
        }

        // TITLE SERVICE END

        // TEST START
        public function reviews(){
            $reviews = new Reviews();
            return view ('admin.reviews' , ['reviews' => $reviews->all()]);
        }  
        public function add_reviews(Request $data){
            $valid = $data->validate([
                'title' => ['required'],
                'slogan' => ['required'],
            ]); 
            $reviews = new Reviews();
            $reviews->title = $data->input('title');
            $reviews->slogan = $data->input('slogan');
            $reviews->save();
            return redirect()->route('reviews');
        }
    
        public function exit_reviews(Request $data, $id){
            $valid = $data->validate([
                'title' => ['required'],
                'slogan' => ['required']
            ]); 
            $reviews = Reviews::find($id);
            $reviews->title = $data->input('title');
            $reviews->slogan = $data->input('slogan');
            $reviews->save();
            return redirect()->route('reviews');
        }  
    
        public function delete_reviews($id){
            Reviews::find($id)->delete();
            return redirect()->route('reviews');
        }

        //TEST END

        // Комментарии start
        public function comment(){
            $comment = new Comment();
            return view ('admin.comment' , ['comment' => $comment->all()]);
        }  
        public function add_comment(Request $data){
            $valid = $data->validate([
                'img' => ['required', 'image', 'mimetypes:image/jpeg,image/png,image/webp'],
                'comment' => ['required'],
                'name' => ['required'],
                'work' => ['required'],
            ]); 
    
            $file = $data->file('img');
            $upload_folder = 'public/Comment/'; //Создается автоматически
            $filename = $file->getClientOriginalName(); //Сохраняем исходное название изображения
            Storage::putFileAs($upload_folder, $file, $filename); 
    
            $comment = new Comment();
            $comment->img = $filename;
            $comment-> comment= $data->input('comment');
            $comment->name = $data->input('name');
            $comment->work = $data->input('work');
            $comment->save();
            return redirect()->route('comment');
        }
    
        public function exit_comment(Request $data, $id){
            $valid = $data->validate([
                'img' => ['image', 'mimetypes:image/jpeg,image/png,image/webp'],
                'comment' => ['required'],
                'name' => ['required'],
                'work' => ['required'],
            ]); 
            
            $comment = Comment::find($id);
            if($data->file('img') != '') {
                $upload_folder = 'public/Comment/'; //Создается автоматически
                $file = $data->file('img');
                $filename = $file->getClientOriginalName();
                Storage::delete($upload_folder . '/' . $comment->img);
                Storage::putFileAs($upload_folder, $file, $filename);    
                $comment->img = $filename;
                Storage::putFileAs($upload_folder, $file, $filename); 
            } else {
                $comment->img = $comment->img;
            }
            
            $comment-> comment= $data->input('comment');
            $comment->name = $data->input('name');
            $comment->work = $data->input('work');
            $comment->save();
    
            return redirect()->route('comment');
        }  
    
        public function delete_comment($id){
            Comment::find($id)->delete();
            return redirect()->route('comment');
        }
        // IMG ABOUT END
        public function main_faq(){
            $main_faq = new MainFaq();
            return view('admin.main_faq', ['main_faq' => $main_faq->all()]);
        }
    
        public function add_faq(Request $data){
            $valid = $data->validate([
                'question' => ['required'],
                'answer' => ['required']
             ]); 
            $faq = new MainFaq();
            $faq->question = $data->input('question');
            $faq->answer = $data->input('answer');
            $faq->save();
    
            return redirect()->route('main_faq');
        }
    
        public function exit_faq(Request $data, $id){
            $valid = $data->validate([
                'question' => ['required'],
                'answer' => ['required']
            ]); 
            
            $faq = MainFaq::find($id);
            $faq->question = $data->input('question');
            $faq->answer = $data->input('answer');
            $faq->save();
    
            return redirect()->route('main_faq');
        }
    
        public function delete_faq($id){
            MainFaq::find($id)->delete();
            return redirect()->route('main_faq');
        }
        public function pricing_title(){
            $pricing_title = new PricingTitle();
            return view ('admin.pricing_title' , ['pricing_title' => $pricing_title->all()]);
        }  
        public function add_pricing_title(Request $data){
            $valid = $data->validate([
                'title' => ['required'],
                'slogan' => ['required'],
            ]); 
            $pricing_title = new PricingTitle();
            $pricing_title->title = $data->input('title');
            $pricing_title->slogan = $data->input('slogan');
            $pricing_title->save();
            return redirect()->route('pricing_title');
        }
    
        public function exit_pricing_title(Request $data, $id){
            $valid = $data->validate([
                'title' => ['required'],
                'slogan' => ['required']
            ]); 
            $pricing_title = PricingTitle::find($id);
            $pricing_title->title = $data->input('title');
            $pricing_title->slogan = $data->input('slogan');
            $pricing_title->save();
            return redirect()->route('pricing_title');
        }  
    
        public function delete_pricing_title($id){
            PricingTitle::find($id)->delete();
            return redirect()->route('pricing_title');
        }
        // NAV END
        public function price(){
            $price = new Price();
            return view ('admin.price' , ['price' => $price->all()]);
        }  
        public function add_price(Request $data){
            $valid = $data->validate([
                'title' => ['required'],
                'cost' => ['required'],
                'time' => ['required'],
                'service1' => ['required'],
                'service2' => ['required'],
                'service3' => ['required'],
                'button' => ['required'],
            ]); 
            $price = new Price();
            $price->title = $data->input('title');
            $price->cost = $data->input('cost');
            $price->time = $data->input('time');
            $price->service1 = $data->input('service1');
            $price->service2 = $data->input('service2');
            $price->service3 = $data->input('service3');
            $price->button = $data->input('button');
            $price->save();
            return redirect()->route('price');
        }
    
        public function exit_price(Request $data, $id){
            $valid = $data->validate([
                'title' => ['required'],
                'cost' => ['required'],
                'time' => ['required'],
                'service1' => ['required'],
                'service2' => ['required'],
                'service3' => ['required'],
                'button' => ['required'],
            ]); 
            $price = Price::find($id);
            $price->title = $data->input('title');
            $price->cost = $data->input('cost');
            $price->time = $data->input('time');
            $price->service1 = $data->input('service1');
            $price->service2 = $data->input('service2');
            $price->service3 = $data->input('service3');
            $price->button = $data->input('button');
            $price->save();
            return redirect()->route('price');
        }  
    
        public function delete_price($id){
            Price::find($id)->delete();
            return redirect()->route('price');
        }
        // NAV END

        public function title_faq(){
            $title_faq = new TitleFaq();
            return view ('admin.title_faq' , ['title_faq' => $title_faq->all()]);
        }  
        public function add_title_faq(Request $data){
            $valid = $data->validate([
                'title' => ['required']
            ]); 
            $title_faq = new TitleFaq();
            $title_faq->title = $data->input('title');
            $title_faq->save();
            return redirect()->route('title_faq');
        }
    
        public function exit_title_faq(Request $data, $id){
            $valid = $data->validate([
                'title' => ['required']
            ]); 
            $title_faq = TitleFaq::find($id);
            $title_faq->title = $data->input('title');
            $title_faq->save();
            return redirect()->route('title_faq');
        }  
    
        public function delete_title_faq($id){
            TitleFaq::find($id)->delete();
            return redirect()->route('title_faq');
        }
        // NAV END
        public function price_two(){
            $price_two = new PriceTwo();
            return view ('admin.price_two' , ['price_two' => $price_two->all()]);
        }  
        public function add_price_two(Request $data){
            $valid = $data->validate([
                'title' => ['required'],
                'cost' => ['required'],
                'time' => ['required'],
                'service1' => ['required'],
                'service2' => ['required'],
                'service3' => ['required'],
                'service4' => ['required'],
                'noservice' => ['required'],
                'button' => ['required'],
            ]); 
            $price_two = new PriceTwo();
            $price_two->title = $data->input('title');
            $price_two->cost = $data->input('cost');
            $price_two->time = $data->input('time');
            $price_two->service1 = $data->input('service1');
            $price_two->service2 = $data->input('service2');
            $price_two->service3 = $data->input('service3');
            $price_two->service4 = $data->input('service4');
            $price_two->noservice = $data->input('noservice');
            $price_two->button = $data->input('button');
            $price_two->save();
            return redirect()->route('price_two');
        }
    
        public function exit_price_two(Request $data, $id){
            $valid = $data->validate([
                'title' => ['required'],
                'cost' => ['required'],
                'time' => ['required'],
                'service1' => ['required'],
                'service2' => ['required'],
                'service3' => ['required'],
                'service4' => ['required'],
                'noservice' => ['required'],
                'button' => ['required'],
            ]); 
            $price_two = PriceTwo::find($id);
            $price_two->title = $data->input('title');
            $price_two->cost = $data->input('cost');
            $price_two->time = $data->input('time');
            $price_two->service1 = $data->input('service1');
            $price_two->service2 = $data->input('service2');
            $price_two->service3 = $data->input('service3');
            $price_two->service4 = $data->input('service4');
            $price_two->noservice = $data->input('noservice');
            $price_two->button = $data->input('button');
            $price_two->save();
            return redirect()->route('price_two');
        }  
    
        public function delete_price_two($id){
            PriceTwo::find($id)->delete();
            return redirect()->route('price_two');
        }
        // NAV END

        public function price_three(){
            $price_three = new PriceThree();
            return view ('admin.price_three' , ['price_three' => $price_three->all()]);
        }  
        public function add_price_three(Request $data){
            $valid = $data->validate([
                'title' => ['required'],
                'cost' => ['required'],
                'time' => ['required'],
                'service1' => ['required'],
                'service2' => ['required'],
                'service3' => ['required'],
                'service4' => ['required'],
                'service5' => ['required'],
                'button' => ['required'],
            ]); 
            $price_three = new PriceThree();
            $price_three->title = $data->input('title');
            $price_three->cost = $data->input('cost');
            $price_three->time = $data->input('time');
            $price_three->service1 = $data->input('service1');
            $price_three->service2 = $data->input('service2');
            $price_three->service3 = $data->input('service3');
            $price_three->service4 = $data->input('service4');
            $price_three->service5 = $data->input('service5');
            $price_three->button = $data->input('button');
            $price_three->save();
            return redirect()->route('price_three');
        }
    
        public function exit_price_three(Request $data, $id){
            $valid = $data->validate([
                'title' => ['required'],
                'cost' => ['required'],
                'time' => ['required'],
                'service1' => ['required'],
                'service2' => ['required'],
                'service3' => ['required'],
                'service4' => ['required'],
                'service5' => ['required'],
                'button' => ['required'],
            ]); 
            $price_three = PriceThree::find($id);
            $price_three->title = $data->input('title');
            $price_three->cost = $data->input('cost');
            $price_three->time = $data->input('time');
            $price_three->service1 = $data->input('service1');
            $price_three->service2 = $data->input('service2');
            $price_three->service3 = $data->input('service3');
            $price_three->service4 = $data->input('service4');
            $price_three->service5 = $data->input('service5');
            $price_three->button = $data->input('button');
            $price_three->save();
            return redirect()->route('price_three');
        }  
    
        public function delete_price_three($id){
            PriceThree::find($id)->delete();
            return redirect()->route('price_three');
        }
        // NAV END
            // NAV END

            public function price_four(){
                $price_four = new PriceFour();
                return view ('admin.price_four' , ['price_four' => $price_four->all()]);
            }  
            public function add_price_four(Request $data){
                $valid = $data->validate([
                    'slogan' => ['required'],
                    'title' => ['required'],
                    'cost' => ['required'],
                    'time' => ['required'],
                    'service1' => ['required'],
                    'service2' => ['required'],
                    'service3' => ['required'],
                    'service4' => ['required'],
                    'service5' => ['required'],
                    'button' => ['required'],
                ]); 
                $price_four = new PriceFour();
                $price_four->slogan = $data->input('slogan');
                $price_four->title = $data->input('title');
                $price_four->cost = $data->input('cost');
                $price_four->time = $data->input('time');
                $price_four->service1 = $data->input('service1');
                $price_four->service2 = $data->input('service2');
                $price_four->service3 = $data->input('service3');
                $price_four->service4 = $data->input('service4');
                $price_four->service5 = $data->input('service5');
                $price_four->button = $data->input('button');
                $price_four->save();
                return redirect()->route('price_four');
            }

            public function exit_price_four(Request $data, $id){
                $valid = $data->validate([
                    'slogan' => ['required'],
                    'title' => ['required'],
                    'cost' => ['required'],
                    'time' => ['required'],
                    'service1' => ['required'],
                    'service2' => ['required'],
                    'service3' => ['required'],
                    'service4' => ['required'],
                    'service5' => ['required'],
                    'button' => ['required'],
                ]); 
                $price_four = PriceFour::find($id);
                $price_four->slogan = $data->input('slogan');
                $price_four->title = $data->input('title');
                $price_four->cost = $data->input('cost');
                $price_four->time = $data->input('time');
                $price_four->service1 = $data->input('service1');
                $price_four->service2 = $data->input('service2');
                $price_four->service3 = $data->input('service3');
                $price_four->service4 = $data->input('service4');
                $price_four->service5 = $data->input('service5');
                $price_four->button = $data->input('button');
                $price_four->save();
                return redirect()->route('price_four');
            }  

            public function delete_price_four($id){
                PriceFour::find($id)->delete();
                return redirect()->route('price_four');
            }
            // NAV END
}
