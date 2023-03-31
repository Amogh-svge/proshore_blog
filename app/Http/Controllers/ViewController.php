<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function homeView()
    {
        $featured_blogs = Blog::where('status', 'featured')->get();
        $latest_blogs = Blog::latest()->limit(10)->get();
        $hot_blogs = Blog::where('status', 'hot')->get();

        // return  view('index', compact(['featured_blogs', 'latest_blogs', 'hot']));
    }

    public function createBlog($request)
    {
        // return $request;
        $created = Blog::create([
            'title' => 'welocm',
            'author_id' => 2,
            'image' => 'httpd://ashdajgsd',
            'slug' => 'slug_one',
            'summary' => 'summary one of us',
            'content' => 'we are we are who we are',
            'status' => 'passive',
            'published_at' => date('ymd'),
        ]);
        if ($created)
            return "successfully created";
    }
}
