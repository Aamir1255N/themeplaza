<?php

namespace App\Http\Controllers;

use App\Models\Themes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    function index(){
        $themes = Themes::all();
        // dd($themes);
        return view("index",["themes"=>$themes]);
    }
    function themedetails($id){
        $themes = Themes::find($id)->get();
        return view("themedetails",["data"=>$themes]);
    }
    
}
