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
use App\Models\Reviews;
use App\Models\Comment;

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
            $nav = nav::find($id);
            $nav->title = $data->input('title');
            $nav->slogan = $data->input('slogan');
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
}
