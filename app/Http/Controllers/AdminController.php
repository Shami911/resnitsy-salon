<?php

namespace App\Http\Controllers;
use App\Models\nav;

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
    public function admin_nav(){
        $review = new nav;
        return view('admin.admin_nav', ['admin_nav' => $review->all()]);
    }
    public function add_carousel(Request $data){
        $valid = $data->validate([
            'title' => ['required'],
            'slogan' => ['required']
         ]); 

        $review = new nav();
        $review->title = $data->input('title');
        $review->slogan = $data->input('slogan');
        $review->save();

        return redirect()->route('admin_nav');
    }

    public function exit_nav($id, Request $data)
    {
        $valid = $data->validate([
            'title' => ['required', 'min:3', 'max:20', 'string'],
            'slogan' => ['required', 'min:3', 'max:100', 'string']
        ]);

        $review = nav::find($id);
        $review->title = $data->input('title');
        $review->slogan = $data->input('slogan');        
        $review->save();

        return redirect()->route('nav');
    }

    public function delete_nav($id)
    {
        nav::find($id)->delete();
        return redirect()->route('admin_nav');
    }

}
