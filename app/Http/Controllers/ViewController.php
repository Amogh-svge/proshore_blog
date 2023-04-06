<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
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

    public function viewAllBlog()
    {
        $blogs =  Blog::latest()->get();
        return view('pages.view_all_blogs');
    }

    public function viewAllCategories()
    {
        $categories =  Category::latest()->get();
        return view('pages.view_all_categories');
    }
}
