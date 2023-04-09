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
        $blog = Blog::whereSlug($slug)->with('comment')->with('category')->first();
        $blog_category = $blog->category->first();

        $similar_blogs = $blog_category->blog()
            ->whereNot('id', $blog->id)
            ->limit(3)->get();

        return view('pages.blog', compact(['blog', 'similar_blogs']));
    }

    public function viewAllBlog()
    {
        $blogs =  Blog::latest()->get();
        return view('pages.view_all_blogs', compact(['blogs']));
    }

    public function viewAllCategories($slug)
    {
        $blogs_of_category = Category::whereSlug($slug)->with('blog')->first();
        return view('pages.view_all_categories', ['category' => $blogs_of_category]);
    }
}
