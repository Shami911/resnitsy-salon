<?php

namespace App\Http\Controllers;
use App\Models\nav;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ImgAbout;
use App\Models\service;
use App\Models\title_service;
use App\Models\Section;


class AdminController extends Controller
{
    public function admin_panel(){
        return view('admin.admin_panel');
    }
    // public function admin_layout(){
    //     return view('admin.admin_layout');
    // }
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
}
