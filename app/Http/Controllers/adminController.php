<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Themes;
use App\Models\contact;
use App\Models\category;
use Illuminate\Http\Request;

class adminController extends Controller
{
    function admin(){
        $users = User::count();
        $themes = Themes::count();
        $category = category::count();
        $contact = contact::count();
        return view("adminpanel.adminpanel")->with(["users"=>$users,"themes"=>$themes,"category"=>$category,"contact"=>$contact]);
    }
    function allusers(){
        $users = user::all();
        return view('adminpanel.allusers',['users'=>$users]);
    }
    function allthemes(){
        $themes = themes::all();
        return view('adminpanel.allthemes',['themes'=>$themes]);
    }
    function allcategory(){
        $category = category::all();
        return view('adminpanel.allcategory',['category'=>$category]);
    }
    function allcontacts(){
        $contact = contact::all();
        return view('adminpanel.allcontacts',['contact'=>$contact]);
    }
    function userdelete($id){
        $user = user::find($id);
        $user->delete();
        return redirect()->back()->with("success","User Successfully Deleted");
    }
}
