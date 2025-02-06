<?php

namespace App\Http\Controllers;

use App\Models\Themes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'qr_url' => 'required|url',
            'nsfw' => 'required|in:Safe,Sketchy,NSFW',
            'v_link' => 'nullable|url',
            'theme_body' => 'required|file',
            'theme_bgm' => 'nullable|file',
            'theme_preview' => 'required|image|max:500',
            'theme_icon' => 'nullable|image|dimensions:width=48,height=48',
            'audio' => 'nullable|file|mimes:mp3|max:2048', // 2MB max
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // File uploads
        $themeBodyPath = $request->file('theme_body')->store('themes');
        $themeBgmPath = $request->hasFile('theme_bgm') ? $request->file('theme_bgm')->store('themes') : null;
        $themePreviewPath = $request->file('theme_preview')->store('themes/previews');
        $themeIconPath = $request->hasFile('theme_icon') ? $request->file('theme_icon')->store('themes/icons') : null;
        $audioPath = $request->hasFile('audio') ? $request->file('audio')->store('themes/audio') : null;

        // Save theme to database
        $theme = new Themes();
        $theme->category = $request->category;
        $theme->name = $request->name;
        $theme->short_description = $request->s_description;
        $theme->description = $request->description;
        $theme->tags = $request->tags;
        $theme->qr_url = $request->qr_url;
        $theme->nsfw_level = $request->nsfw;
        $theme->youtube_link = $request->v_link;
        $theme->theme_body_path = $themeBodyPath;
        $theme->theme_bgm_path = $themeBgmPath;
        $theme->theme_preview_path = $themePreviewPath;
        $theme->theme_icon_path = $themeIconPath;
        $theme->audio_path = $audioPath;
        $theme->user_id = Auth::id(); // Logged-in user
        $theme->save();

        return redirect('/')->with('success', 'Theme uploaded successfully!');
    }
}
