<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
