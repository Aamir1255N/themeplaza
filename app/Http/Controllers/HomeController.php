<?php

namespace App\Http\Controllers;

use App\Models\Themes;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index(Request $request) {
        $themes = Themes::query(); // Query Builder Start
    
        // Search Filter
        if ($request->has("search")) {
            $themes->where("name", "like", "%" . $request->search . "%");
        }
    
        // Category Filter
        if ($request->has("category") && $request->category != "") {
            $themes->where("category_id", $request->category);
        }
    
        // Sorting Condition
        if ($request->has("sort")) {
            if ($request->sort == "Newest") {
                $themes->orderBy('created_at', 'desc');
            } elseif ($request->sort == "Most Downloaded") {
                $themes->orderBy('downloads', 'desc');
            } elseif ($request->sort == "Most Liked") {
                $themes->orderBy('likes', 'desc');
            }
        }
    
        // Apply Pagination (10 items per page)
        $themes = $themes->paginate(1);
    
        return view("index", ["themes" => $themes]);
    }
    function themedetails($id){
        $themes = Themes::where("id",$id)->get();
        return view("themedetails",["data"=>$themes]);
    }
    function account(){
        $category = category::all();
        return view("account",["categories"=>$category]);
    }
    function profile(){
        $themes = Themes::where("uploader",auth()->user()->name)->get();
        $count = Themes::where("uploader",auth()->user()->name)->count();
        return view("profile",["themes"=>$themes,"count"=>$count]);
    }
    function getcategory(){
        $category = category::all();
        return response()->json($category);
    }
    function uploads(){
        return view("upload");
    }
    
}