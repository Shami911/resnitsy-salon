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


class AdminController extends Controller
{
    public function admin_panel(){
        return view('admin.admin_panel');
    }
  
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
            return redirect()->route('admin_service');
        }  
    
        public function delete_service($id){
            service::find($id)->delete();
            return redirect()->route('admin_service');
        }
        public function admin_nav(){
            $nav = new nav();
            return view ('admin.admin_nav' , ['nav' => $nav->all()]);
        }  
        public function add_nav(Request $data){
            $valid = $data->validate([
                'title' => ['required'],
                'slogan' => ['required'],
            ]); 
            $nav = new nav();
            $nav->title = $data->input('title');
            $nav->slogan = $data->input('slogan');
            $nav->save();
            return redirect()->route('admin_nav');
        }
    
        public function exit_nav(Request $data, $id){
            $valid = $data->validate([
                'title' => ['required'],
                'slogan' => ['required']
            ]); 
            return redirect()->route('img_about');
        }  
    
        public function delete_nav($id){
            nav::find($id)->delete();
            return redirect()->route('admin_nav');
        }

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
            $section = new section();
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
            return redirect()->route('admin_section');
        }  
    
        public function delete_section($id){
            Section::find($id)->delete();
            return redirect()->route('admin_section');
        }
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
}
