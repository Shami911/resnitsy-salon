<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ImgAbout;


class AdminController extends Controller
{
    public function admin_panel(){
        return view('admin.admin_panel');
    }
    // public function admin_layout(){
    //     return view('admin.admin_layout');
    // }
    public function nav(){
        $nav = new nav();
        return view ('admin.nav' , ['nav' => $nav->all()]);
    }
    public function add_nav(Request $data){
        $valid = $data->validate([
            'nav1' => ['required'],
         ]);
    
        $nav = new nav();
        $nav->nav1 = $data->input('nav1');
        $nav->save();
        return redirect()->route('nav');
    }
    public function exit_nav($id, Request $data){
    
        $valid = $data->validate([
            'nav1' => ['required']
        ]); 
        
        $nav = nav::find($id);
            $nav->link = $data->input('nav1');
            $nav->save();
    
            return redirect()->route('nav');
        }
    
        public function delete_nav($id){
            nav::find($id)->delete();
            return redirect()->route('nav');
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
}
