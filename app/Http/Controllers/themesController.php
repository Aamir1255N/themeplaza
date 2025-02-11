<?php

namespace App\Http\Controllers;

use Psy\Output\Theme;
use App\Models\Themes;
use App\Models\category;
use Illuminate\Http\Request;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Auth;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\RoundBlockSizeMode;
use Illuminate\Support\Facades\Storage;
use Endroid\QrCode\ErrorCorrectionLevel;
use Illuminate\Support\Facades\Validator;

class themesController extends Controller
{
    public function store(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'category' => 'required|string',
            'name' => 'required|string|max:32',
            's_description' => 'required|string|max:64',
            'description' => 'nullable|string',
            'tags' => 'required|string',
            'nsfw' => 'required',
            'theme_body' => 'required|file',
            'theme_bgm' => 'nullable|file',
            'theme_preview' => 'required|image|max:500',
            'theme_preview2' => 'required|image|max:500',
            // 'theme_icon' => 'nullable|image|dimensions:width=48,height=48',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // File uploads
        $destinationPath = 'uploads/themes';

        $themeBodyPath = $request->hasFile('theme_body') ? $request->file('theme_body')->move($destinationPath, time() . '_' . $request->file('theme_body')->getClientOriginalName()) : null;
        
        $themeBgmPath = $request->hasFile('theme_bgm') ? $request->file('theme_bgm')->move($destinationPath, time() . '_' . $request->file('theme_bgm')->getClientOriginalName()) : null;
        
        $themePreviewPath = $request->hasFile('theme_preview') ? $request->file('theme_preview')->move('uploads/themes/previews', time() . '_' . $request->file('theme_preview')->getClientOriginalName()) : null;

        $themePreviewPath2 = $request->hasFile('theme_preview2') ? $request->file('theme_preview2')->move('uploads/themes/previews', time() . '_' . $request->file('theme_preview2')->getClientOriginalName()) : null;
        
        $themeIconPath = $request->hasFile('theme_icon') ? $request->file('theme_icon')->move('uploads/themes/icons', time() . '_' . $request->file('theme_icon')->getClientOriginalName()) : null;
        
        // $audioPath = $request->hasFile('audio') ? $request->file('audio')->move('uploads/themes/audio', time() . '_' . $request->file('audio')->getClientOriginalName()) : null;
        
        
        
        $theme = new Themes;
        // Theme download link
        $downloadLink = route('themes.download', ['file' => $themeBodyPath]);
        
        // QR Code generate karein
        $result = Builder::create()
            ->writer(new PngWriter()) // PNG format
            ->data($downloadLink) // QR code ka data
            ->encoding(new Encoding('UTF-8')) // Encoding set karein
            ->errorCorrectionLevel(ErrorCorrectionLevel::High) // Error correction
            ->size(200) // QR code ka size
            ->margin(10) // Margin set karein
            ->roundBlockSizeMode(RoundBlockSizeMode::Margin) // Round block size mode
            ->build();
        
        // Unique file name generate karein
        $qrFile = 'qrcodes/' . uniqid() . '.png';
        
        // QR code ko storage mein save karein
        file_put_contents(storage_path('app/public/' . $qrFile), $result->getString());
        
        // Database mein path save karein
        $theme->qr = $qrFile;
        // echo "<img src='$qrFile' width='150px' height='150px'/>";
        // Save theme to database
        $theme = new Themes();
        $theme->category_id = $request->category;
        $theme->name = $request->name;
        $theme->short_description = $request->s_description;
        $theme->description = $request->description;
        $theme->tags = $request->tags;
        $theme->qr = $qrFile;
        $theme->nsfw_level = $request->nsfw;
        $theme->youtube_link = $request->v_link ?? null;
        $theme->body = $themeBodyPath;
        $theme->bgm = $themeBgmPath;
        $theme->preview = $themePreviewPath;
        $theme->preview2 = $themePreviewPath2;
        $theme->icon = $themeIconPath;
        $theme->downloads = 0;
        $theme->likes = 0;
        $theme->uploader = Auth::user()->name; // Logged-in user
        $theme->save();

        return redirect('/')->with('success', 'Theme uploaded successfully!');
    }
    public function download($file)
{
    // File ka path check karein
    if (!Storage::exists($file)) {
        abort(404, 'File not found.');
    }

    // File download karein
    return Storage::download($file);
}
  // ✅ Download count badhane ka function
  public function incrementDownload($id)
  {
      $theme = Themes::findOrFail($id);
      $theme->downloads += 1; // Downloads count badhayein
      $theme->save();

      return response()->json(['downloads' => $theme->downloads]); // AJAX ke liye response
  }

  // ✅ Like toggle karne ka function
  public function handleVote($id, Request $request)
{
    $theme = Themes::findOrFail($id);
    $action = $request->input('action'); // 'like' or 'dislike'

    // Session mein user ke votes track karein
    $likedThemes = session('liked_themes', []);
    $dislikedThemes = session('disliked_themes', []);

    if ($action === 'like') {
        // Agar pehle like kiya hai toh unlike karein
        if (in_array($id, $likedThemes)) {
            $theme->likes -= 1;
            $likedThemes = array_diff($likedThemes, [$id]);
        } else {
            // Naya like add karein
            $theme->likes += 1;
            $likedThemes[] = $id;

            // Agar pehle dislike kiya hai toh dislike remove karein
            if (in_array($id, $dislikedThemes)) {
                $theme->dislikes -= 1;
                $dislikedThemes = array_diff($dislikedThemes, [$id]);
            }
        }
    } elseif ($action === 'dislike') {
        // Agar pehle dislike kiya hai toh undislike karein
        if (in_array($id, $dislikedThemes)) {
            $theme->dislikes -= 1;
            $dislikedThemes = array_diff($dislikedThemes, [$id]);
        } else {
            // Naya dislike add karein
            $theme->dislikes += 1;
            $dislikedThemes[] = $id;

            // Agar pehle like kiya hai toh like remove karein
            if (in_array($id, $likedThemes)) {
                $theme->likes -= 1;
                $likedThemes = array_diff($likedThemes, [$id]);
            }
        }
    }

    // Session update karein
    session(['liked_themes' => $likedThemes]);
    session(['disliked_themes' => $dislikedThemes]);

    // Database mein save karein
    $theme->save();

    // AJAX ke liye response
    return response()->json([
        'likes' => $theme->likes,
        'dislikes' => $theme->dislikes
    ]);
}
  function createcategory(Request $req){
    $category = new category;
    $category->name = $req->category_name;
    $category->save();
    return redirect('/account');
  }
  function deletecategory($id){
    category::find($id)->delete();
    return redirect('/account')->with(["success"=>"Category deleted successfully!"]);
  }
}