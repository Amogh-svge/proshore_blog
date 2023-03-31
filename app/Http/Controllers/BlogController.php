<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Blog::latest()->limit(3)->get();
        return view('blog.list_blogs');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.create_blog');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:3',
            'blog_image' => 'required',
            'summary' => 'required|min:15',
            'content' =>  'required',
            'status' =>  'required',
        ]);

        // $image = $request->file('blog_image');
        // if ($image) {
        //     $image_name = date('YmdHi') . uniqid() . $image->getClientOriginalName();
        //     $image->save(public_path('storage/blog_images/' . $image_name));
        //     return $image_name;
        // } else {
        //     return "no image";
        // }


        $created = Blog::create([
            'title' => $request->title,
            'author_id' => 2,
            'image' => "https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1099&q=80",
            'slug' => Str::slug($request->title),
            'summary' => $request->summary,
            'content' => $request->content,
            'status' => $request->status,
            'published_at' =>  date('Y-m-d H:i:s'),
        ]);

        return $created ? "success" : "failure";
        // return view('blogs.blog_index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        // return view('blogs.blog_details');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        // return view('blogs.blog_edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        return $blog->update([
            'title' => 'welocm',
            'author_id' => 2,
            'image' => 'httpd://ashdajgsd',
            'slug' => 'slug_one',
            'summary' => 'summary one of us',
            'content' => 'we are we are who we are',
            'published_at' => date('ymd'),
        ]);
        // return view('blogs.blog_index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        // return view('blogs.blog_index');
    }
}
