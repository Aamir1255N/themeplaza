<?php

namespace App\Http\Controllers;

use App\Models\Themes;
use App\Models\contact;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
            if ($request->sort == "newest") {
                $themes->orderBy('created_at', 'desc');
            } elseif ($request->sort == "most-downloaded") {
                $themes->orderBy('downloads', 'desc');
            } elseif ($request->sort == "most-liked") {
                $themes->orderBy('likes', 'desc');
            }
        }
    
        // Apply Pagination (10 items per page)
        $themes = $themes->paginate(8);
    
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
        $themes = Themes::where("uploader",Auth::user()->name)->get();
        $count = Themes::where("uploader",Auth::user()->name)->count();
        return view("profile",["themes"=>$themes,"count"=>$count]);
    }
    function getcategory(){
        $category = category::all();
        return response()->json($category);
    }
    function uploads(){
        return view("upload");
    }
    function contact(Request $req){
        $validator = Validator::make($req->all(), [
            "name" => "required",
            "email" => "required|email",
            "message" => "required",
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }
        $contact = new contact;
        $contact->name = $req->name;
        $contact->email = $req->email;
        $contact->message = $req->message;
        $contact->save();
        
        return redirect()->back()->with("succes","Your message send Successfully..");

    }
}