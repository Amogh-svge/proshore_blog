<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function homeView()
    {
        $blogs = Blog::all();
        return view('pages.index', compact('blogs'));
    }

    public function blogView($slug)
    {
        $blog = Blog::whereSlug($slug)->with('comment')->first();
        return view('pages.blog', compact(['blog']));
    }

    public function createBlog($request)
    {
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
